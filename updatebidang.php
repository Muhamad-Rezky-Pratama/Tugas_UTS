<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$ID_Bidang = $_POST['ID_Bidang'];
$Nama_bidang = $_POST['Nama_bidang'];



//query update data ke dalam database berdasarkan ID
$query = "UPDATE bidang SET  Nama_bidang = '$Nama_bidang' WHERE ID_Bidang = '$ID_Bidang'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampilbidang.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>