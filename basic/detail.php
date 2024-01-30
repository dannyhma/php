<?php
// if (
//   !isset($_GET["nama"]) ||
//   !isset($_GET["school"]) ||
//   !isset($_GET["role"]) ||
//   !isset($_GET["position"]) ||
//   !isset($_GET["img"])
// ) {
//   // redirect
//   header("Location: index.php");
//   exit;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Students</title>
</head>

<body>
  <ul>
    <li><img src="img/<?= $_GET["img"]; ?>" alt="<?= $_GET["name"] ?>"></li>
    <li>Name: <?= $_GET["name"]; ?></li>
    <li>School: <?= $_GET["school"]; ?></li>
    <li>Role: <?= $_GET["role"]; ?></li>
    <li>Postion: <?= $_GET["position"]; ?></li>
  </ul>

  <a href="./index.php">Back To List's Student's</a>
</body>

</html>