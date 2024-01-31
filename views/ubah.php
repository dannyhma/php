<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require_once 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
// var_dump($mhs["nama"]);

if (isset($_POST["submit"])) {
  // cek apakah data berhasil diubah atau tidak
  if (ubah($_POST) > 0) {
    echo "
        <script>
            alert('Data Berhasil Diubah');
            document.location.href = 'index.php'
        </script>";
  } else {
    echo "
        <script>
            alert('Data Gagal Diubah');
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
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h1>Ubah data mahasiswa</h1>

  <a href="./index.php">Back</a>

  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
    <ul>
      <li>
        <label for="gambar">Gambar :</label> <br>
        <img src="img/<?= $mhs["gambar"] ?>" width="100"> <br>
        <input type="file" name="gambar" id="gambar">
      </li>
      <li>
        <label for="nim">NIM :</label>
        <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
      </li>
      <li>
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
      </li>
      <li>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required value="<?= $mhs["email"]; ?>">
      </li>
      <li>
        <label for="jurusan">Jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
      </li>
      <li>
        <button type="submit" name="submit">Ubah Data</button>
      </li>
    </ul>
  </form>
</body>

</html>