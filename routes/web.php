<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IconController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LinksController;


use App\Http\Controllers\EndUserController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleAdminController;
use App\Http\Controllers\QrCodeGeneratorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/user', [HomeController::class, 'index']);

// Admin Routes
Route::group(['prefix'=>'admin'],function (){
Route::get('/users',[RoleAdminController::class,'index']);
Route::get('/userlinks/{id}',[RoleAdminController::class,'links']);
Route::get('/rolechange/{id}',[RoleAdminController::class,'editRole']);
Route::put('/rolechange',[RoleAdminController::class,'roleChange']);

});
//icon routes

Route::group(['prefix'=>'icon'],function (){
Route::get('/',[IconController::class,"index"]);
Route::get('/create',[IconController::class,'create']);
Route::post('/store',[IconController::class,'store']);
Route::get('/edit/{id}',[IconController::class,"edit"]);
Route::put('/update/{id}',[IconController::class,"update"]);
Route::Delete('/delete/{id}',[IconController::class,"delete"]);
});

// links routes
Route::group(['prefix'=>'links'],function (){
Route::get('/',[LinksController::class,"index"]);
Route::get('/create',[LinksController::class,"create"]);
Route::put('/store',[LinksController::class,"store"]);
Route::get('/edit/{id}',[LinksController::class,"edit"]);
Route::put('/update/{id}',[LinksController::class,"update"]);
Route::delete('/delete/{id}',[LinksController::class,"delete"]);
});
//qrcode routes


Route::group(['prefix'=>'qr-code'],function (){
Route::get('/', [QrCodeGeneratorController::class, 'index']);
Route::get('/add', [QrCodeGeneratorController::class, 'create']);
Route::put('/', [QrCodeGeneratorController::class, 'store']);

});
// user routes
Route::group(['prefix'=>'user'],function (){

Route::get("/",[UserController::class, "index"]);
Route::put("/update/{id}",[UserController::class, "update"]);
Route::Delete("/delete/{id}",[UserController::class, "delete"]);





});


//Enduser routes

Route::get('/enduser/{id}',[EndUserController::class,'index'])->name('enduser');
//dashboard route
Route::get('/{page}',[DashboardController::class,'index']);