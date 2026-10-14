<?php
include 'koneksi.php';

mysqli_select_db($koneksi, 'akademik');

$kode_mk = $_POST['kode_mk'];
$nama_mk = $_POST['nama_mk'];
$sks = $_POST['sks'];
$dosen_id = $_POST['dosen_id'];

$query = mysqli_query (
    $koneksi,
    "INSERT INTO mata_kuliah
    (kode_mk, nama_mk, sks, dosen_id)
    VALUES
    ('$kode_mk', '$nama_mk', '$sks', '$dosen_id')"
);

if($query) {
    echo "Mata kuliah berhasil disimpan.";
}
else {
    echo "Gagal menyimpan mata kuliah: " . mysqli_error($koneksi);
}
?>