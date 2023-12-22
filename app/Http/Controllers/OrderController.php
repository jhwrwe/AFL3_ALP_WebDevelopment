<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use App\Models\status;
use App\Models\User;
use App\Models\Order_menu;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(){
        $Extracurricular = Order::all();
        return view('index',compact('Extracurricular'));
    }
    public function store(Request $request, Menu $menu){
        $validateData=$request->validate([
            'tanggal'=>'required|max:255',
            'location'=>'required|string',
            'quantity'=>'required',
        ]);
        $ongoingStatus = Status::where('status', 'ongoing')->first();
            Order::create([
                'tanggal'=> $validateData['tanggal'],
                'location'=> $validateData['location'],
                'user_id'=>Auth::id(),
                'status_id'=>$ongoingStatus->id,
            ]);
            Order_menu::create([
                'harga'=> $validateData['quantity']*$menu['price'],
                'quantity'=> $validateData['quantity'],
                'order_id' => Order::where('user_id', Auth::id())->latest()->first()->id,
                'menu_id'=>$menu['id']
            ]);

           return redirect()->route('view_order');
    }
    public function edit(Order $order){
        $OrderEdit = Order::where('id',$order->id)->first();
        $status = status::all();
        return view('edit_status_order',compact('status'),['OrderEdit' => $OrderEdit]);
    }
    public function destroy(Order $order){
        $order->delete();
        return redirect()->route('index');
    }
    public function update(Request $request, Order $order){
        $validateData=$request->validate([
            'status_id'=>'required',
        ]);
            $order->update([
                'status_id'=>$validateData['status_id'],
            ]);

        return redirect()->route('index');
    }
    public function seeorder(){
        $order_menu = Order_menu::with('order','menu')->get();
        $status = status::all();
            return view('view_order',[
                'pagetitle' => 'project',
                'maintitle' => 'project Data',
                'order_menu'=>$order_menu,
                'status'=> $status,
            ]);
    }

}
