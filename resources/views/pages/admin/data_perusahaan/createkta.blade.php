@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Perusahaan</h1>
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
            <form action="{{ route('tambah_kta.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="nomor_keanggotaan">nomor_keanggotaan</label>
                    <input type="text" class="form-control" name="nomor_keanggotaan" placeholder="nomor_keanggotaan"
                        value="{{ $item->nomor_keanggotaan }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_perusahaan">nama_perusahaan </label>
                    <input type="text" class="form-control" name="nama_perusahaan" placeholder="nama_perusahaan"
                        value="{{ $item->nama_perusahaan  }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_penanggung_jawab">nama Penanggung Jawab</label>
                    <input type="text" class="form-control" name="nama_penanggung_jawab"
                        placeholder="nama_penanggung_jawab" value="{{ $item->nama_penanggung_jawab }}" readonly>
                </div>
                <div class="form-group">
                    <label for="alamat_perusahaan">Alamat Perusahaan</label>
                    <input type="text" class="form-control" name="alamat_perusahaan" placeholder="alamat_perusahaan"
                        value="{{ $item->alamat_perusahaan }}" readonly>
                </div>


                <div class="form-group">
                    <label for="kta_berlaku_sampai">KTA Berlaku Sampai </label>
                    <input type="date" class="form-control" name="kta_berlaku_sampai">
                </div>
                <label for="file_kta">Foto KTA : </label>
                <div class="form-group">
                    <input type="file" class="form-control-file" name="file_kta" id="file_kta">
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