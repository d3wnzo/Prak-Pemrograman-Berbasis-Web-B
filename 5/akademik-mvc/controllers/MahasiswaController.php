<?php

include "models/MahasiswaModels.php";

class MahasiswaController {
    private $model;
    public function __construct($koneksi) {
        $this->model = new MahasiswaModels($koneksi);
    }
    public function index() {
        $dataMahasiswa = $this->model->getAllMahasiswa();
        include "views/mahasiswa/index.php";
    }
}
?>