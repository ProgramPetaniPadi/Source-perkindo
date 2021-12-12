@extends('layouts.anggota')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
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
            <!-- <form action="{{ route('agama.store') }}" method="POST"> -->
            <form>
                @csrf
                <div class="form-group">
                    <label for="agama_id"> Pembayaran</label>
                    <select name="agama_id" required class="form-control">
                        <option value="">....Pilih Jenis Pembayaran...</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="agama_id"> Rekening Tujuan</label>
                    <select name="agama_id" required class="form-control">
                        <option value="">....Pilih No Rekening Tujuan...</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="agama">Nomor Rekening</label>
                    <input type="text" class="form-control" name="agama">
                </div>
                <div class="form-group">
                    <label for="agama">Atas Nama</label>
                    <input type="text" class="form-control" name="agama">
                </div>
                <div class="form-group">
                    <label for="agama">Keterangan</label>
                    <input type="text" class="form-control" name="agama">
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