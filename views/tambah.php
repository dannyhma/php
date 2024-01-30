<?php
require_once 'functions.php';

if (isset($_POST["submit"])) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'index.php'
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
            document.location.href = 'index.php'
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <h1>Tambah data mahasiswa</h1>

  <form action="" method="post">
    <ul>
      <li>
        <label for="gambar">Gambar :</label>
        <input type="text" name="gambar" id="gambar" require>
      </li>
      <li>
        <label for="nim">NIM :</label>
        <input type="text" name="nim" id="nim" require>
      </li>
      <li>
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" require>
      </li>
      <li>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" require>
      </li>
      <li>
        <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" require>
      </li>
      <li>
        <button type="submit" name="submit">Tambah Data</button>
      </li>
    </ul>
  </form>
</body>

</html>