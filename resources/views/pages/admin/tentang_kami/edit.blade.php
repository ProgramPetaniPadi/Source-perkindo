@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Profil </h1>
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
            <form action="{{ route('tentang_kami.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="deskripsi" class="label">deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10">{{ $item->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="visi" class="label">visi</label>
                    <textarea name="visi" id="visi" cols="30" rows="10">{{ $item->visi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="misi" class="label">misi</label>
                    <textarea name="misi" id="misi" cols="30" rows="10">{{ $item->misi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="sejarah" class="label">sejarah</label>
                    <textarea name="sejarah" id="sejarah" cols="30" rows="10">{{ $item->sejarah }}</textarea>
                </div>
                <div class="form-group">
                    <label for="nomor_hp">nomor_hp</label>
                    <input type="text" class="form-control" name="nomor_hp" placeholder="nomor_hp"
                        value="{{ $item->nomor_hp }}">
                </div>
                <div class="form-group">
                    <label for="email1">email1</label>
                    <input type="text" class="form-control" name="email1" placeholder="email1"
                        value="{{ $item->email1 }}">
                </div>
                <div class="form-group">
                    <label for="email2">email2</label>
                    <input type="text" class="form-control" name="email2" placeholder="email2"
                        value="{{ $item->email2 }}">
                </div>
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="alamat"
                        value="{{ $item->alamat }}">
                </div>
                <div class="form-group">
                    <label for="map">map</label>
                    <input type="text" class="form-control" name="map" placeholder="map" value="{{ $item->map }}">
                </div>
                <div class="form-group">
                    <label for="instagram">instagram</label>
                    <input type="text" class="form-control" name="instagram" placeholder="instagram"
                        value="{{ $item->instagram }}">
                </div>
                <div class="form-group">
                    <label for="facebook">facebook</label>
                    <input type="text" class="form-control" name="facebook" placeholder="facebook"
                        value="{{ $item->facebook }}">
                </div>


                <button type="submit" class="btn btn-primary btn-block">
                    Ubah Data
                </button>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid  -->
@endsection
@push('addon-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('deskripsi', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('visi', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('misi', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('sejarah', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>


@endpush