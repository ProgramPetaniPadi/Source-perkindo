@extends('layouts.anggota')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">KTA </h1>

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
                            <th></th>
                            <th>Nomor Keanggotaan</th>
                            <th>KTA Berlaku Sampai</th>
                        </tr>

                    </thead>

                    <tbody>
                        @foreach($kta as $ktas)
                        @if($LoggedUserInfo['id'] == $ktas->anggota_id)
                        <tr>
                            <td>{{$ktas->id}}</td>
                            <td>{{$ktas->anggota_id}}</td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection