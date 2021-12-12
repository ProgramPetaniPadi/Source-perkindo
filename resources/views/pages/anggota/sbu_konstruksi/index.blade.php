@extends('layouts.anggota')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">SBU Konstruksi </h1>

    </div>


    <div class="card shadow mb-4">
        <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Seri Formulir</th>
                            <th>Tanggal di Keluarkan SBU</th>
                            <th>Berlaku Sampai</th>
                            <th>Registrasi Tahun Ke 2</th>
                            <th>Registrasi Tahun Ke 3</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Nomor Seri Formulir</td>
                            <td>Tanggal di Keluarkan SBU</td>
                            <td>Berlaku Sampai</td>
                            <td>Registrasi Tahun Ke 2</td>
                            <td>Registrasi Tahun Ke 3</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection