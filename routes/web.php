<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\UserController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/admin', function(){
    return view('admin.admin');
})->middleware('admin');

Route::resource('/admin/pages', PagesController::class, ['except' =>['show']]);

Route::resource('/admin/users', UserController::class, ['except' =>['show','store', 'create']]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
