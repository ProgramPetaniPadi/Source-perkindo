@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Perusahaan</h1>
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
                    <th>Nomor Keanggotaan</th>
                    <td>{{ $item->nomor_keanggotaan }}</td>
                </tr>
                <tr>
                    <th>Nama Perusahaan</th>
                    <td>{{ $item->nama_perusahaan }}</td>
                </tr>
                <tr>
                    <th>Nama Penanggung jawab</th>
                    <td>{{ $item->nama_penanggung_jawab }}</td>
                </tr>
                <tr>
                    <th>Alamat Perusahaan</th>
                    <td>{{ $item->alamat_perusahaan }}</td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>{{ $item->provinsi->provinsi }}</td>
                </tr>
                <tr>
                    <th>Kota atau Kabupaten</th>
                    <td>{{ $item->kota_kabupaten->kota_kabupaten }}</td>
                </tr>
                <tr>
                    <th>Telepon/Telex/Fax</th>
                    <td>{{ $item->telepon_telex_fax }}</td>
                </tr>
                <tr>
                    <th>Nomor HP 1</th>
                    <td>{{ $item->no_hp_1 }}</td>
                </tr>
                <tr>
                    <th>NO HP 2</th>
                    <td>{{ $item->no_hp_2 }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $item->email }}</td>
                </tr>
                <tr>
                    <th>Poto</th>
                    <td>
                        <img src="{{ Storage::url($item->logo) }}" width="200px">
                    </td>
                </tr>
                <tr>
                    <th>Masa Berlaku KTA</th>
                    <td> {{ $kta->kta_berlaku_sampai }} </td>
                </tr>
                <tr>
                    <th>file KTA</th>
                    <td>
                        <img src="{{ Storage::url($kta->file_kta) }}" width="200px">
                    </td>
                </tr>
            </table>
            <a href="{{ route('data_perusahaan.index') }}" class="btn btn-primary">Kembali </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection