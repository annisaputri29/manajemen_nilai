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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Tambah Akun Dosen</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('input_nilai.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Semester</label>
                            <select name="semester_id" id="" class="form-control">
                                <option value="{{$data->semester_id}}">Semester {{$data->semester_id}}</option>
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Mata Kuliah</label>
                            <select name="matkul_id" id="" class="form-control">
                                <option value="{{$data->matkul_id}}">{{$data->nama_matkul}}</option>
                                @foreach ($matkul as $item)
                                    <option value="{{$item->id}}">{{$item->nama_matkul}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <select name="mahasiswa_id" id="" class="form-control">
                                <option value="{{$data->mahasiswa_id}}">{{$data->nama_mahasiswa}}</option>
                                @foreach ($mahasiswa as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="">Tugas</label>
                            <input type="number" class="form-control form-control-user" name="tugas" value="{{$data->tugas}}" placeholder="{{ __('Nilai Tugas') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="">Quiz</label>
                            <input type="number" class="form-control form-control-user" name="quiz" value="{{$data->quiz}}" placeholder="{{ __('Nilai Quiz') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="">UTS</label>
                            <input type="number" class="form-control form-control-user" name="uts" value="{{$data->uts}}" placeholder="{{ __('Nilai UTS') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="">UAS</label>
                            <input type="number" class="form-control form-control-user" name="uas" value="{{$data->uas}}" placeholder="{{ __('Nilai UAS') }}" required>
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
