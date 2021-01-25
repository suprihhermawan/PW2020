<?php
require 'functions.php';

//cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
    alert('data berhasil ditambahkan');
    document.location.href='index.php';
    </script>";
  } else {
    echo "data error";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
</head>

<body>
  <h3>Form Tambah Data mahasiswa</h3>
  <form action="" method="POST">
    <ul>
      <li><label>
          NAMA :
          <input type="text" name="nama" autofocus required>
        </label>
      </li>

      <li><label>
          NRP :
          <input type="text" name="nrp" required>
        </label>
      </li>

      <li><label>
          Email :
          <input type="text" name="email" required>
        </label>
      </li>

      <li><label>
          JURUSAN :
          <input type="text" name="jurusan" required>
        </label>
      </li>

      <li><label>
          Gambar :
          <input type="text" name="gambar">
        </label>
      </li>

      <li>
        <button type="submit" name="tambah">TAMBAH DATA</button>
      </li>

    </ul>
  </form>
</body>

</html>