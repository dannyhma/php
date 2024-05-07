<?php
usleep(500000);
require '../functions.php';
$keyword = $_GET["keyword"];
$query =    "SELECT * FROM mahasiswa 
                WHERE 
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";
$mahasiswa = query($query);

// var_dump($mahasiswa);
?>

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