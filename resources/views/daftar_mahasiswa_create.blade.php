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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Daftar Mahasiswa</h6>
                       
                </div>
                
                <div class="card-body">
<form action="">
    <div class="row">
<div class="col-md-12">
<label for="">Nama</label>
    <input class="form-control" type="text">
</div>
 <div class="col-md-12">
<label for="">NPM</label>
    <input class="form-control" type="number">
</div>
<div class="col-md-12">
<label for="">Prodi</label>
    <input class="form-control" type="text">
</div>
    </div>
    
</form>
                </div>

            </div>

        </div>

    </div>

@endsection
