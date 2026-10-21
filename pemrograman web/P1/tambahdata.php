<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unjani";

// buat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// cek koneksi
if (!$conn) {
    echo "Connection gagal";
}

$sql = "INSERT INTO mahasiswa (nim, nama, email)
VALUES ('4121221', 'Dimas Prikitiw', 'dimas@unjani.com')";

if (mysqli_query($conn, $sql)) {
    echo "data berhasil ditambah";
} else {
    echo "Gagal";
}

mysqli_close($conn);
?>