<?<?php
  //koneksi ke db dan pilih database
  $conn = mysqli_connect('localhost', 'root', '', 'mahasiswa');

  //query isi tabel mahasisa
  $result = mysqli_query($conn, "SELECT * FROM siswa");


  //ubah data kedalam array
  //$row = mysqli_fetch_row($result); //array numerik
  // $row = mysqli_fetch_row($result); //array numerik
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  //var_dump($rows);


  //simpan/tampung ke variabel mahasiswa
  $siswa = $rows;

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
      <th>NRP</th>
      <th>Nama</th>
      <th>Email</th>
      <th>jurusan</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1;
    foreach ($siswa as $m) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $m['gambar']; ?>" width "30"></td>
        <td><?= $m['nrp']; ?></td>
        <td><?= $m['nama']; ?></td>
        <td><?= $m['email']; ?></td>
        <td><?= $m['jurusan']; ?></td>
        <td><a href="">ubah</a>|<a href="">hapus</a></td>

      </tr>
    <?php endforeach; ?>
  </table>


</body>