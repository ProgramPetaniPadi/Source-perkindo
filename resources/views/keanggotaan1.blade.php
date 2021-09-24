<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="images/logotitle.png" type="image" size=96x96;>
    <title>PERKINDO KALBAR</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
    <link type="text/css" href='https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css' rel='stylesheet'>
    <link type="text/css" href='https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css'
        rel='stylesheet'>
    <link type="text/css" href='https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css'
        rel='stylesheet'>

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/templatemo-digital-trend.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/templatemo-digital-trend.css">
</head>

<body>
    @include('includes.navbar')

    <br><br>
    <div class="container">


        <h2 align="center" style="font-family: 'Trebuchet MS'; color: #10125f;">DATA ANGGOTA PERKINDO KALBAR
        </h2>
        <br>
        <form method="post">
            <div class="form-group">

                <!--Script untuk memanggil Javascript-->
                <table id="example" class="display responsive nowrap" style="width:100%" cellpadding="1000px">
                    <thead>
                        <tr style="color: #f15a24; background-color: #10125f;">
                            <th>Nomor Keanggotaan</th>
                            <th>Nama Perusahaan</th>
                            <th>Nama Penanggung Jawab</th>
                            <th>Alamat Perusahaan</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody style="color: #10125f;">
                        @forelse ($anggota as $anggota)
                        <tr>
                            <td>{{ $anggota->nomor_keanggotaan }}</td>
                            <td>{{ $anggota->nama_perusahaan }}</td>
                            <td>{{ $anggota->nama_penanggung_jawab }}</td>
                            <td>{{ $anggota->alamat_perusahaan }}</td>
                            <td>{{ $anggota->provinsi->provinsi }}</td>
                            <td>{{ $anggota->kota_kabupaten->kota_kabupaten }}</td>

                            <td><img src="{{ Storage::url($anggota->logo) }}" style="height:80px!important">
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                Tidak Ada Data
                            </td>
                        </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
            <div class="form-group">
        </form>
    </div>

    <!--Script Javascript-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'colvis'
            ]
        });
    });
    </script>
    <!--Script Javascript-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>


    <!-- Back To Top -->
    <div class="ignielToTop"></div>

    <!-- Whatsapp Button -->
    <div style="position:fixed;left:20px;bottom:50px;">
        <div class="icon">
            <a class="tombol"
                href="https://api.whatsapp.com/send?phone=+6289503038713&text=Halo, saya ingin berkonsultasi kepada anda">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor"
                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path
                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                </svg></a>
        </div>

    </div>
</body>

</html>