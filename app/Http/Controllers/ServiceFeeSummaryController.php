<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\serviceFeeSummaryModel;
use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\DB;

class ServiceFeeSummaryController extends Controller
{
    public function insertServiceFeeSummary( Request $request){
        if (Auth::check()) {
            $id = Auth::id();
            $request->validate([
                'serviceFeeSummary'=> 'required'
            ]);
            $serviceFeeSummary= new serviceFeeSummaryModel;
            $serviceFeeSummary->idUser=$id;
            $serviceFeeSummary->name=$request->input('serviceFeeSummary');
            $save=$serviceFeeSummary->save();
            if ($save) {
                return redirect()->route('insertServiceFeeSummary')->with('success', true);
            } else {
                return redirect()->route('insertServiceFeeSummary')->with('error', true);
            }
            
        } else {
            return redirect()->route('pageLogin');
        }
    }
    public function getServiceFeeSummary(){
        if (Auth::check()) {
            $id = Auth::id();
            $listServiceFeeSummary = serviceFeeSummaryModel::where('idUser', $id)->get();
            return view('admin.addServiceFeeSummary', ['listServiceFeeSummary' => $listServiceFeeSummary]);
        } else {
            return redirect()->route('pageLogin');
        }
    }
    public function deleteServiceFeeSummary($id) {
        if (Auth::check()) {
            $userId = Auth::id();
            $serviceFeeSummary = ServiceFeeSummaryModel::where('idUser', $userId)->find($id);
    
            if ($serviceFeeSummary) {
                $serviceFeeSummary->delete();
                return redirect()->route('addServiceFeeSummary')->with('successDelete', true);
            } else {
                return redirect()->route('addServiceFeeSummary')->with('errorDelete', true);
            }
        } else {
            return redirect()->route('pageLogin');
        }
    }
    public function editServiceFeeSummary(Request $request, $id) {
        if (Auth::check()) {
            $userId = Auth::id();
            // Lấy đối tượng serviceFeeSummaryModel dựa trên ID
            $idServiceFeeSummary = ServiceFeeSummaryModel::where('idUser', $userId)->find($id);
    
            // Kiểm tra xem đối tượng có tồn tại không
            if (!$idServiceFeeSummary) {
                return response()->json(['error' => 'Không tồn tại'], 404);
            }
            // Access the name property of the specific model instance
            $specificName = $idServiceFeeSummary->name;
            $firstItemId = $idServiceFeeSummary->id;
            
            // Pass the variables to the view
            return view('admin.editServiceFeeSummary', [
                'name' => $specificName,
                'id' => $firstItemId,
            ]);
        } else {
            return redirect()->route('pageLogin');
        }
    }
    public function updateServiceFeeSummary($id, Request $request) {
        if (Auth::check()) {
            $userId = Auth::id();
            $request->validate([
                'serviceFeeSummary' => 'required'
            ]);
            $serviceFeeSummary = ServiceFeeSummaryModel::where('idUser', $userId)->find($id);
            if ($serviceFeeSummary) {
                $serviceFeeSummary->update(['name' => $request->input('serviceFeeSummary')]);
                return redirect()->route('addServiceFeeSummary')->with('success', true);
            } else {
                return redirect()->route('addServiceFeeSummary')->with('error', true);
            }
        } else {
            return redirect()->route('pageLogin');
        }
    }
    
    

}
