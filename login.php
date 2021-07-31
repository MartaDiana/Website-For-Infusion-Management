<?php

session_start();

if (isset($_SESSION["login"])) {
    header("Location:pasien.php");
    exit;
}


require 'functions.php';

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            header("Location: pasien.php");
            exit;
        }
    }

    $error = true;
}

?>




<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

    <!-- Biodata Tenaga Medis -->
    <section class="Biodatanakes" id="Biodatanakes">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <img src="frontend/img/doctor.jpg" alt="doctor" width="12%">
                </div>
            </div>

            <div class="row masuknakes">
                <div class="col-sm-6 ml-auto mr-sm-auto mt-4">
                    <form action="" method="post">
                        <div class="form-group admin">
                            <label for="username">ID Tenaga Medis</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Dapatkan ID Melalui Marta Diana">
                        </div>
                        <div class="form-group pass">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <?php if (isset($error)) :  ?>
                            <p style="color : red; font-style: italic;">username/password salah! Hubungi personal contact pada halaman utama.</p>
                        <?php endif; ?>
                        <div class="row text-center">
                            <div class="col ml-auto mr-sm-auto">
                                <button type="submit" name="login" class="btn btn-fisik px-5 mt-5">Sign In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Akhir Biodata Tenaga Medis  -->

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