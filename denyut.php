<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}


require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denyut Jantung</title>
    <link rel="stylesheet" href="frontend/libraries/bootsrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="frontend/styles/main.css">
    <script type="text/javascript" src="backend/jquery/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#cekdenyut").load('ceksensor/cekdenyut.php');
            }, 1000);
        });
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

    <!-- Denyut Jantung Pasien -->
    <section class="cek2" id="cek2">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-7 ml-auto mr-sm-auto denyut">
                    <div class="card shadow mb-4 mt-4">
                        <div class="card-header ">
                            <h5 class="m-3 font-weight-bold text-primary text-center">Heart Rate</h5>
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

            <div class="row">
                <div class="col-lg-2 col-sm-2 cl-md-2 mr-auto ml-auto">
                    <form action="kondisifisik.php" method="post">
                        <div class="hasildenyut">
                            <h4 class="text-center">Hasil Heart Rate</h4>
                        </div>
                        <div>
                            <input class="form-control text-center" type="text" name="heartrate" placeholder="Beats per Minutes" required>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" name="cekdenyut" class="btn btn-fisik px-5 mt-1">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Denyut    -->

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


</body>

</html>