@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Perusahaan </h1>
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
            <form action="{{ route('sub_konstruksi.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="no_seri_formulir">No Seri Formulir</label>
                    <input type="text" class="form-control" name="no_seri_formulir"
                        value="{{ $item->no_seri_formulir }}">
                </div>
                <div class="form-group">
                    <label for="anggota_id">Anggota</label>

                    <select name="anggota_id" required class="form-control">
                        <option value="">{{ $item->anggota_id }}</option>
                        @foreach ($anggota as $anggota)
                        <option value="{{ $anggota->id  }}">
                            {{ $anggota->nomor_keanggotaan }} | {{ $anggota->nama_perusahaan}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Dikeluarkan SBU</label>
                    <input type="date" class="form-control" name="tanggal_masuk" value="{{ $item->tanggal_masuk }}">
                </div>
                <div class="form-group">
                    <label for="berlaku_sampai">Berlaku Sampai</label>
                    <input type="date" class="form-control" name="berlaku_sampai" value="{{ $item->berlaku_sampai }}">
                </div>
                <div class="form-group">
                    <label for="registrasi_tahun_ke_2">Registrasi Tahun Ke 2</label>
                    <input type="date" class="form-control" name="registrasi_tahun_ke_2"
                        value="{{ $item->registrasi_tahun_ke_2 }}">
                </div>
                <div class="form-group">
                    <label for="registrasi_tahun_ke_3">Registrasi Tahun Ke 3</label>
                    <input type="date" class="form-control" name="registrasi_tahun_ke_3"
                        value="{{ $item->registrasi_tahun_ke_3 }}">
                </div>
                <div class="form-group">
                    <label for="tenaga_ahli">Tenaga Ahli</label>
                    <input type="text" class="form-control" name="tenaga_ahli" value="{{ $item->tenaga_ahli }}">
                </div>

                <label for="foto"> Upload foto : </label>
                @if($item->foto)
                <iframe src="{{  Storage::url($item->foto)  }}" frameBorder="0" height="100%" width="100%"
                    class="my-3"></iframe>
                @else
                Tidak ada file
                @endif
                <div class="form-group">
                    <input type="file" class="form-control-file" name="foto" id="foto">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
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