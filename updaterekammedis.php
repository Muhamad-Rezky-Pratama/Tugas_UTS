<?php

// Include koneksi ke database
include('koneksi.php');

// Ambil data dari form
$ID_rm = $_POST['ID_rm'];
$ID_Pasien = $_POST['ID_Pasien'];
$ID_Dokter = $_POST['ID_Dokter'];
$Riwayat_kunjungan = $_POST['Riwayat_kunjungan'];
$Keluhan = $_POST['Keluhan'];
$diagnosis = $_POST['diagnosis'];
$Tindakan = $_POST['Tindakan'];
$Resep_obat = $_POST['Resep_obat'];

// Query update data ke dalam database berdasarkan ID
$query = "UPDATE rm SET ID_Pasien = '$ID_Pasien', ID_Dokter = '$ID_Dokter', Riwayat_kunjungan = '$Riwayat_kunjungan', Keluhan = '$Keluhan', diagnosis = '$diagnosis', Tindakan = '$Tindakan', Resep_obat = '$Resep_obat'  WHERE ID_rm = '$ID_rm'";

// Kondisi pengecekan apakah data berhasil diupdate atau tidak
if($koneksi->query($query)) {
    // Redirect ke halaman tampil.php jika berhasil
    header("location: tampilrekammedis.php");
} else {
    // Pesan error jika gagal update data
    echo "Data Gagal Diupdate! ";
}

?>
