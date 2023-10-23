<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\totalFlorModel;
use Illuminate\Support\Facades\DB;
use App\Models\numberFloorsModel;
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
            $userId = Auth::id();
    
            // Find the totalFlorModel record to be deleted
            $totalFloor = totalFlorModel::find($id);
    
            if (!$totalFloor) {
                // Total floor not found, return an error or redirect as needed
                return redirect()->route('addTotalFloor')->with('error', true);
            }
    
            // Find all related numberFloorsModel records with matching idTotalFloors
            $numberFloors = numberFloorsModel::where('idTotalFloors', $totalFloor->id)->get();
    
            // Delete the related numberFloorsModel records
            foreach ($numberFloors as $numberFloor) {
                $numberFloor->delete();
            }
    
            // Delete the totalFlorModel record
            $totalFloor->delete();
    
            return redirect()->route('addTotalFloor')->with('success', true);
        } else {
            return redirect()->route('pageLogin');
        }
    }
    
    
}
