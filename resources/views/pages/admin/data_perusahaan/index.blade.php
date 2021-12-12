@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Perusahaan</h1>
        <a href="{{ route('data_perusahaan.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Perusahaan
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
                            <th>Nomor Keanggotaan</th>
                            <th>Nama Perusahaan</th>
                            <th>Nama Penanggung Jawab</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->nomor_keanggotaan}}</td>
                            <td>{{ $item->nama_perusahaan }}</td>
                            <td>{{ $item->nama_penanggung_jawab }}</td>


                            <td>
                                <a href="{{ route('data_perusahaan.edit', $item->id) }}" class="btn btn-info"
                                    data-toggle="tooltip" title="edit perusahaan!" data-placement="top">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('data_perusahaan.show', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('tambah_kta.edit', $item->id) }}" class="btn btn-info"
                                    data-toggle="tooltip" title="tambah KTA!" data-placement="top">
                                    <i class="fas fa-plus"></i>
                                </a>


                                <form action="{{ route('data_perusahaan.destroy', $item->id) }}" method="POST"
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