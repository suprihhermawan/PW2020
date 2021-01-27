<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("location:login.php");
  exit;
}
require 'functions.php';

//jika tidak ada id di URL
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}
//mengambil id dari url
$id = $_GET['id'];



if (hapus($id) > 0) {
  echo "<script>
    alert('data berhasil dihapus');
    document.location.href='index.php';
    </script>";
} else {
  echo "data error";
}
