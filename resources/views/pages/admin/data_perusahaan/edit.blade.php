@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Pengurus {{ $item->nama }}</h1>
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
            <form action="{{ route('data_perusahaan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="nomor_keanggotaan">nomor_keanggotaan</label>
                    <input type="text" class="form-control" name="nomor_keanggotaan" placeholder="nomor_keanggotaan"
                        value="{{ $item->nomor_keanggotaan }}">
                </div>
                <div class="form-group">
                    <label for="nama_perusahaan">nama_perusahaan </label>
                    <input type="text" class="form-control" name="nama_perusahaan" placeholder="nama_perusahaan"
                        value="{{ $item->nama_perusahaan  }}">
                </div>
                <div class="form-group">
                    <label for="nama_penanggung_jawab">nama Penanggung Jawab</label>
                    <input type="text" class="form-control" name="nama_penanggung_jawab"
                        placeholder="nama_penanggung_jawab" value="{{ $item->nama_penanggung_jawab }}">
                </div>
                <div class="form-group">
                    <label for="alamat_perusahaan">Alamat Perusahaan</label>
                    <input type="text" class="form-control" name="alamat_perusahaan" placeholder="alamat_perusahaan"
                        value="{{ $item->alamat_perusahaan }}">
                </div>
                <div class="form-group">
                    <label for="provinsi_id">Provinsi ID</label>
                    <select name="provinsi_id" required class="form-control">
                        <option value="{{ $item->provinsi_id }}">{{ $item->provinsi->provinsi }}
                        </option>
                        @foreach ($provinsi as $provinsi)
                        <option value="{{ $provinsi->id }}">
                            {{ $provinsi->provinsi }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kota_kabupaten_id">Kota Kabupaten</label>
                    <select name="kota_kabupaten_id" required class="form-control">
                        <option value="{{ $item->kota_kabupaten_id }}">{{ $item->kota_kabupaten->kota_kabupaten }}
                        </option>
                        @foreach ($kota_kabupaten as $kota_kabupaten)
                        <option value="{{ $kota_kabupaten->id }}">
                            {{ $kota_kabupaten->kota_kabupaten }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="telepon_telex_fax ">Telepon Telex Fax </label>
                    <input type="text" class="form-control" name="telepon_telex_fax " placeholder="telepon_telex_fax "
                        value="{{ $item->telepon_telex_fax  }}">
                </div>
                <div class="form-group">
                    <label for="no_hp_1">NO HP 1</label>
                    <input type="text" class="form-control" name="no_hp_1" placeholder="no_hp_1"
                        value="{{ $item->no_hp_1 }}">
                </div>
                <div class="form-group">
                    <label for="no_hp_2">NO HP 2</label>
                    <input type="text" class="form-control" name="no_hp_2" placeholder="no_hp_2"
                        value="{{ $item->no_hp_2 }}">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="text" class="form-control" name="password" placeholder="password"
                        value="{{ $item->password }}">
                </div>
                <div class="form-group">
                    <label for="email">EMAIL</label>
                    <input type="email" class="form-control" name="email" placeholder="email"
                        value="{{ $item->email }}">
                </div>
                <label for="logo"> Upload foto : </label>
                @if($item->logo)
                <iframe src="{{  Storage::url($item->logo)  }}" frameBorder="0" height="100%" width="100%"
                    class="my-3"></iframe>
                @else
                Tidak ada file
                @endif
                <div class="form-group">
                    <input type="file" class="form-control-file" name="logo" id="logo">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection