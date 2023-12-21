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
        return view('index',compact('Extracurricular'));
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'name'=>'required|max:255',
            'description'=>'required|max:255',
        ]);
            category::create([
                'title'=> $validateData['name'],
                'description'=> $validateData['description'],
            ]);
            
        return redirect()->route('index');
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
}
