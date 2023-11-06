<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\serviceModel;
use Illuminate\Support\Facades\DB;

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

            $electricityBill = is_numeric($request->input("electricityBill")) ? $request->input("electricityBill") : 0;
            $waterBill = is_numeric($request->input("waterBill")) ? $request->input("waterBill") : 0;
            $wifiFee = is_numeric($request->input("cleaningFee")) ? $request->input("cleaningFee") : 0;
            $cleaningFee = is_numeric($request->input("parkingFee")) ? $request->input("parkingFee") : 0;
            $parkingFee = is_numeric($request->input("fine")) ? $request->input("fine") : 0;
            $fine = is_numeric($request->input("fine")) ? $request->input("fine") : 0;
            $other_fees = is_numeric($request->input("other_fees")) ? $request->input("other_fees") : 0;


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
}
