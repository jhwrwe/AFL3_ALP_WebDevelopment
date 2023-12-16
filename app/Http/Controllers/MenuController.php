<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{

    public function create(){
        $Extracurricular = Menu::all();
        return view('create_menu',compact('Extracurricular'));
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'name'=>'required|max:255',
            'price'=> 'required|integer',
            'description'=>'required|string',
            'photo'=>'image'
        ]);
        if($request->file('photo')){
            $validateData['photo'] =$request->file('photo')->store('images',['disk' => 'public']);
            Menu::create([
                'name'=> $validateData['name'],
                'price'=> $validateData['price'],
                'description'=>  $validateData['description'],
                'photo'=>  $validateData['photo'],
            ]);
        }else{
            Menu::create([
                'name'=> $validateData['name'],
                'price'=> $validateData['price'],
                'description'=>  $validateData['description'],
            ]);
        }
        return redirect()->route('view_menu');
    }
    public function edit($id){
        $MenuEdit = Menu::where('id',$id)->first();
        // $Extracurricular = Extracurricular::all();
        return view('edit',['menuEdit' => $MenuEdit]);
    }
    public function update(Request $request, Menu $menu){
        $validateData=$request->validate([
            'name'=>'required|unique:Menu,max:255',
            'price'=> 'required|integer',
            'description'=>'required|string',
            'photo'=>'image'
        ]);
        if($request->file('photo')){
            if($menu->photo){
                Storage::disk('public')->delete($menu->photo);
            }
            $validateData['photo'] =$request->file('photo')->store('images',['disk'=>'public']);
            $menu->update([
                'name'=> $validateData['name'],
                'price'=> $validateData['price'],
                'description'=>  $validateData['description'],
                'photo'=>  $validateData['photo'],

            ]);
        }else{
            $menu->update([
                'name'=> $validateData['name'],
                'price'=> $validateData['price'],
                'description'=>  $validateData['description'],
           ]);
        }

        return redirect()->route('view_menu');
    }
    public function destroy(Menu $menu){
        if($menu->photo){
            if(Storage::disk('public')->exists($menu->photo)){
                Storage::disk('public')->delete($menu->photo);
            }
        }
        $menu->delete();

        return redirect()->route('view_menu');
    }
    public function index(Request $request){
        if($request->has('search')){
            $projek = Menu::where('name','LIKE','%'.$request->search.'%')->orWhere('description','LIKE','%'.$request->search.'%')->paginate(5)-> withQueryString();
        }else{
            $projek = Menu::paginate(5);
        }
        return view('view_menu',[
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
