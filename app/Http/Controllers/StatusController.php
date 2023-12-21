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
            'status'=>'required',
        ]);
            Status::create([
                'status'=> $validateData['status'],
            ]);

        return redirect()->route('view_status');
    }
    public function destroy(status $Status){
        $Status->delete();

        return redirect()->route('view_status');
    }
    public function update(Request $request, status $status){
        $validateData=$request->validate([
            'status'=>'required',
        ]);
            $status->update([
                'status'=> $validateData['status'],
            ]);

        return redirect()->route('view_status');
    }
    public function edit(status $status){
        $statusEdit = status::where('id',$status->id)->first();
        return view('edit_status',['statusEdit' => $statusEdit]);
    }

    public function index(Request $request){
        if($request->has('search')){
            $projek = status::where('name','LIKE','%'.$request->search.'%')->orWhere('description','LIKE','%'.$request->search.'%')->paginate(5)-> withQueryString();
        }else{
            $projek = status::paginate(5);
        }
        return view('view_status',[
            "pagetitle" => "projek",
        "maintitle" => "projek data",
        'projects' => $projek,
        "ActiveProjek"=> "active"
        ]);
    }
}
