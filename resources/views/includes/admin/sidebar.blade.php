<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3"> {{ Auth::user()->name }} <sup>admin</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin') ?'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li
        class="nav-item {{ request()->is('admin/agama') || request()->is('admin/rekening') || request()->is('admin/jabatan') || request()->is('admin/data_pengurus') ?'active' : '' }}">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapsePengurus"
            aria-expanded="true" aria-controls="collapsePengurus">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                <path
                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
            </svg>
            <span>Pengurus</span>
        </a>
        <div id="collapsePengurus" class="collapse" aria-labelledby="headingPengurus" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item " href="{{ route('agama.index') }}">Agama</a>
                <a class="collapse-item" href="{{ route('rekening.index') }}">Rekening Pembayaran</a>
                <a class="collapse-item" href="{{ route('jabatan.index') }}">Jabatan</a>
                <a class="collapse-item" href="{{ route('data_pengurus.index') }}">Data Pengurus</a>
                <a class="collapse-item" href="{{ route('foto-pengurus.index') }}">Poto Pengurus</a>
                <a class="collapse-item" href="{{ route('struktur-organisasi.index') }}">Struktur Organisasi</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting"
            aria-expanded="true" aria-controls="collapseSetting">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Setting </a></span>
        </a>
        <div id="collapseSetting" class="collapse" aria-labelledby="headingSetting" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('tentang_kami.index') }}">Profil </a>
                <a class=" collapse-item" href="{{ route('berita.index') }}">Berita</a>
                <a class="collapse-item" href="{{ route('agenda.index') }}">Agenda</a>
                <a class="collapse-item" href="{{ route('kategori_download.index') }}">Kategori Download</a>
                <a class="collapse-item" href="{{ route('download.index') }}">Download</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true"
            aria-controls="collapseMaster">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
            </svg>
            <span>Master </a></span>
        </a>
        <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('provinsi.index') }}">Provinsi</a>
                <a class="collapse-item" href="{{ route('kota_kabupaten.index') }}">Kota/ Kabupaten </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKlasifikasi"
            aria-expanded="true" aria-controls="collapseKlasifikasi">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list"
                viewBox="0 0 16 16">
                <path
                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                <path
                    d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
            </svg>
            <span>Klasifikasi </a></span>
        </a>
        <div id="collapseKlasifikasi" class="collapse" aria-labelledby="headingKlasifikasi"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('Klasifikasi_SBU_Konstruksi.index') }}">Klasifikasi SBU
                    Konstruksi</a>
                <a class="collapse-item" href="{{ route('Klasifikasi_SBU_Non_Konstruksi.index') }}">Klasifikasi SBU Non
                    <br>
                    Konstruksi</a>
                <a class="collapse-item" href="{{ route('Sub_Klasifikasi_SBU_Konstruksi.index') }}">Sub Klasifikasi SBU
                    <br> Konstruksi</a>
                <a class="collapse-item" href="{{ route('SubKlasifikasiSBUNon_Konstruksi.index') }}">sub Klasifikasi
                    SBU Non <br>Konstruksi</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerusahaan"
            aria-expanded="true" aria-controls="collapsePerusahaan">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                <path
                    d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
            </svg>
            <span>Perusahaan </a></span>
        </a>
        <div id="collapsePerusahaan" class="collapse" aria-labelledby="headingPerusahaan"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('data_perusahaan.index') }}">Data Perusahaan</a>
                <a class="collapse-item" href="{{ route('sub_konstruksi.index')}}">SBU Konstruksi</a>
                <a class="collapse-item" href="{{ route('sub_non_konstruksi.index')}}">SBU Non Konstruksi</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePembayaran"
            aria-expanded="true" aria-controls="collapsePembayaran">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-credit-card-2-back" viewBox="0 0 16 16">
                <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
                <path
                    d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
            </svg>
            <span>Pembayaran </a></span>
        </a>
        <div id="collapsePembayaran" class="collapse" aria-labelledby="headingPembayaran"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('pembayaran_perpanjang_kta.index') }}">KTA</a>
                <a class="collapse-item" href="buttons.html">SBU Konstruksi</a>
                <a class="collapse-item" href="cards.html">SBU Non Konstruksi</a>
                <a class="collapse-item" href="buttons.html">Registrasi SBU Konstruksi</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHistori"
            aria-expanded="true" aria-controls="collapseHistori">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-clock-history" viewBox="0 0 16 16">
                <path
                    d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                <path
                    d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
            </svg>
            <span>Histori </a></span>
        </a>
        <div id="collapseHistori" class="collapse" aria-labelledby="headingHistori" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="buttons.html">KTA</a>
                <a class="collapse-item" href="buttons.html">SBU Konstruksi</a>
                <a class="collapse-item" href="cards.html">SBU Non Konstruksi</a>
                <a class="collapse-item" href="buttons.html">Registrasi SBU Konstruksi</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePenguna"
            aria-expanded="true" aria-controls="collapsePenguna">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-check-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            <span>Penguna </a></span>
        </a>
        <div id="collapsePenguna" class="collapse" aria-labelledby="headingPenguna" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if (Auth::user()->roles=="SUPERADMIN" )
                <a class="collapse-item" href="{{route('administrator.index')}}">Adminstrator</a>
                @endif
                <a class="collapse-item" href="{{ route('ubah_password.editPsw', Auth::user()->id) }}">Ubah
                    Password</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->