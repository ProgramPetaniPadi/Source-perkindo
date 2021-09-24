@extends('layouts.admin')

@section('content')

@error('current_password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>

@enderror

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card-body">
    <form action="{{ route('change.password', $item->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row ">
            <div class="col-md-12">
                <div class="main-card mb-3  card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <h4>Change Password</h4>
                        </h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mt-3">
                                    <label for="current_password">Old password</label>
                                    <input type="password" name="current_password"
                                        class="form-control @error('current_password') is-invalid @enderror" required
                                        placeholder="Enter current password">
                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-3">
                                    <label for="new_password ">new password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" required
                                        placeholder="Enter the new password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-3">
                                    <label for="confirm_password">confirm password</label>
                                    <input type="password" name="confirm_password"
                                        class="form-control @error('confirm_password') is-invalid @enderror" required
                                        placeholder="Enter same password">
                                    @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-first mt-4 ml-2">
                                <button type="submit" class="btn btn-primary" id="formSubmit">change password</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endsection