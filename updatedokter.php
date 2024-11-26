<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$ID_Dokter = $_POST['ID_Dokter'];
$Nama_dokter = $_POST['Nama_dokter'];
$ID_Bidang = $_POST['ID_Bidang'];
$No_telepon = $_POST['No_telepon'];
$Jadwal = $_POST['Jadwal'];


//query update data ke dalam database berdasarkan ID
$query = "UPDATE dokter SET  Nama_dokter = '$Nama_dokter', ID_Bidang = '$ID_Bidang', No_telepon = '$No_telepon', Jadwal = '$Jadwal' WHERE ID_Dokter = '$ID_Dokter'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampildokter.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupdate!";
}

?>