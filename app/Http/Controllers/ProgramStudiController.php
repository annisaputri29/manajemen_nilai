<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $data = ProgramStudi::orderBy('nama','ASC')->get();
        return view('program_studi.index',compact('data'));
    }

    public function store(Request $request)
    {
        $data = ProgramStudi::all();
        $this->validate(
            $request,
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Nama Program Studi Wajib Di Isi',
            ]
            );

        ProgramStudi::create([
            'nama' => $request->nama,
        ]);

        return back()->with('success','Berhasil Disimpan');
    }

    public function edit($id)
    {
        $data = ProgramStudi::find($id);
        return view('program_studi.edit',compact('data'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
    ]);

    $program_studi = ProgramStudi::findOrFail($id);
    $program_studi->nama = $request->nama;
    $program_studi->save();

    return redirect()->route('program_studi')->with('success', 'Berhasil Diperbarui.');
}

public function destroy($id)
{
    $program_studi = ProgramStudi::findOrFail($id);
    $program_studi->delete();

    return redirect()->route('program_studi')->with('success', 'Berhasil Dihapus.');
}
}
