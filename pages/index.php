<?php
$students = [
  [
    "name" => "Toki",
    "school" => "Millenium",
    "role" => "Attacker",
    "position" => "Middle",
    "img" => "Toki.png"
  ],
  [
    "name" => "Haruna",
    "school" => "Gehenna",
    "role" => "Attacker",
    "position" => "Back",
    "img" => "Haruna.png"
  ],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GET</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>
  <?php foreach ($students as $student) : ?>
  <ul>
    <li>
      <a
        href="detail.php?name=<?= $student["name"]; ?>&school=<?= $student["school"]; ?>&role=<?= $student["role"]; ?>&position=<?= $student["position"]; ?>&img=<?= $student["img"]; ?>">
        <?= $student["name"]; ?>
      </a>
      <a href="Toki"></a>
    </li>
  </ul>
  <?php endforeach; ?>
</body>

</html>