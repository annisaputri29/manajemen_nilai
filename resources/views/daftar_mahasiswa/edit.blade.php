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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Mahasiswa</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('daftar_mahasiswa.update', $data->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">NPM</label>
                                <input type="text" name="npm" id="npm" class="form-control" value="{{$data->npm}}"><br>
                            </div>
                            <div class="col-md-12">
                                <label for="">Nama Mahasiswa</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{$data->nama}}"><br>
                            </div>
                            <div class="col-md-12">
                                <label for="">Prodi</label>
                                <select name="prodi_id" id="" class="form-control">
                                    <option value="{{$data->prodi}}">{{$data->nama_prodi}}</option>
                                    @foreach ($prodi as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
