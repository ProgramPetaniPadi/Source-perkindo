@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data download {{ $item->kategori_download_id}}</h1>
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
            <form action="{{ route('download.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class=" form-group">
                    <label for="kategori_download_id">kategori download </label>
                    <select name="kategori_download_id" required class="form-control">
                        <option value="">....pilih kategori download...</option>
                        @foreach ($kategori_download as $kategori_download)
                        <option value="{{ $kategori_download->id }}">
                            {{ $kategori_download->kategori_download }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <label for="dokumen"> Upload dokumen : </label>
                @if($item->dokumen)
                <iframe src="{{  Storage::url($item->dokumen)  }}" frameBorder="0" height="100%" width="100%"
                    class="my-3"></iframe>
                @else
                Tidak ada file
                @endif
                <div class="form-group">
                    <input type="file" class="form-control-file" name="dokumen" id="dokumen">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah dokumen</small>
                </div>
                <div class="form-group">
                    <label for="judul">judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="judul" value="{{ $item->judul }}">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Ubah Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection