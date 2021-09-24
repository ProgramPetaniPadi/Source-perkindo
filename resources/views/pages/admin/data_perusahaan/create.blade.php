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
            <form action="{{ route('data_perusahaan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nomor_keanggotaan">Nomor Keanggotaan</label>
                    <input type="text" class="form-control" name="nomor_keanggotaan">
                </div>
                <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan">
                </div>
                <div class="form-group">
                    <label for="nama_penanggung_jawab">Nama Penanggung Jawab</label>
                    <input type="text" class="form-control" name="nama_penanggung_jawab">
                </div>
                <div class="form-group">
                    <label for="alamat_perusahaan">Alamat Perusahaan</label>
                    <input type="text" class="form-control" name="alamat_perusahaan">
                </div>
                <div class="form-group">
                    <label for="provinsi_id">Provinsi</label>

                    <select name="provinsi_id" required class="form-control">
                        <option value="">....Pilih Provinsi....</option>
                        @foreach ($provinsi as $provinsi)
                        <option value="{{ $provinsi->id }}">
                            {{ $provinsi->provinsi }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kota_kabupaten_id">Kota/Kabupaten</label>
                    <select name="kota_kabupaten_id" required class="form-control">
                        <option value="">....Pilih kota_Kabupaten....</option>
                        @foreach ($kota_kabupaten as $kota_kabupaten)
                        <option value="{{ $kota_kabupaten->id }}">
                            {{ $kota_kabupaten->kota_kabupaten }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="telepon_telex_fax">Telepon/telex/Fax</label>
                    <input type="text" class="form-control" name="telepon_telex_fax">
                </div>
                <div class="form-group">
                    <label for="no_hp_1">Nomor HP 1</label>
                    <input type="text" class="form-control" name="no_hp_1">
                </div>
                <div class="form-group">
                    <label for="no_hp_2">Nomor HP 2</label>
                    <input type="text" class="form-control" name="no_hp_2">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="text" class="form-control" name="password" value="perkindo123">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <label for="logo">Foto Penanggung Jawab : </label>
                <div class="form-group">
                    <input type="file" class="form-control-file" name="logo" id="logo">
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