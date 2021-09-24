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
    <!-- HERO -->
    <section class="hero hero-bg d-flex justify-content-center align-items-center" id="home">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                    <div class="hero-text">

                        <h2 class="text-white" data-aos="fade-up"> <strong>PERKINDO BERSATU </strong> <br>
                            <h2 class="text-white" style="font-family: 'Yellowtail', cursive;"> Tingkatkan kinerja dan
                                <strong>Loyalitas</strong>
                                Untuk Lebih Maju dan <strong>Profesional</strong>
                            </h2>
                        </h2>

                        <a href=" #hubungi" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="300">
                            Hubungi Kami</a>

                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <br><br><br><br>
                    <div class="hero-image" data-aos="fade-up" data-aos-delay="200">

                        <img src="images/logo1.png" class="img-fluid" alt="working girl">
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ABOUT -->

    <section class="about section-padding pb-0" id="about">

        <div class="container">
            <div class="row">

                <div class="col-lg-7 mx-auto col-md-10 col-12">
                    <div class="about-info">

                        <h2 class="mb-4" data-aos="fade-up">Tentang <strong>Kami</strong></h2>
                        @forelse ($items as $item)
                        <p class="mb-0" data-aos="fade-up">
                            {!! $item->deskripsi !!}
                        </p>

                        <div class="buttonprofil">
                            <ul>
                                <a data-aos="fade-up" href="#popup" class="left">Visi & Misi</a>
                                <a data-aos="fade-up" href="#popup1" class="right">Sejarah</a>
                            </ul>
                            <!-- Left Pop Up-->
                            <div class="popup-wrapper" id="popup">
                                <div class="popup-container" id="pop">
                                    <!-- Isi Popup -->
                                    <h1
                                        style="font-size : var(--h3-font-size); font-family:Montserrat-Bold; color:var(--primary-color);">
                                        Visi & Misi PERKINDO</h1>
                                    <h3 style="font-family: Montserrat-Bold; color: var(--secondary-color);">
                                        Visi
                                    </h3>
                                    <p style="font-size:13px; text-align: justify;"> {!! $item->visi !!}</p>

                                    <h3 style="font-family: Montserrat-Bold; color: var(--secondary-color);">Misi
                                    </h3>
                                    <ul style="font-size:13px">
                                        <p style="font-size:12px; text-align: justify;"> {!! $item->misi !!}</p>
                                    </ul>
                                    <!-- Tombol Close Popup -->
                                    <a class="popup-close" href="#buttonprofil">X</a>
                                </div>
                            </div>
                            <!-- Left Pop Up-->
                            <div class="popup-wrapper" id="popup1">
                                <div class="popup-container" id="pop">
                                    <!-- Isi Popup -->
                                    <h1
                                        style="font-size : var(--h3-font-size); font-family:Montserrat-Bold; color:var(--primary-color);">
                                        Sejarah <strong>PERKINDO</strong> KALBAR</h1>
                                    <p style="font-size:12px; text-align: justify;"> {!! $item->sejarah !!}</p>
                                    <!-- Tombol Close Popup -->
                                    <a class="popup-close" href="#buttonprofil">X</a>
                                </div>
                            </div>
                        </div>
                        @empty

                        Tidak Ada Data

                        @endforelse

                        <div class="about-image" data-aos="fade-up" data-aos-delay="200">

                            <img src="images/kantor.png" class="img-fluid" alt="office">
                        </div>
                    </div>

                </div>
            </div>

    </section>


    <!-- PROJECT -->
    <section class="project section-padding" id="profil">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 col-12">

                    <h2 class="mb-5 text-center" data-aos="fade-up">
                        Kepuasan anda prioritas kami,
                        <strong>Terus berkarya</strong> untuk kemajuan Indonesia
                    </h2>

                    <div class="owl-carousel " id="project-slide">

                        @forelse ($berita as $berita)
                        <div class="item project-wrapper" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ Storage::url($berita->foto) }}" class="img-fluid" alt="project image"
                                style="height:300px!important">
                            <div class="project-info">
                                <span>
                                    <a href="{{ url('/showdetail/'.$berita->id) }}" class="btn btn-info">
                                        {!! $berita->judul !!}
                                    </a>
                                </span>
                            </div>
                        </div>
                        @empty
                        Tidak Ada Data
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="site-footer" id="hubungi">
        <div class="container">
            <div class="row">
                @forelse ($footer as $footer)
                <div class="google-map" data-aos="zoom-in">

                    <iframe src="{{ $footer->map}}" width="1920" height="600" frameborder="0" style="border:0;"
                        allowfullscreen=""></iframe>
                </div>

                <div class="col-lg-3 mx-lg-auto col-md-15 col-10" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="my-4">Kontak</h4>
                    <p class="mb-1">
                        <i class="fa fa-phone mr-2 footer-icon"></i>
                        {{ $footer->nomor_hp }}
                    </p>
                    <p class="mb-1" style="font-size: 16.5px;">
                        <i class="fa fa-envelope mr-2 footer-icon"></i>
                        {{ $footer->email1 }}
                    </p>
                    <p class="mb-1" style="font-size: 14.5px;">
                        <i class="fa fa-home mr-2 footer-icon"></i>
                        {{ $footer->email2 }}
                    </p>
                    <p class="mb-1" style="font-size: 14.5px;">
                        <i class="fa fa-home mr-2 footer-icon"></i>
                        {{ $footer->instagram }}
                    </p>

                </div>

                <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="300">
                    <h4 class="my-4">Alamat</h4>

                    <p class="mb-1">
                        <i class="fa fa-home mr-2 footer-icon"></i>
                        {{ $footer->alamat }}
                    </p>
                </div>

                <div class="col-lg-4 mx-lg-auto text-center col-md-8 col-12" data-aos="fade-up" data-aos-delay="400">
                    <p class="copyright-text">Copyright &copy; 2021 PERKINDO KALBAR
                        <br>
                        <a rel="nofollow noopener" href="https://idekite.id">Design: Idekite Indonesia</a>
                    </p>
                </div>



                <div class="col-lg-3 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                    <ul class="social-icon">
                        <li><a href=" {{ $footer->instagram }}" target="_blank" class="fa fa-instagram"></a></li>
                        <li><a href=" {{ $footer->map }}" target="_blank" class="fa fa-map-marker"></a></li>

                    </ul>
                </div>
                @empty

                Tidak Ada Data

                @endforelse
            </div>
        </div>
    </footer>


    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/custom.js"></script>


    <!-- Back To Top -->
    <div class="ignielToTop"></div>

    <!-- Whatsapp Button -->
    <div style="position:fixed;left:20px;bottom:50px;">
        <div class="icon">
            <a class="tombol"
                href="https://api.whatsapp.com/send?phone={{ $wa }}&text=Halo, saya ingin berkonsultasi kepada anda">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path
                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                </svg></a>
        </div>
    </div>
</body>

</html>