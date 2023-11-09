<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\serviceModel;
use Illuminate\Support\Facades\DB;
use App\Models\roomsModel;

use Illuminate\Support\Facades\Auth;

class servicesController extends Controller
{
    public function insertService(Request $request)
{
    if (Auth::check()) {
        $id = Auth::id();

        $request->validate([
            "electricityBill" => "nullable|numeric",
            "waterBill" => "nullable|numeric",
            "wifiFee" => "nullable|numeric",
            "cleaningFee" => "nullable|numeric",
            "parkingFee" => "nullable|numeric",
            "fine" => "nullable|numeric",
            "other_fees" => "nullable|numeric",
        ]);

        $electricityBill = $request->input("electricityBill") ?? 0;
        $waterBill = $request->input("waterBill") ?? 0;
        $wifiFee = $request->input("wifiFee") ?? 0;
        $cleaningFee = $request->input("cleaningFee") ?? 0;
        $parkingFee = $request->input("parkingFee") ?? 0;
        $fine = $request->input("fine") ?? 0;
        $other_fees = $request->input("other_fees") ?? 0;

        $serviceModel = new ServiceModel();
        $serviceModel->user_id = $id;
        $serviceModel->electricityBill = $electricityBill;
        $serviceModel->waterBill = $waterBill;
        $serviceModel->wifiFee = $wifiFee;
        $serviceModel->cleaningFee = $cleaningFee;
        $serviceModel->parkingFee = $parkingFee;
        $serviceModel->fine = $fine;
        $serviceModel->other_fees = $other_fees;

        $sumServices = $electricityBill + $waterBill + $wifiFee + $cleaningFee + $parkingFee + $fine + $other_fees;
        $serviceModel->sumServices = $sumServices;

        if ($serviceModel->save()) {
            return redirect()->route('addservices')->with('success', true);
        } else {
            return redirect()->route('addservices')->with('error', true);
        }
    } else {
        return redirect()->route('pageLogin');
    }
}

    public function getServices() {
        // Get the authenticated user's ID
        $id = Auth::id();
        // Retrieve the list of floors for the authenticated user
        $listServices = serviceModel::where('user_id', $id)->get();
    
        return view('admin.services', ['listServices' => $listServices]);
    }
    public function deleteService($id) {
        if (Auth::check()) {
            $serviceID = serviceModel::find($id);
            if ($serviceID) {
                // Kiểm tra xem có đang được sử dụng bởi phòng không
                $isAddressInUse = roomsModel::where('idServices', $id)->exists();
                if ($isAddressInUse) {
                    // Nếu đang được sử dụng, trả về thông báo lỗi
                    return redirect()->route('addservices')->with('errorDelete', true);
                } else {
                      // Xóa
                      $serviceID->delete();
                      // Chuyển hướng với thông báo thành công
                      return redirect()->route('addservices')->with('successDelete', true);
                }
            }else {
                // Nếu  không tồn tại, trả về thông báo lỗi
                return redirect()->route('addservices')->with('errorDelete', true);
            }
        } else {
            // Người dùng chưa xác thực, chuyển hướng đến trang đăng nhập
            return redirect()->route('pageLogin');
        }

    }
    public function editService($id) {
        if(Auth::check()) {
            $serviceID = serviceModel::find($id);
            if (!$serviceID) {
                return redirect()->route('addservices')->with('errorID', true);
            }
            $service = ServiceModel::find($id);
            return view('admin.editService', ['service' => $service]);
        }else{
            return redirect()->route('pageLogin');
        }
    }
    public function updateServices($id, Request $request) {
        if (Auth::check()) {
            $idUser = Auth::id();
    
            $request->validate([
                "electricityBill" => "nullable|numeric",
                "waterBill" => "nullable|numeric",
                "wifiFee" => "nullable|numeric",
                "cleaningFee" => "nullable|numeric",
                "parkingFee" => "nullable|numeric",
                "fine" => "nullable|numeric",
                "other_fees" => "nullable|numeric",
            ]);
    
            $electricityBill = $request->input("electricityBill") ?? 0;
            $waterBill = $request->input("waterBill") ?? 0;
            $wifiFee = $request->input("wifiFee") ?? 0;
            $cleaningFee = $request->input("cleaningFee") ?? 0;
            $parkingFee = $request->input("parkingFee") ?? 0;
            $fine = $request->input("fine") ?? 0;
            $other_fees = $request->input("other_fees") ?? 0;
    
            $serviceModel = serviceModel::find($id);
            
            if (!$serviceModel) {
                return redirect()->route('addservices')->with('error', true);
            }
    
            $serviceModel->user_id = $idUser;
            $serviceModel->electricityBill = $electricityBill;
            $serviceModel->waterBill = $waterBill;
            $serviceModel->wifiFee = $wifiFee;
            $serviceModel->cleaningFee = $cleaningFee;
            $serviceModel->parkingFee = $parkingFee;
            $serviceModel->fine = $fine;
            $serviceModel->other_fees = $other_fees;
    
            $sumServices = $electricityBill + $waterBill + $wifiFee + $cleaningFee + $parkingFee + $fine + $other_fees;
            $serviceModel->sumServices = $sumServices;
    
            if ($serviceModel->save()) {
                return redirect()->route('addservices')->with('successUpdelete', true);
            } else {
                return redirect()->route('editService', ['id' => $id])->with('error', true);
            }
        } else {
            return redirect()->route('pageLogin');
        }
    }
    
}
