@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data struktur organisasi</h1>
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
            <form action="{{ route('struktur-organisasi.update', $item->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="periode">periode</label>
                    <input type="text" class="form-control" name="periode" placeholder="periode"
                        value="{{ $item->periode }}">
                </div>
                <label for="gambar"> Upload Gambar : </label>
                @if($item->gambar)
                <iframe src="{{  Storage::url($item->gambar)  }}" frameBorder="0" height="100%" width="100%"
                    class="my-3"></iframe>
                @else
                Tidak ada file
                @endif
                <div class="form-group">
                    <input type="file" class="form-control-file" name="gambar" id="gambar">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
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