@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Perpanjang Pembayaran KTA</h1>
    </div>



    <div class="row">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Keanggotaan</th>
                            <th>Nama Perusahaan</th>
                            <th>Nama Bank</th>
                            <th>Keterangan</th>
                            <th>Proses</th>
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
                            <td>{{ $item->anggota_id}}</td>
                            <td>{{ $item->tanggal_dikeluarkan_sbu}}</td>
                            <td>{{ $item->berlaku_sampai}}</td>
                            <td>{{ $item->pj_operasional}}</td>

                            <td>
                                <a href="{{ route( 'sub_non_konstruksi.edit', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <a href="{{ route('sub_non_konstruksi.show', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ route('sub_non_konstruksi.destroy', $item->id) }}" method="POST"
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