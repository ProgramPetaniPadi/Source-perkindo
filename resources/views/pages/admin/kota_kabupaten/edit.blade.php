@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data kota_kabupaten {{ $item->kota_kabupaten }}</h1>
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
            <form action="{{ route('kota_kabupaten.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="provinsi_id">provinsi</label>
                    <select name="provinsi_id" required class="form-control">
                        <option value="">....pilih provinsi...</option>
                        @foreach ($provinsi as $provinsi)
                        <option value="{{ $provinsi->id }}">
                            {{ $provinsi->provinsi }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kota_kabupaten">kota_kabupaten</label>
                    <input type="text" class="form-control" name="kota_kabupaten" placeholder="kota_kabupaten"
                        value="{{ $item->kota_kabupaten }}">
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