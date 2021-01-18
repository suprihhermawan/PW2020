<?php
require 'function.php';

//ambil id url
$id = $_GET['id'];

$m = query("SELECT * FROM siswa WHERE id =$id");
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail mahasiswa</title>
</head>

<body>
  <h3>Detail mahasiswa</h3>
  <ul>
    <li><img src="img/<?= $m['gambar']; ?>"></li>
    <li>NRP: <?= $m['nrp']; ?></li>
    <li>nama : <?= $m['nama']; ?> </li>
    <li>nama : <?= $m['email']; ?> </li>
    <li>jurusan : <?= $m['jurusan']; ?></li>
    <li><a href="">ubah</a>|<a href="">hapus</a></li>
    <li><a href="latihan3.php">daftar mahasiswa</a></li>

  </ul>
</body>

</html>