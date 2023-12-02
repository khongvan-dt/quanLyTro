<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tenantModel;
use App\Models\collectDayModel;

use Illuminate\Support\Facades\DB;

class collectDayConTroller extends Controller
{
    public function getData(){
        if(Auth::check()){
            $id = Auth::id();
            $listCollectDay =   DB::table('tenant')
            ->join('room', 'tenant.idRoomTenant', '=', 'room.id')
            ->join('accommodationArea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
            ->join('contract', 'contract.idRoomContract', '=', 'tenant.idRoomTenant')
            ->select('room.*','tenant.*','accommodationArea.*','contract.*')
            ->where('tenant.idUser', $id)
            ->get();
          
            return view('admin.collectDay', ['listCollectDay' => $listCollectDay]);
        } else {
            return redirect()->route('pageLogin');
        }
    }
    public function insertDB(Request $request){
      if(Auth::check()){
        $idUser=Auth::id();
        $request->validate([
            'day'=>'required'
        ]);
        $day=$request->input('day');
        $collectDay= new collectDayModel();
        $collectDay->day=$day;
        $collectDay->idUser =$idUser;
        $save= $collectDay->save();
        if ($save) {
            return redirect()->route('collectDay')->with('success', true);
        } else {
            return redirect()->route('collectDay')->with('error', true);
        }
      } else {
        return redirect()->route('pageLogin');
      }
    }
  
}


