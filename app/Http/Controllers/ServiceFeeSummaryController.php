<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\serviceFeeSummaryModel;
use Illuminate\Support\Facades\Auth;


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
    
    public function updateServiceFeeSummary( Request $request){}
}
