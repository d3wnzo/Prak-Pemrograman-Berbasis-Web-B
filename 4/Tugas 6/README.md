# TUGAS 6 NAYUNDA KRISNA - 4524210077
`index.php` (Before)
![index.php (Before)](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/929065de4dabc28718348834e2a18991d458a98c/4/Tugas%206/Screenshots/Before/index.png)

`index.php` (After)
![index.php (After)](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/929065de4dabc28718348834e2a18991d458a98c/4/Tugas%206/Screenshots/After/index.png)

### 1. Fitur Pencarian Dinamis (Backend Search & Filter)
* **Deskripsi:** Menambahkan penanganan kueri pencarian melalui method HTTP `GET` (`$_GET['keyword']`).
* **Implementasi:** 
  - Menggunakan kueri SQL dengan klausa `LIKE` untuk memfilter data mahasiswa berdasarkan **NPM**, **Nama**, atau **Program Studi**.
  - Mengamankan input pencarian dari serangan SQL Injection dasar menggunakan `mysqli_real_escape_string()`.
  - Menyediakan tombol *Reset* untuk mengembalikan daftar ke seluruh data mahasiswa.

---

### 2. Keamanan Output Anti-XSS (Cross-Site Scripting)
* **Deskripsi:** Mengamankan rendering data ke layar agar tidak rentan terhadap celah keamanan XSS.
* **Implementasi:** 
  - Membuat fungsi pembantu (*helper function*) `e()` berbasis `htmlspecialchars()`.
  - Membungkus seluruh pelepasan variabel data (`$data['nama']`, dll.) dengan fungsi ini agar karakter khusus HTML ter-escape dengan aman.
  - Menambahkan `urlencode()` pada parameter URL di tautan *Edit* dan *Hapus* untuk mencegah manipulasi karakter unik pada NPM.

---

### 3. Penanganan State Data Kosong (Empty State Feedback)
* **Deskripsi:** Memberikan umpan balik visual (*feedback*) yang jelas kepada pengguna apabila data yang dicari tidak ada dalam database.
* **Implementasi:** 
  - Menggunakan fungsi `mysqli_num_rows($query)` untuk memeriksa jumlah baris data yang dihasilkan.
  - Jika hasil kueri bernilai `0`, sistem menampilkan pesan *"Data mahasiswa tidak ditemukan"* di dalam baris tabel secara rapi.

---

### 4. Pembersihan Resource Server (Memory Cleanup)
* **Deskripsi:** Menerapkan *best practice* manajemen memori dan koneksi database pada PHP.
* **Implementasi:** 
  - Memanggil `mysqli_free_result($query)` di akhir baris eksekusi untuk membebaskan memori yang digunakan oleh *result set*.
  - Memanggil `mysqli_close($koneksi)` secara eksplisit untuk menutup koneksi database MySQL setelah seluruh proses penyiapan halaman selesai.
