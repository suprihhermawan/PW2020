<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'mahasiswa');
  // $conn = mysqli_connect('localhost', 'root', '', 'mahasiswa');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  //jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


function tambah($data)
{
  $conn = koneksi();


  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
   siswa 
   VALUES
    (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM siswa WHERE id=$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


function ubah($data)
{
  $conn = koneksi();

  $id = ($data['id']);
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE siswa SET
                nama='$nama',
nrp='$nrp',
email='$email',
jurusan='$jurusan',
gambar='$gambar'
WHERE id=$id";


  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM SISWA
  WHERE  nama LIKE '%$keyword%' OR
    nrp LIKE '%$keyword%'
  ";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function login($data)
{

  $conn = koneksi();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);
  // dulu cek username
  if ($user = query("SELECT *FROM user WHERE username='$username' ")) {
    //cek pasword
    if (password_verify($password, $user['password'])) {
      //set session
      $_SESSION['login'] = true;

      header("Location: index.php");
      exit;
    }
  }
  return
    [
      'error' => true,
      'pesan' => 'username/ password salah'
    ];
}



function registrasi($data)
{
  $conn = koneksi();
  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  //jika username atau paswordnya kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
    alert('username/password tidak boleh kosong');
    document.location.href='registrasi.php';
    </script>";
    return false;
  }

  //jika username sudah ada didalam database
  if (query("SELECT * FROM USER WHERE username='$username'")) {
    echo "<script>
    alert('username sudah terdaftar');
    document.location.href='registrasi.php';
    </script>";
    return false;
  }
  // jika konfirmasi pasword tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
    alert('konfirmasi pasword tidak sesuai');
    document.location.href='registrasi.php';
    </script>";
    return false;
  }

  //jika pasword lebih kecil dari 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
    alert('Pasword terlalu pendek');
    document.location.href='registrasi.php';
    </script>";
    return false;
  }
  // jika username dan paswordnya sudah sesuai
  //enkripsi pasword
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);

  //insert ke tabel user
  $query = "INSERT INTO user
  VALUES
  (null,'$username','$password_baru')
  ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
