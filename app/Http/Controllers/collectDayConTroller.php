<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tenantModel;
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
        }
    }
  
}


