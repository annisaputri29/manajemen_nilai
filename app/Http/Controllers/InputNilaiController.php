<?php

namespace App\Http\Controllers;

use App\Models\InputNilai;
use App\Models\MappngMatkul;
use App\Models\NamaMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InputNilaiController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $matkul = MappngMatkul::selectRaw('mapping_matkul.*,master_data_matkul.nama as nama_matkul')->leftJoin('master_data_matkul', 'mapping_matkul.matkul_id', '=', 'master_data_matkul.id')->where('mapping_matkul.user_id',$user_id)->get();
        $mahasiswa = NamaMahasiswa::all();
        $daftar_nilai = InputNilai::selectRaw('input_nilai.*,master_data_matkul.nama as nama_matkul,daftar_mahasiswa.nama as nama_mahasiswa,program_studi.nama as nama_prodi')->leftJoin('mapping_matkul', 'input_nilai.matkul_id', '=', 'mapping_matkul.id')->leftJoin('master_data_matkul', 'mapping_matkul.matkul_id', '=', 'master_data_matkul.id')->leftJoin('daftar_mahasiswa', 'input_nilai.mahasiswa_id', '=', 'daftar_mahasiswa.id')->leftJoin('program_studi', 'daftar_mahasiswa.prodi', '=', 'program_studi.id')
        ->where('mapping_matkul.user_id',$user_id)
        ->orderBy('semester_id','ASC')
        ->orderBy('daftar_mahasiswa.prodi','ASC')
        ->orderBy('daftar_mahasiswa.nama','ASC')
        ->get();
        return view('input_nilai.index',compact('matkul','mahasiswa','daftar_nilai'));
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'semester_id' => 'required',
                'matkul_id' => 'required',
                'mahasiswa_id' => 'required',
                'tugas' => 'required',
                'quiz' => 'required',
                'uts' => 'required',
                'uas' => 'required',
            ],
            );

        InputNilai::create([
            'semester_id' => $request->semester_id,
            'matkul_id' => $request->matkul_id,
            'mahasiswa_id' => $request->mahasiswa_id,
            'tugas' => $request->tugas,
            'quiz' => $request->quiz,
            'uts' => $request->uts,
            'uas' => $request->uas,
        ]);

        return back()->with('success','Data Berhasil Di Simpan');
    }

    public function edit($id)
    {
        $data = InputNilai::selectRaw('input_nilai.*,master_data_matkul.nama as nama_matkul,daftar_mahasiswa.nama as nama_mahasiswa,program_studi.nama as nama_prodi')->leftJoin('mapping_matkul', 'input_nilai.matkul_id', '=', 'mapping_matkul.id')->leftJoin('master_data_matkul', 'mapping_matkul.matkul_id', '=', 'master_data_matkul.id')->leftJoin('daftar_mahasiswa', 'input_nilai.mahasiswa_id', '=', 'daftar_mahasiswa.id')->leftJoin('program_studi', 'daftar_mahasiswa.prodi', '=', 'program_studi.id')
        ->orderBy('semester_id','ASC')
        ->orderBy('daftar_mahasiswa.prodi','ASC')
        ->orderBy('daftar_mahasiswa.nama','ASC')
        ->find($id);
        $user_id = Auth::user()->id;
        $matkul = MappngMatkul::selectRaw('mapping_matkul.*,master_data_matkul.nama as nama_matkul')->leftJoin('master_data_matkul', 'mapping_matkul.matkul_id', '=', 'master_data_matkul.id')->where('mapping_matkul.user_id',$user_id)->get();
        $mahasiswa = NamaMahasiswa::all();
        return view('input_nilai.edit',compact('data','matkul','mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'semester_id' => 'required',
                'matkul_id' => 'required',
                'mahasiswa_id' => 'required',
                'tugas' => 'required',
                'quiz' => 'required',
                'uts' => 'required',
                'uas' => 'required',
            ],
            );
        $data = InputNilai::findOrFail($id);
        $data->semester_id = $request->semester_id;
        $data->matkul_id = $request->matkul_id;
        $data->mahasiswa_id = $request->mahasiswa_id;
        $data->tugas = $request->tugas;
        $data->quiz = $request->quiz;
        $data->uts = $request->uts;
        $data->uas = $request->uas;
        $data->save();

        return redirect()->route('input_nilai')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy($id)
{
    $data = InputNilai::findOrFail($id);
    $data->delete();

    return redirect()->route('input_nilai')->with('success', 'Nilai berhasil dihapus.');
}


public function daftar_nilai()
{
    $user_id = Auth::user()->id;
    $matkul = MappngMatkul::selectRaw('mapping_matkul.*,master_data_matkul.nama as nama_matkul')->leftJoin('master_data_matkul', 'mapping_matkul.matkul_id', '=', 'master_data_matkul.id')->where('mapping_matkul.user_id',$user_id)->get();
    $mahasiswa = NamaMahasiswa::all();
    $daftar_nilai = InputNilai::selectRaw('input_nilai.*,master_data_matkul.nama as nama_matkul,daftar_mahasiswa.nama as nama_mahasiswa,program_studi.nama as nama_prodi,users.name as nama_depan , users.last_name as nama_belakang')->leftJoin('mapping_matkul', 'input_nilai.matkul_id', '=', 'mapping_matkul.id')->leftJoin('users', 'mapping_matkul.user_id', '=', 'users.id')->leftJoin('master_data_matkul', 'mapping_matkul.matkul_id', '=', 'master_data_matkul.id')->leftJoin('daftar_mahasiswa', 'input_nilai.mahasiswa_id', '=', 'daftar_mahasiswa.id')->leftJoin('program_studi', 'daftar_mahasiswa.prodi', '=', 'program_studi.id')
    ->leftJoin('mapping_mahasiswa', 'daftar_mahasiswa.id', '=', 'mapping_mahasiswa.mahasiswa_id')
    ->where('mapping_mahasiswa.user_id',$user_id)
    ->orderBy('semester_id','ASC')
    ->orderBy('daftar_mahasiswa.prodi','ASC')
    ->orderBy('daftar_mahasiswa.nama','ASC')
    ->get();
    return view('daftar_nilai.index',compact('matkul','mahasiswa','daftar_nilai'));
}

}
