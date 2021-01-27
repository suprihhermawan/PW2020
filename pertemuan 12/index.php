<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("location:login.php");
  exit;
}




require 'functions.php';
$siswa = query("SELECT * FROM siswa");



//ketika tombol cari di klik
if (isset($_POST['cari'])) {
  $siswa = cari($_POST['keyword']);
}


?>



<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" <title>daftar mahasiswa</title>
</head>

<body>
  <a href="logout.php">Log Out</a>

  <br></br>
  <h3> Daftar Mahasiswa</h3>
  <a href="tambah.php">Tambah Data mahasiswa</a>
  <br></br>

  <form action="" method="POST">
    <input type="text" name="keyword" size="40" placeholder="masukkan kata pencarian" autocomplete="off" autofocus>
    <button type="submit" name="cari">cari</button>
  </form>
  <br>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th># </th>
      <th>gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>

    <?php if (empty($siswa)) : ?>
      <tr>
        <td colspan="4">
          <p style="color : red; font-style:italic;"> data siswa tidak ditemukan
        </td>
      </tr>

    <?php endif; ?>



    <?php $i = 1;
    foreach ($siswa as $m) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $m['gambar']; ?>" width "30"></td>

        <td><?= $m['nama']; ?></td>

        <td><a href="detail.php?id=<?= $m['id']; ?>">lihat detail</a>

      </tr>
    <?php endforeach; ?>
  </table>


</body>