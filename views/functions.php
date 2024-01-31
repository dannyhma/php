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
  $nama = htmlspecialchars($data["nama"]);
  $nim = htmlspecialchars($data["nim"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);

  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  // query insert data
  $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nim', '$email', '$jurusan', '$gambar')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "
    <script>
        alert('Pilih Gambar Dulu');       
    </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $extFile = ['jpg', 'jpeg', 'png'];
  $extGambar = explode('.', $namaFile);
  $extGambar = strtolower(end($extGambar));
  if (!in_array($extGambar, $extFile)) {
    echo "
    <script>
        alert('Yang Anda Upload Bukan Gambar');   
    </script>";
    return false;
  }

  // cek jika ukuran gambar terlalu besar
  if ($ukuranFile > 1000000) {
    echo "
    <script>
        alert('Ukuran Gambar Terlalu Besar');        
    </script>";
    return false;
  }

  // lolos pengecekan gambar, siap upload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $extGambar;

  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

  return $namaFileBaru;
}

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  global $conn;

  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]);
  $nim = htmlspecialchars($data["nim"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  // cek apakah user pilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }

  // query update data
  $query = "UPDATE mahasiswa SET 
            nama = '$nama',
            nim = '$nim',
            email = '$email',
            jurusan = '$jurusan',
            gambar = '$gambar'
          WHERE id = $id
          ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $query = "SELECT * FROM mahasiswa 
              WHERE 
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";

  return query($query);
}

function registrasi($data)
{
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $konfirmasi = mysqli_real_escape_string($conn, $data["konfirmasi"]);

  // cek username sudah ada atau belum
  $checking = "SELECT username FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $checking);
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
            alert('Username sudah terdaftar');
          </script>";
    return false;
  }

  // cek konfirmasi password
  if ($password !== $konfirmasi) {
    echo "
    <script>
        alert('Konfirmasi password tidak sesuai');
    </script>";
    return false;
  }

  // enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambahkan user baru ke database
  $query = "INSERT INTO users VALUES ('', '$username', '$password')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
