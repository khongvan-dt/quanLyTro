<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\totalFlorModel;
use Illuminate\Support\Facades\DB;
use App\Models\numberFloorsModel;
use App\Models\roomsModel;

class addTotalFloorController extends Controller
{
    public function insertFloor(Request $request)
{
    if (Auth::check()) {
        $id = Auth::id();

        $request->validate([
            "sumFloors" => "required", 
        ]);

        $floor = new totalFlorModel;
        $floor->idUser = $id;
        $floor->sumFloors = $request->input("sumFloors"); 
        $saved = $floor->save();
        if ($saved) {
            $insertedId = $floor->id;
            $sumFloors = DB::table('totalfloors')->where('id', $insertedId)->value('sumFloors');
            
            for ($i = 1; $i <= $sumFloors; $i++) {
                $numberFloor = new numberFloorsModel;
                $numberFloor->idUser = $id;
                $numberFloor->idTotalFloors = $insertedId;
                $numberFloor->floors = $i;
                $saved2 = $numberFloor->save();
            }
            if ($saved2) {
                return redirect()->route('addTotalFloor')->with('success', true);
            } else {
                return redirect()->route('addTotalFloor')->with('error', true);
            }
        }
        
    } else {
        return redirect()->route('pageLogin');
    }
}

public function getFloor() {
    // Get the authenticated user's ID
    $id = Auth::id();

    // Retrieve the list of floors for the authenticated user
    $listFloors = totalFlorModel::where('idUser', $id)->get();

    return view('admin.addFloor', ['listFloors' => $listFloors]);
}
    public function deleteFloor($id) {
        if (Auth::check()) {
            $totalFloor = totalFlorModel::find($id);
    
            if (!$totalFloor) {
                return redirect()->route('addTotalFloor')->with('error', true);
            }
                $isAddressInUse = roomsModel::where('idTotalFloors', $totalFloor->id)->exists();
    
            if ($isAddressInUse) {
                return redirect()->route('addTotalFloor')->with('errorDelete', true);
            }
                $numberFloors = numberFloorsModel::where('idTotalFloors', $totalFloor->id)->get();
                foreach ($numberFloors as $numberFloor) {
                $isNumberFloorInUse = roomsModel::where('idNumberFloors', $numberFloor->id)->exists();
                if ($isNumberFloorInUse) {
                    return redirect()->route('addTotalFloor')->with('errorDelete', true);
                }
            }
                foreach ($numberFloors as $numberFloor) {
                $numberFloor->delete();
            }
            $totalFloor->delete();
    
            return redirect()->route('addTotalFloor')->with('successDelete', true);
        } else {
            return redirect()->route('pageLogin');
        }
    }
    
}
