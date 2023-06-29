<?php

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

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',[CustomerController::class,'index'])->name('trangchu');
Route::get('/gioi-thieu',[CustomerController::class,'gioithieu'])->name('gioithieu');
Route::get('/lien-he',[CustomerController::class,'lienhe'])->name('lienhe');
Route::get('/tin-tuc',[CustomerController::class,'tintuc'])->name('tintuc');
Route::get('/tin-tuc/{sen}/{id}',[CustomerController::class,'tintucchitiet'])->name('tintucchitiet');
Route::get('/san-pham/{sen}/{id}',[CustomerController::class,'sanphamchitiet'])->name('sanphamchitiet');
Route::get('/danh-muc/{sencapmot}/{sencaphai}',[CustomerController::class,'danhmucsanpham'])->name('danhmucsanpham');

//Login
Route::resource('login','Admin\LoginController',[
    'names'=> [
        'index'=>'login',
    ]
])->middleware('guest');

// Loutout Admin
Route::get('logout',function(){
    Auth::logout();
    return redirect('login');
})->name('logout');

Route::resource('admin/tin-tuc','Admin\TintucController',['as'=>'admintintuc'])->middleware('auth');
Route::resource('admin/san-pham','Admin\SanphamController',['as'=>'adminsanpham'])->middleware('auth');
Route::resource('admin/danh-muc','Admin\DanhmucController',['as'=>'admindanhmuc'])->middleware('auth');
Route::resource('admin/gioi-thieu','Admin\GioithieuController',['as'=>'admingioithieu'])->middleware('auth');
Route::resource('admin/lien-he','Admin\LienheController',['as'=>'adminlienhe'])->middleware('auth');
Route::resource('admin','Admin\DashboardController')->middleware('auth');
// UPLOAD IMG
Route::post('/upload', 'PostTasksController@upload')->middleware('auth');