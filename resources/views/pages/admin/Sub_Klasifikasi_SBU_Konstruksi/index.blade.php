@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Sub_Klasifikasi_SBU_Konstruksi</h1>
        <a href="{{ route('Sub_Klasifikasi_SBU_Konstruksi.create') }}" class="btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Sub_Klasifikasi_SBU_Konstruksi
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
                            <th>klasifikasi_sbu_konstruksi_id </th>
                            <th>kode</th>
                            <th>sub_klasifikasi</th>
                            <th>lingkup_pekerjaan</th>
                            <th>keterangan </th>
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
                            <td>{{ $item-> klasifikasi_sbu_konstruksi_id }}</td>
                            <td>{{ $item-> kode }}</td>
                            <td>{{ $item-> sub_klasifikasi }}</td>
                            <td>{{ $item-> lingkup_pekerjaan }}</td>
                            <td>{{ $item-> keterangan }}</td>
                            <td>
                                <a href="{{ route( 'Sub_Klasifikasi_SBU_Konstruksi.edit', $item->id) }}"
                                    class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route( 'Sub_Klasifikasi_SBU_Konstruksi.destroy', $item->id) }}"
                                    method="POST" class="d-inline" onclick="return confirm('Yakin ingin menghapus?');">
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