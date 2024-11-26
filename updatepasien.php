<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$ID_Pasien = $_POST['ID_Pasien'];
$Nama_Pasien = $_POST['Nama_Pasien'];
$Jenis_kelamin = $_POST['Jenis_kelamin'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$diagnosis = $_POST['diagnosis'];
$ID_Dokter = $_POST['ID_Dokter'];


//query update data ke dalam database berdasarkan ID
$query = "UPDATE pasien SET  Nama_Pasien = '$Nama_Pasien', Jenis_kelamin = '$Jenis_kelamin', umur = '$umur', alamat = '$alamat', diagnosis = '$diagnosis', ID_Dokter = '$ID_Dokter'  WHERE ID_Pasien = '$ID_Pasien'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    //redirect ke halaman tampil.php 
    header("location: tampilpasien.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupdate!";
}

?>