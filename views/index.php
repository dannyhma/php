<?php

require_once 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

  <a href="tambah.php">Tambah data mahasiswa</a>

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
        <td>1</td>
        <td><a href="">Edit</a> | <a href="">Hapus</a></td>
        <td><img src="img/<?= $row["gambar"]; ?>" width="50px" alt=""></td>
        <td><?php echo $row["nim"]; ?></td>
        <td><?php echo $row["nama"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["jurusan"]; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>