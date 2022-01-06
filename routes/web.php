<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Media;
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




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('media', MediaController::class);




Route::get('mahasiswa', function () {
    return view('adminMHS.mahasiswa');
})->middleware('checkRole:mahasiswa');
Route::get('BAAK', function () {
    return view('adminBAAK.BAAK');
})->middleware(['checkRole:BAAK,mahasiswa']);
Route::get('BAPSI', function () {
    return view('adminBAPSI.BAPSI');
})->middleware(['checkRole:BAPSI']);
Route::get('pembimbing', function () {
    return view('adminpembimbing.pembimbing');
})->middleware(['checkRole:pembimbing']);
