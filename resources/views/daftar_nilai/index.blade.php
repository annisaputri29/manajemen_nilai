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
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Nilai</h6>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 3%" align="center">NO</th>
                                <th>SEMESTER</th>
                                <th>PRODI</th>
                                <th>NAMA</th>
                                <th>MATA KULIAH</th>
                                <th>DOSEN PENGAMPU</th>
                                <th>NILAI TUGAS</th>
                                <th>NILAI QUIZ</th>
                                <th>NILAI UTS</th>
                                <th>NILAI UAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftar_nilai as $nilai)
                                <tr>
                                    <td align="center">{{ $loop->iteration }}</td>
                                    <td>Semester {{$nilai->semester_id}}</td>
                                    <td>{{$nilai->nama_prodi}}</td>
                                    <td>{{$nilai->nama_mahasiswa}}</td>
                                    <td>{{$nilai->nama_matkul}}</td>
                                    <td>{{$nilai->nama_depan}} {{$nilai->nama_belakang}}</td>
                                    <td>{{$nilai->tugas}}</td>
                                    <td>{{$nilai->quiz}}</td>
                                    <td>{{$nilai->uts}}</td>
                                    <td>{{$nilai->uas}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

@endsection
