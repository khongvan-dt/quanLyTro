<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\collectDayMoneyModel;
use Illuminate\Support\Facades\Auth;
class collectDayMoneyController extends Controller
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
}
