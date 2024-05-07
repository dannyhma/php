<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

require_once 'functions.php';

// pagination
// konfigurasi
$jumlahDataPerhalaman = 4;
$jumlahData = count(query("SELECT * FROM mahasiswa"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerhalaman");

// tombol cari ditekan
if (isset($_POST["cari"])) {
  $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/jquery.js"></script>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah data mahasiswa</a>

  <a href="logout.php">Logout</a>

  <form action="" method="post">
    <input id="keyword" type="text" name="keyword" autofocus placeholder="Masukkan keyword" autocomplete="off">
    <button id="searchButton" type="submit" name="cari">Cari!</button>
    <img src="assets/loader.gif" class="loader">
  </form>

  <br>

  <div id="container">
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
      </tr>

      <?php
      $i = 1;
      foreach ($mahasiswa as $row) :
      ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> | <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus?');">Hapus</a>
          </td>
          <td><img src="img/<?= $row["gambar"]; ?>" width="50px" alt=""></td>
          <td><?php echo $row["nim"]; ?></td>
          <td><?php echo $row["nama"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td><?php echo $row["jurusan"]; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <!-- navigasi -->
  <?php if ($halamanAktif > 1) : ?>
    <a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a>
  <?php endif; ?>

  <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
    <?php if ($i == $halamanAktif) : ?>
      <a href="?halaman=<?= $i ?>" style="font-wright: bold; color: black;"><?= $i ?></a>
    <?php else : ?>
      <a href="?halaman=<?= $i ?>"><?= $i ?></a>
    <?php endif; ?>
  <?php endfor; ?>

  <!-- navigasi -->
  <?php if ($halamanAktif < $jumlahHalaman) : ?>
    <a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a>
  <?php endif; ?>

</body>

</html>