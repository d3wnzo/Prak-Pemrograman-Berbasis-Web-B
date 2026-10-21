# TUGAS 2 NAYUNDA KRISNA - 4524210077
`tugas1Kalkulator.php` (Before)
![tugas1Kalkulator (Before)](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/c3d5ca94a6da42b37d6c0825b7894ea1941ab1f8/1/Tugas%202/Screenshot/Before/tugas1Kalkulator.png)

tugas1Kalkulator (After)
```php
<?php

$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Mastiin logika kalkulasi kalau ini cuma jalan kalo tombol submit di klik
    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    switch ($operator) { // Mengeksekusi kalkulasi sesuai operator yang dipilih
        case '+':
            $hasil = $a + $b;
            break;
        case '-':
            $hasil = $a - $b;
            break;
        case '*':
            $hasil = $a * $b;
            break;
        case '/':
            if ($b == 0) { // Mengecek kalo pembagian dengan nol, karena itu tidak diperbolehkan
                $pesan = 'Error: Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;
        case '^':
            $hasil = $a ** $b;
            break;
        default:
            $pesan = 'Error: Operator tidak valid.';
    }
}
?>
```
```html
<!DOCTYPE html> <!-- Menambah HTML untuk tampilan web -->
<html lang="id"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <style> /* Menambah style untuk gaya pada tampilan web */
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <h1>Kalkulator Sederhana</h1>
    <form method="post">
        <input type="number" step="any" name="a" required>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="^">^</option>
        </select>
        <input type="number" step="any" name="b" required>
        <button type="submit">Hitung</button>
    </form>

    <?php if ($pesan): ?>
        <p><?= htmlspecialchars($pesan) ?></p>
    <?php elseif ($hasil !== null): ?>
        <p>Hasil: <?= htmlspecialchars((string) $hasil) ?></p>
    <?php endif; ?>
</body>

</html>
```
## Fitur & Peningkatan Kode
1. **Validasi Request POST (`$_SERVER['REQUEST_METHOD']`)**: Memastikan proses kalkulasi hanya dieksekusi setelah pengguna mengirimkan formulir (*submit*).
2. **Operator Aritmatika Lengkap (`switch-case`)**: 
   * Penjumlahan (`+`), Pengurangan (`-`), Perkalian (`*`), Pembagian (`/`), dan Perpangkatan (`^` menggunakan operator `**`).
3. **Penanganan Error Pembagian Nol**: Memberikan pesan peringatan secara otomatis apabila pengguna mencoba membagi angka dengan nol ($b = 0$).
4. **Input Fleksibel (`step="any"`)**: Memungkinkan pengguna memasukkan angka desimal maupun bilangan bulat.
