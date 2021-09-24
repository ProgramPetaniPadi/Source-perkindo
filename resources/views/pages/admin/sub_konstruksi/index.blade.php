@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Sub Konstruksi</h1>
        <a href="{{ route('sub_konstruksi.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Sub Konstruksi
        </a>
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
                            <th>No Seri Formulir</th>
                            <th>Nomor Keanggotaan</th>
                            <th>Tanggal Masuk</th>
                            <th>Berlaku Sampai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @forelse ($items as $item )
                        <tr>

                            <td>{{ $i++ }}</td>
                            <td> {{$item->no_seri_formulir}}</td>
                            <td>{{ $item->anggota_id}}</td>
                            <td>{{ $item->tanggal_masuk }}</td>
                            <td>{{ $item->berlaku_sampai }}</td>

                            <td>
                                <a href="{{ route( 'sub_konstruksi.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('sub_konstruksi.show', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('sub_konstruksi.destroy', $item->id) }}" method="POST"
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
            </div>
        </div>
    </div>

</div>



<!-- /.container-fluid -->
@endsection

<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>