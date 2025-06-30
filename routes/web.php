<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputNilaiController;
use App\Http\Controllers\DaftarMahasiswaController;
use App\Http\Controllers\ProgramStudiController;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');


//input nilai
Route::get('/input_nilai', [InputNilaiController::class,"index"])->name('input_nilai');
Route::get('/about', function () {
    return view('about');
})->name('about');

//daftar_mahasiswa
Route::get('/daftar_mahasiswa', [DaftarMahasiswaController::class,"index"])->name('daftar_mahasiswa');
<<<<<<< HEAD
Route::get('/daftar_mahasiswa/create', [DaftarMahasiswaController::class,"create"])->name('daftar_mahasiswa.create');
=======

//program_studi
Route::get('/program_studi', [ProgramStudiController::class,"index"])->name('program_studi');
Route::post('/program_studi/store', [ProgramStudiController::class,"store"])->name('program_studi.store');
Route::get('/program_studi/edit/{id}', [ProgramStudiController::class,"edit"])->name('program_studi.edit');
Route::put('/program_studi/update/{id}', [ProgramStudiController::class, 'update'])->name('program_studi.update');
Route::get('/program_studi/delete/{id}', [ProgramStudiController::class, 'destroy'])->name('program_studi.delete');
>>>>>>> fdd7429b131f4972d2cc8a555b0ff280be89d646
