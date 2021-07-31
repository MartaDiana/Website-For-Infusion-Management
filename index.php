<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="frontend/libraries/bootsrap/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="frontend/styles/main.css">
</head>


<body>

    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light">
        <div class="container">
            <img src="frontend/img/pens.png" width="60px;" alt="logopens">
            <a class="navbar-brand ml-2 page-scroll" href="#home">Seniman's Tari</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link page-scroll" href="#home">Home </a>
                    <a class="nav-item nav-link page-scroll" href="#abstrak">Abstrak</a>
                    <a class="nav-item nav-link page-scroll" href="#about">About</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->


    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">
                Monitoring dan Controlling Laju
                <br />
                Tetesan Cairan Infus Berdasarkan Proses
                <br />
                Tatalaksana Dehidrasi pada Anak
            </h1>
            <hr>
            <p class="lead mt-3">
                Politeknik Elektronika Negeri Surabaya
                <br />
                D4 Teknik Elektronika
            </p>
            <a href="login.php" class="btn btn-get-started px-4 mt-4">
                Get started
            </a>
        </div>
    </div>
    <!-- jumbotron -->

    <!-- abstrak -->
    <section class="abstrak" id="abstrak">
        <div class="container">
            <div class="row">
                <div class="col text-center section-heading">
                    <h2>Abstrak</h2>
                    <hr>
                    <p>
                        Diare merupakan penyakit endemis potensial Kejadian Luar Biasa (KLB)
                        yang sering disertai dengan kematian di Indonesia. Salah satu akibat diare
                        yaitu hilangnya cairan dalam tubuh, atau disebut dengan dehidrasi.
                        Derajat dehidrasi dapat dibagi menjadi 3 yaitu tanpa dehidrasi, dehidrasi
                        ringan-sedang dan dehidrasi berat. Pembagian derajat dehidrasi dapat
                        dilihat dari kondisi fisik dan denyut jantung pada anak. Denyut jantung
                        akan dideteksi dengan menggunakan metode photoplethysmograph
                        (PPG) secara reflectance dengan menggunakan sensor MAX30102.
                        Kemudian motor servo dengan kendali Proportional Integral berperan
                        untuk mendorong klem infus untuk mengatur jumlah tetesan pada infus
                        setiap menitnya sesuai dengan setting poin yang telah ditentukan. LED
                        dan photodioda difungsikan untuk mendeteksi tetesan infus. Sensor load
                        cell difungsikan untuk mendeteksi volume infus. Sensor optocoupler
                        difungsikan untuk mendeteksi emboli udara. Sensor TCS34725
                        difungsikan untuk mendeteksi naiknya darah pada selang infus. Hasil dari
                        monitoring dan controlling yang diproses oleh Arduino Uno dan
                        dikirimkan ke ESP32 melalaui Komunikasi Serial, yang akan disimpan
                        pada database MySQL, kemudian data yang terkumpul akan ditampilkan
                        pada website sebagai user interface.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- akhir abstrak -->

    <!-- about -->
    <section class="about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <img src="frontend/img/marta.png" alt="marta" width="50%" class="rounded-circle img-thumbnail">
                </div>

                <div class="col-sm-4">
                    <div class="card text-white bg-primary mb-2">
                        <div class="card-body">
                            <h5 class="card-title text-center">Contact Me</h5>
                            <hr>
                            <p class="text-center">
                                <a class="link" href="https://www.instagram.com/martaadiana_/">Find Marta Diana on Instagram</a>
                            </p>
                        </div>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <h1>Biodata</h1>
                        </li>
                        <li class="list-group-item">Marta Diana</li>
                        <li class="list-group-item">1110171056</li>
                        <li class="list-group-item">D4 Teknik Elektronika</li>
                        <li class="list-group-item">089-803-242-82</li>
                    </ul>
                </div>
            </div>
    </section>
    <!-- akhir about -->

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