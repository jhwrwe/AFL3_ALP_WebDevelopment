<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderMenuController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\CategoryMenuController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Livewire\SearchMenu;

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
Route::get('/view_menu',[MenuController::class,'index'])->middleware('Admin')->name('view_menu');

Route::get('/create_menu',[MenuController::class,'create'])->middleware('Admin')->name('create_menu');
Route::post('/menu_store',[MenuController::class,'store'])->middleware('Admin')->name('menu_store');
Route::get('/edit/{menu}', [MenuController::class,'edit'])->middleware('Admin')->name('edit_menu');
Route::get('/menu/{id}',[MenuController::class,'clickedid'])->middleware('auth')->name('Show_menu_clicked');
Route::get('/menu/ordered/{id}',[MenuController::class,'ordered'])->middleware('auth')->name('show_menu_order');
Route::put('/update/{menu}', [MenuController::class,'update'])->middleware('Admin')->name('menu_update');
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

Route::get('/view_status',[StatusController::class,'index'])->middleware('Admin')->name('view_status');
Route::post('/Status_store',[StatusController::class,'store'])->middleware('Admin')->name('Status_store');
Route::get('/edit_status/{status}', [StatusController::class,'edit'])->middleware('Admin')->name('edit_status');
Route::put('/update_status/{status}', [StatusController::class,'update'])->middleware('Admin')->name('status_update');
Route::delete('/status_destroy/{status}',[StatusController::class,'destroy'])->middleware('Admin')->name('status_destroy');

Route::get('/index',[BannerController::class,'index'])->name('index');
Route::get('/view_banner',[BannerController::class,'show'])->middleware('Admin')->name('view_banner');
Route::get('/create_banner',[BannerController::class,'create'])->middleware('Admin')->name('create_banner');
Route::post('/banner_store',[BannerController::class,'store'])->middleware('Admin')->name('banner_store');
Route::get('/edit_banner/{banner}', [BannerController::class,'edit'])->middleware('Admin')->name('edit_banner');
Route::put('/update_banner/{banner}', [BannerController::class,'update'])->middleware('Admin')->name('update_banner');
Route::delete('/banner_destroy/{banner}',[BannerController::class,'destroy'])->middleware('Admin')->name('banner_destroy');


Route::get('/search-menu', 'MenuController@search')->name('search_menu');

Route::get('/view_category',[CategoryController::class,'show'])->middleware('Admin')->name('view_category');
Route::get('/create_category',[CategoryController::class,'create'])->middleware('Admin')->name('create_category');
Route::post('/category_store',[CategoryController::class,'store'])->middleware('Admin')->name('category_store');
Route::get('/edit_banner/{banner}', [CategoryController::class,'edit'])->middleware('Admin')->name('edit_banner');
Route::put('/update_banner/{banner}', [CategoryController::class,'update'])->middleware('Admin')->name('update_banner');
Route::delete('/category_destroy/{category}',[CategoryController::class,'destroy'])->middleware('Admin')->name('category_destroy');


Route::get('/view_category_menu',[CategoryMenuController::class,'show'])->middleware('Admin')->name('view_category_menu');
Route::get('/create_category_menu',[CategoryMenuController::class,'create'])->middleware('Admin')->name('create_category_menu');
Route::post('/category_menu_store',[CategoryMenuController::class,'store'])->middleware('Admin')->name('category_menu_store');
Route::delete('/category_menu_destroy/{category_menu}',[CategoryController::class,'Admin'])->middleware('auth')->name('category_menu_destroy');


Route::get('/view_true_menu',[CategoryMenuController::class,'showtrue'])->middleware('auth')->name('view_true_menu');

Route::group(['middleware'=>'Admin','prefix'=> 'Admin','as'=>'Admin'], function () {

});


