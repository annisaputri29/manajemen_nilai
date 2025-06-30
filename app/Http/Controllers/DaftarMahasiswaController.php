<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NamaMahasiswa;

class DaftarMahasiswaController extends Controller
{
        public function index()
    {
        $data = NamaMahasiswa::all();
        return view('daftar_mahasiswa', compact('data'));
    }
      public function create()
    {
        return view('daftar_mahasiswa_create');
    }
}
