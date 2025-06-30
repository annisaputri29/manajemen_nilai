<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputNilaiController;
use App\Http\Controllers\DaftarMahasiswaController;
use App\Http\Controllers\ManajemenAkunController;
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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');



// Route::get('/about', function () {
//     return view('about');
// })->name('about');


//daftar_nilai
Route::get('/daftar_nilai', [InputNilaiController::class,"daftar_nilai"])->name('daftar_nilai');

//input nilai
Route::get('/input_nilai', [InputNilaiController::class,"index"])->name('input_nilai');
Route::post('/input_nilai/store', [InputNilaiController::class,"store"])->name('input_nilai.store');
Route::get('/input_nilai/edit/{id}', [InputNilaiController::class,"edit"])->name('input_nilai.edit');
Route::put('/input_nilai/update/{id}', [InputNilaiController::class, 'update'])->name('input_nilai.update');
Route::get('/input_nilai/delete/{id}', [InputNilaiController::class, 'destroy'])->name('input_nilai.delete');

//daftar_mahasiswa
Route::get('/daftar_mahasiswa', [DaftarMahasiswaController::class,"index"])->name('daftar_mahasiswa');
Route::post('/daftar_mahasiswa/store', [DaftarMahasiswaController::class,"store"])->name('daftar_mahasiswa.store');
Route::get('/daftar_mahasiswa/edit/{id}', [DaftarMahasiswaController::class,"edit"])->name('daftar_mahasiswa.edit');
Route::put('/daftar_mahasiswa/update/{id}', [DaftarMahasiswaController::class, 'update'])->name('daftar_mahasiswa.update');
Route::get('/daftar_mahasiswa/delete/{id}', [DaftarMahasiswaController::class, 'destroy'])->name('daftar_mahasiswa.delete');

//program_studi
Route::get('/program_studi', [ProgramStudiController::class,"index"])->name('program_studi');
Route::post('/program_studi/store', [ProgramStudiController::class,"store"])->name('program_studi.store');
Route::get('/program_studi/edit/{id}', [ProgramStudiController::class,"edit"])->name('program_studi.edit');
Route::put('/program_studi/update/{id}', [ProgramStudiController::class, 'update'])->name('program_studi.update');
Route::get('/program_studi/delete/{id}', [ProgramStudiController::class, 'destroy'])->name('program_studi.delete');


//manajemen akun
Route::get('/manajemen_akun', [ManajemenAkunController::class,"index"])->name('manajemen_akun');
Route::get('/manajemen_akun/dosen', [ManajemenAkunController::class,"dosen"])->name('manajemen_akun.dosen');

Route::post('/manajemen_akun/dosen/store', [ManajemenAkunController::class,"dosen_store"])->name('manajemen_akun.dosen.store');
Route::get('/manajemen_akun/dosen/detail/{id}', [ManajemenAkunController::class,"dosen_detail"])->name('manajemen_akun.dosen.detail');
Route::post('/manajemen_akun/dosen/mapping/store', [ManajemenAkunController::class,"mapping_store"])->name('manajemen_akun.dosen.mapping.store');
Route::get('/manajemen_akun/dosen/mapping/delete/{id}', [ManajemenAkunController::class, 'mapping_destroy'])->name('manajemen_akun.dosen.mapping.delete');


Route::get('/manajemen_akun/mahasiswa', [ManajemenAkunController::class,"mahasiswa"])->name('manajemen_akun.mahasiswa');
Route::post('/manajemen_akun/mahasiswa/store', [ManajemenAkunController::class,"mahasiswa_store"])->name('manajemen_akun.mahasiswa.store');
Route::get('/manajemen_akun/mahasiswa/edit/{id}', [ManajemenAkunController::class,"edit"])->name('manajemen_akun.mahasiswa.edit');
Route::put('/manajemen_akun/mahasiswa/update/{id}', [ManajemenAkunController::class, 'update'])->name('manajemen_akun.mahasiswa.update');
Route::get('/manajemen_akun/mahasiswa/delete/{id}', [ManajemenAkunController::class, 'destroy'])->name('manajemen_akun.mahasiswa.delete');
