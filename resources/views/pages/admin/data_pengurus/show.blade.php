@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengurus {{ $agama_id->nama }}</h1>
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
            <table class="table table-bordered">
                <tr>
                    <th>Nik Pengurus</th>
                    <td>{{ $agama_id->nik }}</td>
                </tr>
                <tr>
                    <th>Nama Pengurus</th>
                    <td>{{ $agama_id->nama }}</td>
                </tr>
                <tr>
                    <th>Nomor KTP</th>
                    <td>{{ $agama_id->no_ktp }}</td>
                </tr>
                <tr>
                    <th>Tempat Lahirk</th>
                    <td>{{ $agama_id->tempat_lahir }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $agama_id->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $agama_id->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Agama ID</th>
                    <td>{{ $agama_id->agamas->agama }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $agama_id->alamat }}</td>
                </tr>
                <tr>
                    <th>NO HP 1</th>
                    <td>{{ $agama_id->no_hp_1 }}</td>
                </tr>
                <tr>
                    <th>NO HP 2</th>
                    <td>{{ $agama_id->no_hp_2 }}</td>
                </tr>
                <tr>
                    <th>Jabatan ID</th>
                    <td>{{ $agama_id->jabatan->jabatan }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $agama_id->email }}</td>
                </tr>
                <tr>
                    <th>Poto</th>
                    <td>
                        <img src="{{ Storage::url($agama_id->foto) }}" width="200px">
                    </td>
                </tr>

            </table>


            <a href="{{ route('data_pengurus.index') }}" class="btn btn-primary">Kembali </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection