@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Rekening Pembayaran</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('rekening.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_bank">nama_bank</label>
                    <input type="text" class="form-control" name="nama_bank" placeholder="nama_bank">
                </div>
                <div class="form-group">
                    <label for="no_rek">no_rek</label>
                    <input type="text" class="form-control" name="no_rek" placeholder="no_rek">
                </div>
                <div class="form-group">
                    <label for="atas_nama">atas_nama</label>
                    <input type="text" class="form-control" name="atas_nama" placeholder="atas_nama">
                </div>


                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection