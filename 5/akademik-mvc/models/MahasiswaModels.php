<?php

include "koneksi.php";

class MahasiswaModels {
    private $koneksi;
    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }
    public function getAllMahasiswa() {
        $query = mysqli_query(
            $this->koneksi,
            "SELECT * FROM mahasiswa"
        );

        return $query;
    }
}
?>