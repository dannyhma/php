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


function tambah($data)
{
  // Menggunakan variabel global $conn
  global $conn;

  // ambil data dari tiap elemen form
  $nama = $data["nama"];
  $nim = $data["nim"];
  $email = $data["email"];
  $jurusan = $data["jurusan"];
  $gambar = $data["gambar"];

  // query insert data
  $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
