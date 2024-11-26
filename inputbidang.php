<?php 
// koneksi database
include 'koneksi.php';

// Fungsi untuk mendapatkan ID_rm terakhir dan menambahkannya 1
function generateNewID($koneksi) {
    // Mengambil ID_rm terbesar dari tabel rm
    $query = "SELECT MAX(ID_Bidang) as max_id FROM bidang";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    
    // Jika ada hasil, tambahkan 1; jika tidak, mulai dari 1
    $new_id = $data['max_id'] ? $data['max_id'] + 1 : 1;
    return $new_id;
}
$ID_Bidang = generateNewID($koneksi);
$Nama_bidang = $_POST['Nama_bidang'];



// menginput data ke database
mysqli_query($koneksi,"insert into bidang (ID_Bidang, Nama_bidang) values('$ID_Bidang', '$Nama_bidang')");

// mengalihkan halaman kembali ke index.php
header("location:tampilbidang.php");

?>