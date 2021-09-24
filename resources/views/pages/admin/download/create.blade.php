@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Download</h1>
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
            <form action="{{ route('download.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="kategori_download_id">kategori_download_id</label>

                    <select name="kategori_download_id" required class="form-control">
                        <option value="">....pilih kategori download...</option>
                        @foreach ($kategori_download as $kategori_download)
                        <option value="{{ $kategori_download->id }}">
                            {{ $kategori_download->kategori_download }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dokumen">file</label>
                    <input type="file" class="form-control" name="dokumen" placeholder="dokumen">
                </div>
                <div class="form-group">
                    <label for="judul">judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="judul">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Simpan Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection