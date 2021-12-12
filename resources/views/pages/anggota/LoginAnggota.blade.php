<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>login anggota</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="text-center">

    <div class="background"></div>

    <main class="form-signin">


        <form method="PUT" action="{{ route('LoginAnggota') }}">
            @csrf

            <img class="mb-3" src="images/logo.png" alt="" width="210" height="150">
            <div class="form-group row">
                <label for="nama_perusahaan" class="col-md-4 col-form-label text-md-right">{{ __('Username ') }}</label>

                <div class="col-md-6">
                    <input id="nama_perusahaan" type="text"
                        class="form-control @error('nama_perusahaan') is-invalid @enderror" name="nama_perusahaan"
                        value="{{ old('nama_perusahaan') }}">
                    <span class="text-danger">@error('nama_perusahaan'){{ $message }}@enderror</span>

                    @error('nama_perusahaan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>


                </div>
            </div>
        </form>
    </main>


</body>

</html>