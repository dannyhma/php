<?php

// koneksi database
$conn = mysqli_connect("localhost", "root", "", "basicphp");


function query($query)
{

  // Menggunakan variabel global $conn
  global $conn;

  // ambil data dari tabel mahasiswa / query data mahasiswa
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
  }
  return $rows;
}
