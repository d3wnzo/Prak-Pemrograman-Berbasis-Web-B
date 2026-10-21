# TUGAS 1 NAYUNDA KRISNA - 4524210077
`tugas1Biodata.php` (Before)
![tugas1Biodata (Before)](https://github.com/d3wnzo/Prak-Pemrograman-Berbasis-Web-B/blob/22008b92402ae50a51d482070fc3c076f1f2bd82/1/Tugas%201/Screenshot/Before/tugas1Biodata.png)

tugas1Biodata (After)
```php
<?php

function statusKelulusan(float $ipk): string // Menentukan predikat kelulusan berdasarkan IPK
{
    if ($ipk >= 3.75) return 'Cum Laude';
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [ // Menyimpan data mahasiswa dalam array
    'npm' => '4524210077',
    'nama' => 'Nayunda Krisna',
    'prodi' => 'Teknik Informatika',
    'semester' => 5,
    'angkatan' => 2024,
    'ipk' => 3.12
];
?>
```
```html
<!doctype html> <!-- Menambah HTML untuk tampilan web -->
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata</title>
    <style> /* Menambah style untuk gaya pada tampilan web */
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <h1>Biodata Mahasiswa</h1>

    <ul>
        <?php foreach ($mahasiswa as $kunci => $nilai): ?> <!-- Menampilkan data mahasiswa dalam bentuk list -->
            <li>
                <b><?= ucfirst($kunci) ?>:</b>
                <?= htmlspecialchars((string)$nilai) ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p>
        <b>Predikat:</b>
        <?= statusKelulusan($mahasiswa['ipk']) ?>
    </p>
</body>

</html>
```
## Fitur & Peningkatan Kode
1. **Fungsi Predikat Kelulusan (`statusKelulusan`)**: 
   * Menggunakan *type hinting* (`float $ipk`) dan *return type* (`: string`).
   * Menentukan predikat berdasarkan standar IPK:
     * $\ge 3.75$ : `Cum Laude`
     * $\ge 3.50$ : `Sangat Memuaskan`
     * $\ge 3.00$ : `Memuaskan`
     * $< 3.00$ : `Perlu Peningkatan`
2. **Array Asosiatif Mahasiswa**: Menyimpan data identitas (NPM, nama, prodi, semester, angkatan, IPK) secara terpusat.
3. **Keamanan XSS (`htmlspecialchars`)**: Mencegah kerentanan *Cross-Site Scripting* saat merender data dinamis ke HTML.
4. **Perulangan Efisien (`foreach`)**: Menampilkan seluruh data atribut mahasiswa ke bentuk *list* otomatis.
