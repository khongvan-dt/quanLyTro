<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pathModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class pathController extends Controller
{
    public function insertPath(Request $request){
        if (Auth::check()) {
            $id = Auth::id();
            $request->validate([
                'path' => 'required',
            ]);
            $path=$request->input('path');
            $insertPath = new pathModel();
            $insertPath->path=$path;
            $insertPath->idUser=$id;

            $saved= $insertPath->save();
            
            if ($saved ) {
                return redirect()->route('Path')->with('success', true);
            } else {
                return redirect()->route('Path')->with('error', true);
            }
        }
    }
}
