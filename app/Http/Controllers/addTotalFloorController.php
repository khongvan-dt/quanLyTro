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

    public function getFloor(){
        $listFloors=totalFlorModel::all();
        return view('admin.addFloor', ['listFloors' => $listFloors]);
    }
    public function deleteFloor($id) {
        if (Auth::check()) {
            // Find the totalFlorModel record to be deleted
            $totalFloor = totalFlorModel::find($id);
    
            if (!$totalFloor) {
                // Total floor not found, return an error or redirect as needed
                return redirect()->route('addTotalFloor')->with('error', true);
            }
    
            // Check if the total floor is in use
            $isAddressInUse = roomsModel::where('idTotalFloors', $totalFloor->id)->exists();
    
            if ($isAddressInUse) {
                // If the floor is in use, return an error message
                return redirect()->route('addTotalFloor')->with('errorDelete', true);
            }
    
            // Find all related numberFloorsModel records with matching idTotalFloors
            $numberFloors = numberFloorsModel::where('idTotalFloors', $totalFloor->id)->get();
    
            // Check if any numberFloorsModel records are in use
            foreach ($numberFloors as $numberFloor) {
                $isNumberFloorInUse = roomsModel::where('idNumberFloors', $numberFloor->id)->exists();
                if ($isNumberFloorInUse) {
                    return redirect()->route('addTotalFloor')->with('errorDelete', true);
                }
            }
    
            // If none of the related records are in use, delete them
            foreach ($numberFloors as $numberFloor) {
                $numberFloor->delete();
            }
    
            // Delete the totalFlorModel record
            $totalFloor->delete();
    
            return redirect()->route('addTotalFloor')->with('successDelete', true);
        } else {
            return redirect()->route('pageLogin');
        }
    }
    
}
