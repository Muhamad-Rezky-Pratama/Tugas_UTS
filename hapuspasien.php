<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database
mysqli_query($koneksi,"delete from pasien where ID_Pasien='$id'");

 
// mengalihkan halaman kembali ke index.php
header("location:tampilpasien.php");
 
?>