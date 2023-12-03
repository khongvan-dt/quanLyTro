<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\collectDayMoneyModel;
use Illuminate\Support\Facades\Auth;
class collectDayMoneyController extends Controller
{
    public function insertCollectDayMoney(Request $request){
        if (Auth::check()) {
            $id = Auth::id();

            $request->validate([
                'idRoomContract' => "required",
                'date'=>'required'
            ]);

            $collectDayMoney = new collectDayMoneyModel();
            $collectDayMoney->idUser = $id;
            $collectDayMoney->idRoomCollectMoney = $request->input("idRoomContract");
            $collectDayMoney->time = $request->input("date");
            $saved = $collectDayMoney->save();
            if ($saved) {
                return redirect()->route('collectmoney')->with('success', true);
            } else {
                return redirect()->route('collectmoney')->with('error', true);
            }
        }
    }
    public function deleteCollectmoney($id) {
        if (Auth::check()) {
            $idUser = Auth::id();
            $collectDayMoney = collectDayMoneyModel::find($id);
    
            if ($collectDayMoney && $collectDayMoney->idUser === $idUser) {
                if ($collectDayMoney->delete()) {
                    return redirect()->route('collectmoney')->with('successDelete', true);
                } else {
                    return redirect()->route('collectmoney')->with('errorDelete', true);
                }
            } else {
                return redirect()->route('collectmoney')->with('errorDelete', true);
            }
        } else {
            // User is not authenticated, redirect to the login page
            return redirect()->route('pageLogin');
        }
    }
    
    
    public function getCollectmoney(){
        if(Auth::check()){
            $id = Auth::id();
            
            $listCollectDay = DB::table('tenant')
            ->join('room', 'tenant.idRoomTenant', '=', 'room.id')
            ->join('accommodationArea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
            ->join('contract', 'contract.idRoomContract', '=', 'tenant.idRoomTenant')
            ->select('room.*', 'tenant.*', 'accommodationArea.*', 'contract.*')
            ->where('tenant.idUser', $id)
            ->whereNotIn('tenant.idRoomTenant', function ($query) {
                $query->select('idRoomCollectMoney')
                    ->from('collectmoney');
            })
            ->get();
        

            $listCollectDay2 = DB::table('contract')
            ->leftJoin('room', 'contract.idRoomContract', '=', 'room.id')
            ->leftJoin('accommodationArea', 'room.idAccommodationArea', '=', 'accommodationArea.id')
            ->leftJoin('tenant', 'contract.idRoomContract', '=', 'tenant.idRoomTenant')
            ->leftJoin('collectmoney', 'contract.idRoomContract', '=', 'collectmoney.idRoomCollectMoney')
            ->select('room.*','tenant.*', 'accommodationArea.*', 'contract.*', 'collectmoney.id as collectmoney_id', 'collectmoney.time as collectmoney_time')
            ->where('contract.idUser', $id)
            ->get();

            $totalPriceRoom = DB::table('room')
            ->join('collectmoney', 'collectmoney.idRoomCollectMoney', '=', 'room.id')
            ->selectRaw('SUM(room.priceRoom) as total_price')
            ->where('room.user_id', $id)
            ->value('total_price');

            return view('admin.addCollectmoney', ['listCollectDay' => $listCollectDay],['listCollectDay2'=>$listCollectDay2],['totalPriceRoom'=>$totalPriceRoom]);
        } else {
            return redirect()->route('pageLogin');
        }
    }
}
