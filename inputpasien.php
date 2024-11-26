<?php 
// koneksi database
include 'koneksi.php';

// Fungsi untuk mendapatkan ID_rm terakhir dan menambahkannya 1
function generateNewID($koneksi) {
    // Mengambil ID_rm terbesar dari tabel rm
    $query = "SELECT MAX(ID_Pasien) as max_id FROM pasien";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    
    // Jika ada hasil, tambahkan 1; jika tidak, mulai dari 1
    $new_id = $data['max_id'] ? $data['max_id'] + 1 : 1;
    return $new_id;
}

// Memanggil fungsi generateNewID untuk mendapatkan ID_rm baru
$ID_Pasien = generateNewID($koneksi);
$Nama_Pasien = $_POST['Nama_Pasien'];
$Jenis_kelamin = $_POST['Jenis_kelamin'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$diagnosis = $_POST['diagnosis'];
$ID_Dokter = $_POST['ID_Dokter'];


// menginput data ke database
mysqli_query($koneksi,"insert into pasien (ID_Pasien, Nama_Pasien, Jenis_Kelamin, umur, alamat, diagnosis, ID_Dokter) values('$ID_Pasien','$Nama_Pasien','$Jenis_kelamin', '$umur', '$alamat', '$diagnosis', '$ID_Dokter')");
 
// mengalihkan halaman kembali ke index.php
header("location:tampilpasien.php");
 
?>