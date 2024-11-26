<?php 
// koneksi database
include 'koneksi.php';
 
// Fungsi untuk mendapatkan ID_rm terakhir dan menambahkannya 1
function generateNewID($koneksi) {
    // Mengambil ID_rm terbesar dari tabel rm
    $query = "SELECT MAX(ID_Dokter) as max_id FROM dokter";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    
    // Jika ada hasil, tambahkan 1; jika tidak, mulai dari 1
    $new_id = $data['max_id'] ? $data['max_id'] + 1 : 1;
    return $new_id;
}
$ID_Dokter = generateNewID($koneksi);
$Nama_dokter = $_POST['Nama_dokter'];
$ID_Bidang = $_POST['ID_Bidang'];
$No_telepon = $_POST['No_telepon'];
$Jadwal = $_POST['Jadwal'];


// menginput data ke database
mysqli_query($koneksi,"insert into dokter (ID_Dokter, Nama_dokter, ID_Bidang, No_telepon, Jadwal) values('$ID_Dokter','$Nama_dokter','$ID_Bidang', '$No_telepon', '$Jadwal')");
 
// mengalihkan halaman kembali ke index.php
header("location:tampildokter.php");
 
?>