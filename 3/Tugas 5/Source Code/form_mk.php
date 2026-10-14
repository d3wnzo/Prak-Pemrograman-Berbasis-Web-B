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