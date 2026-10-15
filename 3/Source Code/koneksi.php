<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$port = 3306;
$db = 'akademik';

$koneksi = mysqli_connect($host, $user, $password, $db, $port);

if(!$koneksi) {
    die("koneksi gagal" . mysqli_connect_error());
}
echo "Koneksi ke server MySQL Berhasil! ";
?>