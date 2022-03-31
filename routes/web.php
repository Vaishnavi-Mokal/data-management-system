<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;


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

Route::middleware(['auth'])->group(function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home');
Route::get('/logout', [HomeController::class,'logout'])->name('logout');

//User Management

Route::get('/user/list',[UserController::class,'show'])->name('UserList');
Route::patch('/deleteuser',[UserController::class,'destroy'])->name('deleteuser');


});

Route::middleware(['auth','Admin'])->group(function () {
Route::get('/user/add',[UserController::class,'create'])->name('UserAdd');
Route::post('/user/store',[UserController::class,'store'])->name('UserStore');
Route::get('/EditUser/{id}',[UserController::class,'edit'])->name('EditUser');
Route::post('/updateuser',[UserController::class,'update'])->name('UpdateUser');

});

//Report
Route::get('/export-csv', [ReportController::class,'export'])->name('export-csv');
Route::get('/report',[ReportController::class,'report'])->name('report');
