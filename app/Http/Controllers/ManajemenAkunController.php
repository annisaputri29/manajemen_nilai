<?php

namespace App\Http\Controllers;

use App\Models\MappingMahasiswa;
use App\Models\MappngMatkul;
use App\Models\MasterDataMatkul;
use App\Models\NamaMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class ManajemenAkunController extends Controller
{
    public function index()
    {
        $data = User::orderBy('name','ASC')->get();
        return view('manajemen_akun.index',compact('data'));
    }

    public function dosen()
    {
        $data = User::where('roles_id','2')->orderBy('name','ASC')->get();
        return view('manajemen_akun.dosen',compact('data'));
    }

    public function dosen_store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],


        ]);


        User::create([
           'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'roles_id' => '2',
            'salt' => $request->password,

        ]);

        return back()->with('success', 'Berhasil Disimpan');
    }

    public function dosen_detail($id)
    {
        $dosen = User::find($id);
        $data_matkul = MasterDataMatkul::all();
        $data = MappngMatkul::selectRaw('mapping_matkul.*,master_data_matkul.nama')
        ->where('user_id',$dosen->id)->leftJoin('master_data_matkul', 'mapping_matkul.matkul_id', '=', 'master_data_matkul.id')->get();
        return view('manajemen_akun.dosen_detail',compact('data_matkul','dosen','data'));
    }

    public function mapping_store(Request $request)
    {


        $this->validate($request, [
            'matkul_id' => ['required'],

        ]);


        MappngMatkul::create([
           'matkul_id' => $request->matkul_id,
            'user_id' => $request->user_id,
        ]);

        return back()->with('success', 'Berhasil Disimpan');
    }

    public function mapping_destroy($id)
{
    $matkul = MappngMatkul::findOrFail($id);
    $matkul->delete();

    return back()->with('success', 'Berhasil Dihapus.');
}

public function mahasiswa()
{
    $data = User::selectRaw('users.*,daftar_mahasiswa.nama as nama_mahasiswa')->leftJoin('mapping_mahasiswa', 'users.id', '=', 'mapping_mahasiswa.user_id')->leftJoin('daftar_mahasiswa', 'mapping_mahasiswa.mahasiswa_id', '=', 'daftar_mahasiswa.id')->where('roles_id','3')->orderBy('name','ASC')->get();
    $mahasiswa = NamaMahasiswa::all();
    return view('manajemen_akun.mahasiswa',compact('data','mahasiswa'));
}


public function mahasiswa_store(Request $request)
{
    $this->validate($request, [
        'name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],


    ]);


    $user_id = User::create([
       'name' => $request->name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'password' => $request->password,
        'roles_id' => '3',
        'salt' => $request->password,

    ]);

    MappingMahasiswa::create([
        'mahasiswa_id' => $request->mahasiswa_id,
        'user_id' => $user_id->id,
    ]);

    return back()->with('success', 'Berhasil Disimpan');
}
}
