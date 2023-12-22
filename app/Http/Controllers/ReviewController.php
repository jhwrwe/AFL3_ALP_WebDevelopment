<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(){
        $Extracurricular = Review::all();
        return view('index',compact('Extracurricular'));
    }
    public function store(Request $request,Menu $menu){
        $validateData=$request->validate([
            'title'=>'required|max:255',
            'description'=>'required|string',
        ]);
            Review::create([
                'title'=> $validateData['title'],
                'description'=> $validateData['description'],
                'user_id'=>Auth::id(),
                'menu_id'=>$menu['id']
            ]);

        return redirect()->route('index');
    }
    public function edit(Review $review){
        $ReviewEdit = Menu::where('id',$review->id)->first();
        // $Extracurricular = Extracurricular::all();
        return view('edit_menu',['ReviewEdit' => $ReviewEdit]);
    }
    public function destroy(Review $review){
        $review->delete();
        return redirect()->route('index');
    }
    public function update(Request $request, Review $review){
        $validateData=$request->validate([
            'title'=>'required|max:255',
            'description'=>'required|max:255',
            'menu_id'=>'required|max:255'
        ]);
            $review->update([
                'title'=> $validateData['title'],
                'description'=> $validateData['description'],
                'user_id'=>Auth::id(),
                'menu_id'=>$validateData['menu_id']
            ]);

        return redirect()->route('index');
    }

}
