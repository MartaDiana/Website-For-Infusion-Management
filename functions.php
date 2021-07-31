<?php

$conn = mysqli_connect("localhost", "root", "", "tatalaksana");

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar');
              </script>";
        return false;
    }

    //cek konfirmasi password 
    if ($password !== $password2) {
        echo "<script>
        alert ('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // enskripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //menambhakan data baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;
    // ambil data dari elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $usia = htmlspecialchars($data["usia"]);
    $berat = htmlspecialchars($data["berat"]);

    mysqli_query($conn, "INSERT INTO pasien VALUES ('', '$nama', '$usia', '$berat')");

    return mysqli_affected_rows($conn);
}

function namadb($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function jumlah($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
