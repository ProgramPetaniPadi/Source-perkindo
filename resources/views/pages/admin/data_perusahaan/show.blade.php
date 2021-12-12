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


            </table>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">File KTA Anggota</h1>
            </div>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Masa Berlaku KTA</th>
                        <th>file KTA</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $i = 1;
                        ?>
                    @forelse ($kta as $kta )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $kta->kta_berlaku_sampai }}</td>
                        <td> <img src="{{ Storage::url($kta->file_kta) }}" width="50px">

                            <a href="{{ route('data_perusahaan.editkta', $kta->id) }}" class="btn btn-info"
                                data-toggle="tooltip" title="edit perusahaan!" data-placement="top">
                                <i class="fa fa-pencil-alt"></i>
                            </a>

                            <form action="{{ route('data_perusahaan.destroyKta', $kta->id) }}" method="POST"
                                class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Tidak Ada Data
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('data_perusahaan.index') }}" class="btn btn-primary">Kembali </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection