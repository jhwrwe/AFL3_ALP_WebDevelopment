<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderMenuController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\BannerController;

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
Route::get('/menu/{id}',[MenuController::class,'clickedid'])->middleware('auth')->name('Show_menu_clicked');
Route::get('/menu/ordered/{id}',[MenuController::class,'ordered'])->middleware('auth')->name('show_menu_order');
Route::put('/update/{menu}', [MenuController::class,'update'])->middleware('auth')->name('menu_update');
Route::delete('/menu_destroy/{menu}',[MenuController::class,'destroy'])->middleware('auth')->name('menu_destroy');
Auth::routes();
Route::post('/store_review/{menu}',[ReviewController::class,'store'])->middleware('auth')->name('store_review');
Route::get('/edit/{review}', [MenuController::class,'edit'])->middleware('auth')->name('edit_review');
Route::delete('/review_destroy/{review}',[ReviewController::class,'destroy'])->middleware('auth')->name('review_destroy');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/order_store/{menu}',[OrderController::class,'store'])->middleware('auth')->name('order_store');
Route::get('/order_menu_view/{id}',[MenuController::class,'ordered2'])->middleware('auth')->name('order_menu_view');
Route::get('/view_order',[OrderController::class,'seeorder'])->middleware('auth')->name('view_order');
Route::post('/store_order_menu/{menu}',[OrderMenuController::class,'store'])->middleware('auth')->name('store_order_menu');
Route::get('/edit_status_order/{order}', [OrderController::class,'edit'])->middleware('auth')->name('edit_status_order');
Route::put('/update_order_status/{order}', [OrderController::class,'update'])->middleware('auth')->name('update_order_status');

// Route::get('/register_admin_see',[RegisterController::class,'register_admin_view'])->middleware('auth')->name('register_admin_see');
// Route::post('/register',[RegisterController::class,'register_admin_view'])->middleware('auth')->name('register_admin_see');

Route::get('/view_status',[StatusController::class,'index'])->middleware('auth')->name('view_status');
Route::post('/Status_store',[StatusController::class,'store'])->middleware('auth')->name('Status_store');
Route::get('/edit_status/{status}', [StatusController::class,'edit'])->middleware('auth')->name('edit_status');
Route::put('/update_status/{status}', [StatusController::class,'update'])->middleware('auth')->name('status_update');
Route::delete('/status_destroy/{status}',[StatusController::class,'destroy'])->middleware('auth')->name('status_destroy');

Route::get('/index',[BannerController::class,'index'])->middleware('auth')->name('index');
Route::get('/view_banner',[BannerController::class,'show'])->middleware('auth')->name('view_banner');
Route::get('/create_banner',[BannerController::class,'create'])->middleware('auth')->name('create_banner');
Route::post('/banner_store',[BannerController::class,'store'])->middleware('auth')->name('banner_store');
Route::get('/edit_banner/{banner}', [BannerController::class,'edit'])->middleware('auth')->name('edit_banner');
Route::put('/update_banner/{banner}', [BannerController::class,'update'])->middleware('auth')->name('update_banner');
Route::delete('/banner_destroy/{banner}',[BannerController::class,'destroy'])->middleware('auth')->name('banner_destroy');
