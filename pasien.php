<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

require 'functions.php';

// cek apakah tombol sumbit sudah ditekan atau belum
if (isset($_POST["datapasien"])) {

    // cek data berhasil ditambahkan atau tidak 
    if (tambah($_POST) > 0) {
        echo "
            <script> 
                alert('data pasien berhasil ditambahkan');
                document.location.href = 'denyut.php';
            </script>
        ";
    } else {
        echo "
            <script> 
                alert('data pasien gagal ditambahkan');
                document.location.href = 'denyut.php';
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
    <link rel="stylesheet" href="frontend/libraries/bootsrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="frontend/styles/main.css">
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
    <section class="pasien" id="pasien">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <img src="frontend/img/pasien.png" alt="pasien" width="12%">
                </div>
            </div>

            <div class="row datapasien">
                <div class="col-sm-6 ml-auto mr-sm-auto">
                    <form action="" method="post">
                        <div class="form-group namapasien">
                            <label for="nama">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group usia">
                            <label for="usia">Usia</label>
                            <input type="text" class="form-control" name="usia" id="usia" placeholder="Usia sekarang" required>
                        </div>
                        <div class="form-group beratbadan">
                            <label for="berat">Berat Badan</label>
                            <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat Badan (Kg)" required>
                        </div>
                        <div class="row text-center">
                            <div class="col ml-auto mr-sm-auto">
                                <button type="submit" name="datapasien" class="btn btn-fisik px-5 mt-3">Mulai Pemeriksaan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Biodata   -->

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