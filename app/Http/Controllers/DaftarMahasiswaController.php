<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NamaMahasiswa;
use App\Models\ProgramStudi;

class DaftarMahasiswaController extends Controller
{
        public function index()
    {
        $data = NamaMahasiswa::selectRaw('daftar_mahasiswa.*,program_studi.nama as nama_prodi')->leftJoin('program_studi', 'daftar_mahasiswa.prodi', '=', 'program_studi.id')->get();
        $prodi = ProgramStudi::all();
        return view('daftar_mahasiswa.index', compact('data','prodi'));
    }

    public function store(Request $request)
    {


        $this->validate($request, [
            'npm' => ['required'],
            'nama' => ['required'],
            'prodi_id' => ['required'],

        ]);


        NamaMahasiswa::create([
           'npm' => $request->npm,
            'nama' => $request->nama,
            'prodi' => $request->prodi_id,
        ]);

        return back()->with('success', 'Your User has been successfully Created');
    }

    public function edit($id)
    {
        $data = NamaMahasiswa::selectRaw('daftar_mahasiswa.*,program_studi.nama as nama_prodi')->leftJoin('program_studi', 'daftar_mahasiswa.prodi', '=', 'program_studi.id')->where('daftar_mahasiswa.id',$id)->first();
        $prodi = ProgramStudi::all();
        return view('daftar_mahasiswa.edit', compact('data','prodi'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'npm' => ['required'],
            'nama' => ['required'],
            'prodi_id' => ['required'],

        ]);

        $data = NamaMahasiswa::findOrFail($id);
        $data->nama = $request->nama;
        $data->npm = $request->npm;
        $data->prodi = $request->prodi_id;
        $data->save();

        return redirect()->route('daftar_mahasiswa')->with('success', 'Program Studi berhasil diperbarui.');
    }

    public function destroy($id)
{
    $data = NamaMahasiswa::findOrFail($id);
    $data->delete();

    return redirect()->route('daftar_mahasiswa')->with('success', 'Program Studi berhasil dihapus.');
}

}
