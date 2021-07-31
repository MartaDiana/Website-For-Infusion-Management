<?php
session_start();

$sementara = $_POST['sementara'];
$fisik = $_POST['fisik'];
if ($fisik <= 6)
    $fisik = 1;
else if ($fisik >= 7 && $fisik <= 12)
    $fisik = 2;
else
    $fisik = 3;

// bandingkan hasil
// 1 = Tanpa dehidrasi, 2 = Dehidrasi Sedang, 3 = Dehidrasi Berat
$hsl = "";
if ($sementara > $fisik) $hsl = $sementara;
else $hsl = $fisik;

// jika tanpa dehidrasi
if ($hsl == 1) {
    header("Location: tpdh.php");
} elseif ($hsl == 2) {
    header("Location: dhringan.php");
}

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// ambil data nama pasien
$namapasien = namadb("SELECT * FROM pasien ORDER BY id DESC LIMIT 1");

//ambil berat badan pasien 
$jumlahml = jumlah("SELECT * FROM pasien ORDER BY id DESC LIMIT 1");

?>



<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="frontend/libraries/bootsrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="frontend/styles/main.css">
    <script type="text/javascript" src="backend/jquery/jquery.min.js"></script>
    <!-- script untuk deteksi denyut realtime -->
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#cekdenyut").load('ceksensor/cekdenyut.php');
                $("#cekvolume").load("ceksensor/cekvolume.php");
                $("#cektetes").load("ceksensor/cektetes.php");
                $("#cekkondisi").load("ceksensor/cekkondisi.php");
            }, 1000);
        });
    </script>

    <!-- end of script deteksi denyut jantung real time -->
</head>

<body>
    <!-- navbar -->
    <section class="bgatas" id="bgatas">
        <div class="container">
            <nav class="row navbar navbar-expand-lg navbar-light bg-white">
                <div class="navbar-nav ml-auto mr-sm-auto mr-lg-0 mr-md-auto">
                    <img src="frontend/img/pens.png" alt="pens" width="55px">
                </div>
                <ul class="navbar-nav mr-auto d-none d-lg-block">
                    <li>
                        <span class="text-muted">
                            &nbsp; &nbsp;| &nbsp; Monitoring Proses Tatalaksana Dehidrasi
                        </span>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- akhir navbar -->

    <!-- All  monitoring -->
    <!-- Begin Page Content -->
    <section class="dashboard" id="dashboard">
        <div class="container">
            <!-- Content Row -->
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4 mr-auto ml-auto nama">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2 text-center">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Nama Pasien </div>
                                    <?php foreach ($namapasien as $np) : ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $np["nama"];  ?></div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-2 col-md-6 mb-4 tatalaksana">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Tatalaksana Dehidrasi</div>
                                    <?php foreach ($jumlahml as $jmlh) : ?>
                                        <div class="h5 mb-0 font-weight text-gray-800">
                                            <p class="font-weight-bold text-dark">30 menit I:
                                                <?php
                                                $ap = 1;
                                                $pengali =  $jmlh["berat"];
                                                $hasil = $ap * $pengali;
                                                echo $hasil;
                                                ?> tetes/menit
                                            </p>
                                            <p class="font-weight-bold text-dark">150 menit II:
                                                <?php
                                                $ap = 0.45;
                                                $pengali =  $jmlh["berat"];
                                                $hasil = $ap * $pengali;
                                                echo $hasil;
                                                ?> tetes/menit
                                            </p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-2 col-md-6 mb-4  volume">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Volume Infus</div>
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <span id="cekvolume"> 99 </span> %</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-2 col-md-6 mb-4  tetesan">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Tetesan Terdeteksi
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <span id="cektetes"> 56 </span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-2 col-md-6 mb-4  kondisi">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Kondisi Infus</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"> <span id="cekkondisi"> Aman <span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-xl-3 col-md-6 mb-4 mr-auto ml-auto level">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Level Dehidrasi</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                                                                                        // if ($hsl == 1) echo "Tanpa Dehidrasi";
                                                                                        // else if ($hsl == 2) echo "Ringan";
                                                                                        if ($hsl == 3) echo "Berat";
                                                                                        ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 denyutdsh">
                    <div class="card shadow mb-3">
                        <div class="card-header ">
                            <h5 class="m-2 font-weight-bold text-primary text-center">Heart Rate</h5>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mt-5 mb-5 font-weight-bold text-gray-1500">
                                        <h1><span id="cekdenyut"></span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row text-center">
                <div class="col ml-auto mr-sm-auto">
                    <a href="logout.php" class="btn btn-dashboard px-5 mt-3 ">Log Out</a>
                </div>
            </div>
        </div>
    </section>


    <!-- akhir deteksi denyut jantung -->


    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p class="foter"> &copy; Created by Marta Diana.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- akhir footer -->









    <script src="frontend/libraries/js/jquery-3.1.1.js"></script>
    <script src="frontend/libraries/bootsrap/js/bootstrap.js"></script>
    <script src="frontend/scripts/main.js"></script>
    <script src="frontend/libraries/js/retina.min.js"></script>
    <script src="frontend/js/chart.js/Chart.js"></script>
    <script src="frontend/js/chart-area-demo.js"></script>
</body>

</html>