<?php

namespace App\Http\Controllers;

use App\Models\status;
use App\Http\Requests\StorestatusRequest;
use App\Http\Requests\UpdatestatusRequest;
use Illuminate\Http\Request;
class StatusController extends Controller
{
    public function store(Request $request){
        $validateData=$request->validate([
            'status'=>'required|unique:Menu,max:255',
        ]);
            Status::create([
                'status'=> $validateData['status'],

            ]);

        return redirect()->route('index');
    }
    public function destroy(status $Status){
        $Status->delete();

        return redirect()->route('index');
    }
    public function update(Request $request, status $status){
        $validateData=$request->validate([
            'status'=>'required|unique:Menu,max:255',
        ]);
            $status->update([
                'status'=> $validateData['status'],
            ]);

        return redirect()->route('index');
    }
}
