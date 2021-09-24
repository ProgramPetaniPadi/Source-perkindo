<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="images/logotitle.png" type="image" size=96x96;>
    <title>PERKINDO KALBAR</title>
    <!--

DIGITAL TREND

https://templatemo.com/tm-538-digital-trend

-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/templatemo-digital-trend.css">

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- MENU BAR -->
    @include('includes.navbar')
    <!-- BLOG -->
    <br><br><br> <br><br>
    @forelse ($gambar as $gambar)
    <tr>


        <td><img src="{{ Storage::url($gambar->gambar) }}" width="100%"></td>


    </tr>

    @empty
    <tr>
        <td colspan="3" class="text-center">
            Tidak Ada Data
        </td>
    </tr>
    @endforelse

</body>

</html>