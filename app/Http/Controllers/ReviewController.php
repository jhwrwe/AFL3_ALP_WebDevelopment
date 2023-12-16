<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request){
        $validateData=$request->validate([
            'title'=>'required|max:255',
            'description'=>'required|max:255',
            'menu_id'=>'required|max:255'
        ]);
            Review::create([
                'title'=> $validateData['title'],
                'description'=> $validateData['description'],
                'user_id'=>Auth::id(),
                'menu_id'=>$validateData['menu_id']


            ]);

        return redirect()->route('index');
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
