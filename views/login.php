<?php

session_start();

require_once 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $query = "SELECT username FROM users WHERE id = '$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  // cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION["login"] = true;
  }
}

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  // cek username
  if (mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // set session
      $_SESSION["login"] = true;

      // cek remember me
      if (isset($_POST["remember"])) {
        // buat cookie
        setcookie('id', $row['id'], time() + 60);
        setcookie('key', hash('sha256', $row['username'], time() + 60));
      }

      header("Location: index.php");
      exit;
    }
  }

  // kalau tidak benar username/password
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
</head>

<body>
  <h1>Halaman Login</h1>

  <?php if (isset($error)) : ?>
    <p style="color: red; font-style: italic;">username / password salah</p>
  <?php endif; ?>

  <form action="" method="post">
    <ul>
      <li>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
      </li>
      <li>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password">
      </li>
      <li>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
      </li>
      <li>
        <button type="submit" name="login">Login</button>
      </li>
    </ul>
  </form>

</body>

</html>