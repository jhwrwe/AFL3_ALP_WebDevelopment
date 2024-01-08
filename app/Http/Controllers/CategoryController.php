<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        $Extracurricular = Category::all();
        return view('create_category',compact('Extracurricular'));
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'name'=>'required|max:255',
            'description'=>'required|max:255',
        ]);
            category::create([
                'name'=> $validateData['name'],
                'description'=> $validateData['description'],
            ]);

        return redirect()->route('view_category');
    }
    public function edit(Category $category){
        $CategoryEdit = Category::where('id',$category->id)->first();
        // $Extracurricular = Extracurricular::all();
        return view('edit_menu',['CategoryEdit' => $CategoryEdit]);
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('index');
    }
    public function update(Request $request,Category $category){
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
            $projek = Category::where('name','LIKE','%'.$request->search.'%')->orWhere('description','LIKE','%'.$request->search.'%')->paginate(5)-> withQueryString();
        }else{
            $projek = Category::all();

        }
        return view('view_category',[
            "pagetitle" => "projek",
        "maintitle" => "projek data",
        'projects' => $projek,
        "ActiveProjek"=> "active"
        ]);
    }
}
