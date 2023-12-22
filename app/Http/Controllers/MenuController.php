<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Review;
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
    public function edit(Menu $menu){
        $MenuEdit = Menu::where('id',$menu->id)->first();
        // $Extracurricular = Extracurricular::all();
        return view('edit_menu',['menuEdit' => $MenuEdit]);
    }
    public function update(Request $request, Menu $menu){
        $validateData=$request->validate([
            'name'=>'required|max:255',
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
        $reviews = Review::with('user')->get();
            return view('show_menu_clicked',[
                'pagetitle' => 'project',
                'maintitle' => 'project Data',
                'menu'=> $menu,
                'reviews'=>$reviews,
            ]);
    }
    public function ordered($id){

        $menu = Menu::find($id);
        return view('show_menu_ordered',[
            'pagetitle' => 'project',
            'maintitle' => 'project Data',
            'menu'=> $menu,
        ]);
    }
    public function ordered2($id){
        $menu = Menu::find($id);
        return view('order_menu_view',[
            'pagetitle' => 'project',
            'maintitle' => 'project Data',
            'menu'=> $menu,
        ]);
    }
    // app/Http/Controllers/MenuController.php

public function search(Request $request)
{
    $query = $request->input('search');
    $menus = Menu::where('name', 'like', "%$query%")
                 ->orWhere('description', 'like', "%$query%")
                 ->get();

    return view('view_menu', ['projects' => $menus]);
}


}
