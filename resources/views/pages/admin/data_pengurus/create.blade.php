@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Pengurus</h1>
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
            <form action="{{ route('data_pengurus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik">
                </div>
                <div class="form-group">
                    <label for="nama">NAMA</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                    <label for="no_ktp">NO KTP</label>
                    <input type="text" class="form-control" name="no_ktp">
                </div>
                <div class="form-group">
                    <label for="tempat_lahir">TEMPAT LAHIR</label>
                    <input type="text" class="form-control" name="tempat_lahir">
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">TANGGAL LAHIR</label>
                    <input type="date" class="form-control" name="tanggal_lahir">
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin" class="col-sm-2 col-sm-2 control-label">JENIS KELAMIN</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required="required">
                        <option value="">----- Pilih Jenis Kelamin -----</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="agama_id">AGAMA</label>
                    <select name="agama_id" required class="form-control">
                        <option value="">....pilih Agama...</option>
                        @foreach ($agama as $agama)
                        <option value="{{ $agama->id }}">
                            {{ $agama->agama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">ALAMAT</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label for="no_hp_1">NO HP 1</label>
                    <input type="text" class="form-control" name="no_hp_1">
                </div>
                <div class="form-group">
                    <label for="no_hp_2">NO HP 2</label>
                    <input type="text" class="form-control" name="no_hp_2">
                </div>
                <div class="form-group">
                    <label for="jabatan_id">JABATAN</label>

                    <select name="jabatan_id" required class="form-control">
                        <option value="">....Pilih Jabatan....</option>
                        @foreach ($jabatan as $jabatan)
                        <option value="{{ $jabatan->id }}">
                            {{ $jabatan->jabatan }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">EMAIL</label>
                    <input type="email" class="form-control" name="email">
                </div>

                <label for="foto"> Upload foto : </label>
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