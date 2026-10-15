# TUGAS 5 NAYUNDA KRISNA - 4524210077
### dosen (Before)
![dosen (Before)](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/02642bb0e760489b7c4f66fe7cd2ec8d414b92e0/3/Tugas%205/Screenshot/Database/Before/dosen.png)

### dosen (After)
![dosen (After)](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/02642bb0e760489b7c4f66fe7cd2ec8d414b92e0/3/Tugas%205/Screenshot/Database/After/dosen.png)
# Penambahan Data dosen
Query: `INSERT INTO dosen (nidn, nama, email) VALUES (123, 'Fikri, M.bob', handapasal@gmail.com);`

# Penambahan 2 File
### form_mk.php
```php
<form action="simpan_mk.php" method="POST">
    <label for="kode_mk">Kode Mata Kuliah:</label>
    <input type="text" name="kode_mk" id="kode_mk" required><br>

    <label for="nama_mk">Nama Mata Kuliah:</label>
    <input type="text" name="nama_mk" id="nama_mk" required><br>

    <label for="sks">SKS:</label>
    <input type="number" name="sks" id="sks" required><br>

    <label for="dosen_id">Dosen:</label>
    <select name="dosen_id" id="dosen_id" required>
        <option value="">Pilih Dosen</option>
        <?php
        include 'koneksi.php';
        $result = mysqli_query($koneksi, "SELECT id, nama FROM dosen");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['id']}'>{$row['nama']}</option>";
        }
        ?>
    </select><br>

    <input type="submit" value="Simpan">
</form>
```
#### Fitur & Logika Utama:
1. **Atribut Form & Metode (`POST`)**: Mengirimkan data input pengguna ke file pemroses `simpan_mk.php` menggunakan metode HTTP `POST` secara aman.
2. **Field Input Data**:
   * `kode_mk`: Input teks untuk kode mata kuliah.
   * `nama_mk`: Input teks untuk nama mata kuliah.
   * `sks`: Input angka (`type="number"`) untuk bobot SKS.
   * Atribut `required` diterapkan di semua input untuk memastikan validasi wajib isi di sisi *client*.
3. **Dropdown Dosen Dinamis (`<select>`)**: 
   * Terhubung ke file `koneksi.php` untuk mengambil data dosen langsung dari database.
   * Menjalankan *query* SQL `SELECT id, nama FROM dosen` lalu melakukan perulangan (`while`) untuk merender daftar opsi dosen secara otomatis.
   * Nilai `value` yang dikirim adalah `id` dosen (sebagai *foreign key*), sedangkan teks yang ditampilkan ke pengguna adalah `nama` dosen.
### simpan_mk.php
```php
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
```
#### Fitur & Logika Utama:
1. **Koneksi & Seleksi Database**: 
   * Menyertakan file `koneksi.php` untuk menghubungkan aplikasi ke server database.
   * Menggunakan `mysqli_select_db()` untuk memastikan database aktif yang digunakan adalah `akademik`.
2. **Pengambilan Data POST**: Menampung data yang dikirimkan pengguna (`kode_mk`, `nama_mk`, `sks`, dan `dosen_id`) ke dalam variabel PHP masing-masing.
3. **Eksekusi Query SQL (`INSERT INTO`)**: 
   * Menjalankan perintah `mysqli_query()` untuk memasukkan data baru ke tabel `mata_kuliah` berdasarkan input yang diterima.
4. **Pengecekan Status (Kondisional)**:
   * Jika penyimpanan berhasil (`if ($query)`), skrip akan menampilkan pesan sukses.
   * Jika gagal, skrip akan menampilkan pesan error disertai fungsi `mysqli_error()` untuk memudahkan proses *debugging*.

# Hasil Run form.php & form_mk.php
### form.php
![input mahasiswa](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/b5f9a60a9300b2cb4c112e8feedc142e7963369e/3/Tugas%205/Screenshot/Form/input%20mahasiswa.png)

### mahasiswa (Before)
![input mahasiswa](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/cdff7ee98e14b83fb997053658cbdf7d6858ebf2/3/Tugas%205/Screenshot/Database/Before/mahasiswa.png)

### mahasiswa (After)
![input mahasiswa](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/b5f9a60a9300b2cb4c112e8feedc142e7963369e/3/Tugas%205/Screenshot/Database/After/mahasiswa.png)

---

### form_mk.php
![input mata kuliah](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/c6b67d670bf09fcb463c5d9512f837f15cc74b0a/3/Tugas%205/Screenshot/Form/input%20mata_kuliah.png)

