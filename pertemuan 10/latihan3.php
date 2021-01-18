<?<?php
  require 'function.php';
  $siswa = query("SELECT * FROM siswa");

  ?>



<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" <title>daftar mahasiswa</title>
</head>

<body>
  <h3> Daftar Mahasiswa</h3>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th># </th>
      <th>gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>
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