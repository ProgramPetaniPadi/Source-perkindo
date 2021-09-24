@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Sub_Klasifikasi_SBU_Konstruksi
            {{ $item->klasifikasi_sbu_konstruksi_id }}
        </h1>
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
            <form action="{{ route('Sub_Klasifikasi_SBU_Konstruksi.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="klasifikasi_sbu_konstruksi_id">JABATAN</label>

                    <select name="klasifikasi_sbu_konstruksi_id" required class="form-control">
                        <option value="">....Pilih Jabatan....</option>
                        @foreach ($klasifikasi as $klasifikasi)
                        <option value="{{ $klasifikasi->id }}">
                            {{ $klasifikasi->klasifikasi }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode">kode</label>
                    <input type="text" class="form-control" name="kode" placeholder="kode" value="{{ $item->kode }}">
                </div>
                <div class="form-group">
                    <label for="sub_klasifikasi">sub_klasifikasi</label>
                    <input type="text" class="form-control" name="sub_klasifikasi" placeholder="sub_klasifikasi"
                        value="{{ $item->sub_klasifikasi }}">
                </div>
                <div class="form-group">
                    <label for="lingkup_pekerjaan" class="label">lingkup_pekerjaan</label>
                    <textarea name="lingkup_pekerjaan" id="lingkup_pekerjaan" cols="30" rows="10"
                        value="{{ $item->lingkup_pekerjaan }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="keterangan">keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="keterangan"
                        value="{{ $item->keterangan }}">
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
CKEDITOR.replace('lingkup_pekerjaan', {
    filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
</script>


@endpush