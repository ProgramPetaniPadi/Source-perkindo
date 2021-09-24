@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Berita</h1>
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
            <form action="{{ route('berita.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="judul">judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="judul" value="{{ $item->judul }}">
                </div>
                <div class="form-group">
                    <label for="isi" class="label">Isi Berita</label>
                    <textarea name="isi" id="isi" cols="30" rows="10" value="">{{ $item->isi }}</textarea>
                </div>

                <label for="foto"> Upload foto : </label>
                @if($item->foto)
                <iframe src="{{  Storage::url($item->foto)  }}" frameBorder="0" height="100%" width="100%"
                    class="my-3"></iframe>
                @else
                Tidak ada file
                @endif
                <div class="form-group">
                    <input type="file" class="form-control-file" name="foto" id="foto">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                </div>
                <div class="checkbox">
                    <input type="hidden" name="publish" value="0">
                    <label><input type="checkbox" id="publish" name="publish" value="1"> Publish</label>
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

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('isi', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>


@endpush