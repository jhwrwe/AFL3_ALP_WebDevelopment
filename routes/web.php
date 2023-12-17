<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::view('/index', 'index',[
    "pagetitle" => "projek",
    "maintitle" => "projek data",
    "ActiveProjek"=> "active"
    ]
    )->middleware('auth')->name('index');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/view_menu',[MenuController::class,'index'])->middleware('auth')->name('view_menu');


Route::get('/create_menu',[MenuController::class,'create'])->middleware('auth')->name('create_menu');
Route::post('/menu_store',[MenuController::class,'store'])->middleware('auth')->name('menu_store');
Route::get('/edit/{menu}', [MenuController::class,'edit'])->middleware('auth')->name('edit_menu');
Route::put('/update/{menu}', [MenuController::class,'update'])->middleware('auth')->name('menu_update');
Route::delete('/menu_destroy/{menu}',[MenuController::class,'destroy'])->middleware('auth')->name('menu_destroy');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
