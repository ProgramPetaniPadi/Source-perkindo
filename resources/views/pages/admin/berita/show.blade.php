@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengurus {{ $item->judul }}</h1>
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
                    <th>Judul</th>
                    <td>{{ $item->judul }}</td>
                </tr>
                <tr>
                    <th>Isi Berita</th>
                    <td>{!! $item->isi !!}</td>
                </tr>
                <tr>
                    <th>Poto</th>
                    <td>
                        <img src="{{ Storage::url($item->foto) }}" width="200px">
                    </td>
                </tr>

            </table>


            <a href="{{ route('berita.index') }}" class="btn btn-primary">Kembali </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection