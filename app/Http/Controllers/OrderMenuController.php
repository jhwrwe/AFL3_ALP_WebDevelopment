<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Order_menu;
use App\Http\Requests\StoreOrder_menuRequest;
use App\Http\Requests\UpdateOrder_menuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderMenuController extends Controller
{

        public function create(){
            $Extracurricular = Order_menu::all();
            return view('index',compact('Extracurricular'));
        }
        public function store(Request $request, Menu $menu){
            $validateData=$request->validate([
                'quantity'=>'required',
            ]);


            Order_menu::create([
                    'harga'=> $validateData['quantity']*$menu['price'],
                    'quantity'=> $validateData['quantity'],
                    'order_id' => Order::where('user_id', Auth::id())->latest()->first()->id,
                    'menu_id'=>$menu['id']
                ]);

            return redirect()->route('index');
        }
        public function edit(Order_menu $Order_menu){
            $Order_menuEdit = Order_menu::where('id',$Order_menu->id)->first();
            // $Extracurricular = Extracurricular::all();
            return view('edit_menu',['order_menuEdit' => $Order_menuEdit]);
        }
        public function destroy(Order_menu $Order_menu){
            $Order_menu->delete();
            return redirect()->route('index');
        }
        public function update(Request $request, Order_menu $Order_menu){
            $validateData=$request->validate([
                'harga'=>'required|max:255',
                'quantity'=>'required|max:255',
            ]);
            $Order_menu->update([
                'harga'=> $validateData['harga'],
                'quantity'=> $validateData['quantity'],
                ]);

            return redirect()->route('index');

    }

}
