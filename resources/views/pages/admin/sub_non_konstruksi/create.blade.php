@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Sub Konstruksi</h1>
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
            <form action="{{ route('sub_non_konstruksi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="no_seri_formulir">No Seri Formulir</label>
                    <input type="text" class="form-control" name="no_seri_formulir">
                </div>
                <div class="form-group">
                    <label for="anggota_id">Anggota</label>

                    <select name="anggota_id" required class="form-control">
                        <option value="">....Pilih Perusahaan....</option>
                        @foreach ($anggota as $anggota)
                        <option value="{{ $anggota->id  }}">
                            {{ $anggota->nomor_keanggotaan }} | {{ $anggota->nama_perusahaan}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_dikeluarkan_sbu">Tanggal Dikeluarkan SBU</label>
                    <input type="date" class="form-control" name="tanggal_dikeluarkan_sbu">
                </div>
                <div class="form-group">
                    <label for="berlaku_sampai">Berlaku Sampai</label>
                    <input type="date" class="form-control" name="berlaku_sampai">
                </div>
                <div class="form-group">
                    <label for="pj_operasional">PJ Operasional</label>
                    <input type="text" class="form-control" name="pj_operasional">
                </div>

                <label for="foto">File </label>
                <div class="form-group">
                    <input type="file" class="form-control-file" name="foto" id="foto">
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