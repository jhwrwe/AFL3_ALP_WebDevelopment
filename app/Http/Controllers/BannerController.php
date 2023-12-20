<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $currentDate = now();
      $activeBanners = Banner::where('starting_time', '<=', $currentDate)->where('Ending_time', '>=',$currentDate)->get();
      return view('index',['banner' => $activeBanners]);
    }

    public function create(){
        $Extracurricular = Banner::all();
        return view('create_banner',compact('Extracurricular'));
    }
    public function store(Request $request){
        $validateData=$request->validate([
            'name'=>'required',
            'starting_time'=>'required',
            'Ending_time'=>'required',
            'photo'=>'image'
        ]);
        if($request->file('photo')){
            $validateData['photo'] =$request->file('photo')->store('images',['disk' => 'public']);
            Banner::create([
                'name'=> $validateData['name'],
                'starting_time'=> $validateData['starting_time'],
                'Ending_time'=>  $validateData['Ending_time'],
                'photo'=>  $validateData['photo'],
            ]);
        }else{
            Banner::create([
                'name'=> $validateData['name'],
                'starting_time'=> $validateData['starting_time'],
                'Ending_time'=>  $validateData['Ending_time'],
            ]);
        }
        return redirect()->route('view_banner');
    }
    public function edit(Banner $banner){
        $BannerEdit = Banner::where('id',$banner->id)->first();
        return view('edit_banner',['BannerEdit' => $BannerEdit]);
    }
    public function update(Request $request,Banner $banner){
        $validateData=$request->validate([
            'name'=>'required',
            'starting_time'=>'required',
            'Ending_time'=>'required',
            'photo'=>'image'
        ]);
        if($request->file('photo')){
            if($banner->photo){
                Storage::disk('public')->delete($banner->photo);
            }
            $validateData['photo'] =$request->file('photo')->store('images',['disk'=>'public']);
            $banner->update([
                'name'=> $validateData['name'],
                'starting_time'=> $validateData['starting_time'],
                'Ending_time'=>  $validateData['Ending_time'],
                'photo'=>  $validateData['photo'],

            ]);
        }else{
            $banner->update([
                'name'=> $validateData['name'],
                'starting_time'=> $validateData['starting_time'],
                'Ending_time'=>  $validateData['Ending_time'],
           ]);
        }

        return redirect()->route('view_banner');
    }
    public function destroy(Banner $banner){
        if($banner->photo){
            if(Storage::disk('public')->exists($banner->photo)){
                Storage::disk('public')->delete($banner->photo);
            }
        }
        $banner->delete();

        return redirect()->route('view_banner');
    }
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $banner = Banner::all();
            return view('view_banner',[
                'pagetitle' => 'project',
                'maintitle' => 'project Data',
                'banner'=> $banner,
            ]);
    }
}
