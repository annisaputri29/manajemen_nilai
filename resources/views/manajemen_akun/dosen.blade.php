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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Akun Dosen</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('manajemen_akun.dosen.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control form-control-user" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="">Nama Belakang</label>
                            <input type="text" class="form-control form-control-user" name="last_name" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="">Tulis Ulang Password</label>
                            <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                        </div>
                        <button class="btn btn-primary">Simpan</button>
                    </form>
                </div>

            </div>

        </div>
        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Akun Dosen</h6>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 3%" align="center">NO</th>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th>PASSWORD</th>
                                <th style="width: 20%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dosen)
                                <tr>
                                    <td align="center">{{ $loop->iteration }}</td>
                                    <td>{{ $dosen->name }} {{ $dosen->last_name }}</td>
                                    <td>{{$dosen->email}}</td>
                                    <td>{{$dosen->salt}}</td>
                                    <td>
                                        <a href="{{ route('manajemen_akun.dosen.detail', $dosen->id) }}" class="btn btn-info btn-sm">Mata Kuliah</a>
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
