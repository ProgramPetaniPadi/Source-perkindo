@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Pengurus {{ $item->nama }}</h1>
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
            <form action="{{ route('data_perusahaan.updatekta', $item->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="kta_berlaku_sampai">kta_berlaku_sampai</label>
                    <input type="date" class="form-control" name="kta_berlaku_sampai" placeholder="kta_berlaku_sampai"
                        value="{{ $item->kta_berlaku_sampai }}">
                </div>

                <label for="file_kta"> Upload foto : </label>
                @if($item->file_kta)
                <iframe src="{{  Storage::url($item->file_kta)  }}" frameBorder="0" height="100%" width="100%"
                    class="my-3"></iframe>
                @else
                Tidak ada file
                @endif
                <div class="form-group">
                    <input type="file" class="form-control-file" name="file_kta" id="file_kta">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
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