<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function FAQ(){
        return view('FAQ',[
            "pagetitle" => "projek",
        "maintitle" => "projek data",
        "ActiveProjek"=> "active"
        ]);
    }
    public function aboutus(){
        return view('aboutus',[
            "pagetitle" => "projek",
        "maintitle" => "projek data",
        "ActiveProjek"=> "active"
        ]);
    }
}
