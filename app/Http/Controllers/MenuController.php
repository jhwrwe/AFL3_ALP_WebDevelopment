<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public function create(){
        // $Extracurricular = Extracurricular::all();
        return view('create',compact('Extracurricular'));
    }
    public function store(Request $request){
        Menu::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'description'=> $request->description,
            'photo'=> $request->photo,
        ]);
        return redirect()->route('index');
    }
    public function edit($id){
        $MenuEdit = Menu::where('id',$id)->first();
        // $Extracurricular = Extracurricular::all();
        return view('edit',compact('Extracurricular'),['menuEdit' => $MenuEdit]);
    }
    public function update(Request $request, Menu $menu){
        $menu->update([
            'name'=> $request->name,
            'price'=> $request->price,
            'description'=> $request->description,
            'photo'=> $request->photo,
        ]);
        return redirect()->route('index');
    }
    public function destroy(Menu $menu){
        $menu->delete();
        return redirect()->route('index');
    }
    public function index(Request $request){
        if($request->has('search')){
            $projek = Menu::where('name','LIKE','%'.$request->search.'%')->orWhere('description','LIKE','%'.$request->search.'%')->paginate(5)-> withQueryString();
        }else{
            $projek = Menu::paginate(5);
        }
        return view('index',[

            "pagetitle" => "projek",
        "maintitle" => "projek data",
        'projects' => $projek,
        "ActiveProjek"=> "active"
        ]);
    }
    public function clickedid($id){
        $menu = Menu::find($id);
            return view('show',[
                'pagetitle' => 'project',
                'maintitle' => 'project Data',
                'menu'=> $menu,
            ]);
    }
}
