@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Admin</h1>
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
            <form action="{{ route('administrator.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="name" value="{{ $item->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="email" value="{{ $item->email}}">
                </div>




                <div class="form-group">
                    <label for="roles"><b>Status</b></label>
                    <br>
                    <input {{$item->roles == "SUPERADMIN" ? "checked" : ""}} value="SUPERADMIN" type="radio"
                        id="SUPERADMIN" name="roles">
                    <label for="SUPERADMIN">SUPERADMIN</label>
                    <br>
                    <input {{$item->roles == "ADMIN" ? "checked" : ""}} value="ADMIN" type="radio" id="ADMIN"
                        name="roles">
                    <label for="ADMIN">ADMIN Biasa/Non-Aktif</label>
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