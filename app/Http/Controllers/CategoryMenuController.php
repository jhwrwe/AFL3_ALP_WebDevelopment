<?php

namespace App\Http\Controllers;

use App\Models\Category_menu;
use App\Models\Menu;
use App\Models\Category;
use App\Http\Requests\StoreCategory_menuRequest;
use App\Http\Requests\UpdateCategory_menuRequest;
use Illuminate\Http\Request;

class CategoryMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create(){
        $Extracurricular = Category_menu::all();
        $menu = Menu::all();
        $category = Category::all();
        return view('create_category_menu',compact('Extracurricular','menu','category'));
    }
    public function store(Request $request){
        Category_menu::create([
                'category_id'=> $request['category_id'],
                'menu_id'=> $request['menu_id'],
            ]);
        return redirect()->route('view_category_menu');
    }
    public function edit(Category_menu $category){
        $CategoryEdit = Category_menu::where('id',$category->id)->first();
        // $Extracurricular = Extracurricular::all();
        return view('edit_menu',['CategoryEdit' => $CategoryEdit]);
    }
    public function destroy(Category_menu $category){
        $category->delete();
        return redirect()->route('view_category_menu');
    }
    public function update(Request $request,Category_menu $category){
        $validateData=$request->validate([
            'name'=>'required|max:255',
            'description'=>'required|max:255',
        ]);
        $category->update([
            'title'=> $validateData['name'],
            'description'=> $validateData['description'],
            ]);

        return redirect()->route('index');
    }
    public function show(Request $request){
        if($request->has('search')){
            $projek = Category_menu::where('name','LIKE','%'.$request->search.'%')->orWhere('description','LIKE','%'.$request->search.'%')->paginate(5)-> withQueryString();
        }else{
            $projek = Category_menu::paginate(5);
        }
        return view('view_category_menu',[
            "pagetitle" => "projek",
        "maintitle" => "projek data",
        'projects' => $projek,
        "ActiveProjek"=> "active"
        ]);
    }
    public function showtrue(Request $request){
        if($request->has('category_id')){
            $projek = Category_menu::where('category_id','LIKE','%'.$request->category_id.'%')->with('category','menu')->get();
        }else{
            $projek= Category_menu::with('category','menu')->get();
        }
        return view('view_true_menu',[
            "pagetitle" => "projek",
        "maintitle" => "projek data",
        'projects' => $projek,
        'category'=> Category::all(),
        "ActiveProjek"=> "active"
        ]);
    }
}
