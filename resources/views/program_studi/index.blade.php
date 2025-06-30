@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Program Studi</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('program_studi.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Nama Program Studi</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                        </div><br>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>

            </div>

        </div>
        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Program Studi</h6>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 3%" align="center">NO</th>
                                <th>NAMA</th>
                                <th style="width: 20%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $program_studi)
                                <tr>
                                    <td align="center">{{ $loop->iteration }}</td>
                                    <td>{{ $program_studi->nama }}</td>
                                    <td>
                                        <a href="{{ route('program_studi.edit', $program_studi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('program_studi.delete', $program_studi->id) }}" class="btn btn-danger btn-sm">Hapus</a>

                                        {{-- Tombol Delete --}}
                                        {{-- <form action="{{ route('program_studi.destroy', $program_studi->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

@endsection
