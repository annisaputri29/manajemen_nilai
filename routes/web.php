<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputNilaiController;
use App\Http\Controllers\DaftarMahasiswaController;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');


//input nilai
Route::get('/input_nilai', [InputNilaiController::class,"index"])->name('input_nilai');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/daftar_mahasiswa', [DaftarMahasiswaController::class,"index"])->name('daftar_mahasiswa');
