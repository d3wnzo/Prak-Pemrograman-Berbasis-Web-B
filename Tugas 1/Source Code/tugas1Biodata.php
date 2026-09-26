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
