<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

require 'functions.php';

$heartrate = $_POST["heartrate"];

$result = mysqli_query($conn, "INSERT INTO tambahdenyut VALUES ('$heartrate')");

if ($heartrate < 120) {
    $level = 1;
    echo "
            <script> 
                alert('Diagnosa Sementara : Normal / Dehidrasi Ringan');
            </script>
        ";
} elseif ($heartrate < 139) {
    $level = 2;
    echo "
            <script> 
                alert('Diagnosa Sementara : Dehidrasi Sedang');
            </script>
        ";
} elseif ($heartrate > 140) {
    $level = 3;
    echo "
            <script> 
                alert('Diagnosa Sementara : Dehidrasi Berat');
            </script>
        ";
}

?>


<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Justifikasi</title>
    <link rel="stylesheet" href="frontend/libraries/bootsrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="frontend/styles/main.css">

    <script type="text/javascript">
        function hitung() {
            var hsl = 0;
            document.getElementById('fisik').value = "0";
            for (i = 1; i <= 17; i++) {
                var fisik = document.getElementById('fisik').value
                var check = document.getElementById('defaultCheck' + i).checked;
                var val = document.getElementById('defaultCheck' + i).value;
                if (check == true) {
                    var hsl = parseInt(fisik) + parseInt(val);
                }

                document.getElementById('fisik').value = hsl;
            }
        }
    </script>
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

    <!-- Biodata Pasien -->
    <section class="kondisifisik" id="kondisifisik">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <p class="judulfisik">Penilaian Kondisi Fisik</p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-lg-12">
                    <p class="basedon">Based On</p>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-lg-12">
                    <p class="bukupelayanan">Buku Pelayanan Kesehatan Anak di Rumah Sakit Pedoman Bagi Rumah Sakit Rujukan Tingkat Pertama
                        di Kabupaten/Kota, 2009.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Biodata   -->

    <!-- Aspek Penilaian -->
    <section class="cek" id="cek">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <p>1. Keadaan Umum Pasien</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck1">Sehat, Aktif</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" id="defaultCheck2" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck2">Mengantuk, Rewel, Gelisah</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" id="defaultCheck3" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck3">Tidak sadar, Lemah</label>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <p>2. Air Mata</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck4" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck4">Ada</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" id="defaultCheck5" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck2">Tidak Ada</label>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <p>3. Kondisi Mata (Membutuhkan konfirmasi keluarga/wali)</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck6" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck6">Normal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" id="defaultCheck7" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck7">Cekung</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" id="defaultCheck8" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck8">Sangat cekung</label>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <p>4. Kondisi Mulut/Lidah</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck9" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck9">Basah</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" id="defaultCheck10" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck10">Kering</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" id="defaultCheck11" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck12">Sangat Kering</label>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <p>5. Kondisi Napas</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck12" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck9">Normal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" id="defaultCheck13" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck10">Agak cepat</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" id="defaultCheck14" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck12">Cepat dan Dalam</label>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <p>6. Cubitan pada Kulit (sangat lambat jika > 2 detik)</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 ml-auto mr-sm-auto">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck15" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck9">Kembali normal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="2" id="defaultCheck16" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck10">Kembali lambat</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" id="defaultCheck17" onchange="hitung()">
                        <label class="form-check-label" for="defaultCheck12">Sangat lambat</label>
                    </div>
                </div>
            </div>

            <br>

            <div class="row text-center">
                <form method="POST" action="dashboard.php" class="col ml-auto mr-sm-auto">
                    <input type="hidden" name="sementara" id="sementara" class="form-control" value="<?php echo $level; ?>">
                    <input type="hidden" name="fisik" id="fisik" class="form-control form-control-sm">
                    <button type="submit" class="btn btn-fisik px-5 mt-3">Hasil</button>
                </form>
            </div>

        </div>
    </section>
    <!-- Akhir penilaian -->

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
</body>

</html>