### mata_kuliah (Before)
![input mata kuliah](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/cdff7ee98e14b83fb997053658cbdf7d6858ebf2/3/Tugas%205/Screenshot/Database/Before/mata_kuliah.png)

### mata_kuliah (After)
![input mata kuliah](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/cdff7ee98e14b83fb997053658cbdf7d6858ebf2/3/Tugas%205/Screenshot/Database/After/mata_kuliah.png)

# Analisis Error
### setup.php
```php
<?php
require_once 'koneksi.php';

$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

if(mysqli_query($koneksi, $sqlCreateDB)) {
    echo "Database berhasil dibuat atau sudah ada. ";
}
else {
    echo "Error membuat database: " . mysqli_error($koneksi) . "\n";
}

mysqli_set_charset($koneksi, "utf8mb4");

mysqli_select_db($koneksi, 'akademik');

$sqlCreateTables = [
    "CREATE TABLE IF NOT EXISTS mahasiswa (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    npm VARCHAR(15) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    prodi VARCHAR(80) NOT NULL,
    angkatan YEAR NOT NULL,
    ipk DECIMAL (3,2) DEFAULT 0.00
    ) ENGINE=innoDB",

    "CREATE TABLE IF NOT EXISTS dosen (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nidn VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE
    ) ENGINE=innoDB",

    "CREATE TABLE IF NOT EXISTS mata_kuliah (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(12) NOT NULL UNIQUE,
    nama_mk VARCHAR(100) NOT NULL,
    sks TINYINT UNSIGNED NOT NULL,
    dosen_id BIGINT UNSIGNED,
    CONSTRAINT fk_mk_dosen,
    FOREIGN KEY (dosen_id) REFERENCES dosen(id) ON DELETE CASCADE,
    ) ENGINE = innoDB"
];

foreach ($sqlCreateTables as $namaTabel => $query) {
    if (mysqli_query($koneksi, $query)) {
        echo "Tabel mahasiswa dibuat atau sudah ada.";
    }
    else {
        echo "Gagal membuat tabel: " . mysqli_error($koneksi) . '\n';
    }
}

mysqli_close($koneksi);
?>
```
### Analisis & Perbaikan Error Skrip Setup Database (`setup.php`)

`Fatal error: Uncaught mysqli_sql_exception: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ',
    FOREIGN KEY (dosen_id) REFERENCES dosen(id) ON DELETE CASCADE,
    ) ENG' at line 7 in C:\laragon\www\Semester 5\Prak. Pemrograman Berbasis Web\3\Tugas 5\Source Code\setup.php:47
Stack trace:
#0 C:\laragon\www\Semester 5\Prak. Pemrograman Berbasis Web\3\Tugas 5\Source Code\setup.php(47): mysqli_query(Object(mysqli), 'CREATE TABLE IF...')
#1 {main}
  thrown in C:\laragon\www\Semester 5\Prak. Pemrograman Berbasis Web\3\Tugas 5\Source Code\setup.php on line 47`

Pada skrip pembuatan tabel `mata_kuliah`, terdapat kendala *syntax error* pada pendefinisian *Foreign Key* dan penutup kueri SQL. Berikut adalah rincian analisis dan perbaikannya:

#### Analisis Error:
1. **Koma Berlebih Setelah Nama *Constraint***:
   * Terdapat tanda koma (`,`) yang keliru setelah penulisan `CONSTRAINT fk_mk_dosen`. Seharusnya nama konstrain langsung diikuti dengan definisi `FOREIGN KEY` tanpa dipisah koma.
2. **Koma Berlebih di Baris Terakhir Kolom**:
   * Terdapat tanda koma (`,`) di ujung baris setelah aturan `ON DELETE CASCADE` sebelum kurung tutup `)`. Dalam SQL, kolom atau relasi terakhir **tidak boleh** diakhiri dengan tanda koma.

#### Perbaikan Kode:
Bagian array tabel `mata_kuliah` yang semula error telah diperbaiki menjadi seperti berikut:

```php
    "CREATE TABLE IF NOT EXISTS mata_kuliah (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kode_mk VARCHAR(12) NOT NULL UNIQUE,
    nama_mk VARCHAR(100) NOT NULL,
    sks TINYINT UNSIGNED NOT NULL,
    dosen_id BIGINT UNSIGNED,
    CONSTRAINT fk_mk_dosen
    FOREIGN KEY (dosen_id) REFERENCES dosen(id) ON DELETE CASCADE
    ) ENGINE = InnoDB"
