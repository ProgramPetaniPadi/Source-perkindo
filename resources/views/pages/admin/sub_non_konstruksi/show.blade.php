@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail SUB Kondtruksi {{ $item->no_seri_formulir }}</h1>
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
                    <th>No Seri Formulir</th>
                    <td>{{ $item->no_seri_formulir }}</td>
                </tr>
                <tr>
                    <th>Anggota</th>
                    <td>{{ $item->anggota_id }}</td>
                </tr>
                <tr>
                    <th>Tanggal Dikeluarkan SBU</th>
                    <td>{{ $item->tanggal_dikeluarkan_sbu }}</td>
                </tr>
                <tr>
                    <th>Berlaku Sampai</th>
                    <td>{{ $item->berlaku_sampai }}</td>
                </tr>
                <tr>
                    <th> PJ Operasional</th>
                    <td>{{ $item->pj_operasional }}</td>
                </tr>
                <tr>
                    <th>Poto</th>
                    <td>
                        <img src="{{ Storage::url($item->foto) }}" width="200px">
                    </td>
                </tr>

            </table>


            <a href="{{ route('sub_non_konstruksi.index') }}" class="btn btn-primary">Kembali </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection