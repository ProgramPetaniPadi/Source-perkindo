@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profil Perkindo</h1>

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
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    @forelse ($items as $item)
                    <tr>
                        <th>Deskrip</th>
                        <td>{!! $item->deskripsi !!}</td>
                    </tr>
                    <tr>
                        <th>Visi </th>
                        <td>{!! $item->visi !!}</td>
                    </tr>
                    <tr>
                        <th>Misi</th>
                        <td>{!! $item->misi!!}</td>
                    </tr>
                    <tr>
                        <th>Sejarah</th>
                        <td>{!! $item->sejarah !!}</td>
                    </tr>
                    <tr>
                        <th>Nomor HP </th>
                        <td>{{ $item->nomor_hp }}</td>
                    </tr>
                    <tr>
                        <th>Email 1</th>
                        <td>{{ $item->email1 }}</td>
                    </tr>
                    <tr>
                        <th>Email 2</th>
                        <td>{{ $item->email2 }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $item->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Map</th>
                        <td>{{ $item->map }}</td>
                    </tr>
                    <tr>
                        <th>Instagram</th>
                        <td>{{ $item->instagram }}</td>
                    </tr>
                    <tr>
                        <th>Facebook</th>
                        <td>{{ $item->facebook }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            Tidak Ada Data
                        </td>
                    </tr>
                    @endforelse

                </table>
                <a href="{{ route('tentang_kami.edit', $item->id) }}" class="btn btn-info">
                    <i class="fa fa-pencil-alt"></i>
                </a>
                <!-- <a href="{{ route('agama.show', $item->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a> -->
                <form action="{{ route('tentang_kami.destroy', $item->id) }}" method="POST" class="d-inline"
                    onclick="return confirm('Yakin ingin menghapus?');">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection