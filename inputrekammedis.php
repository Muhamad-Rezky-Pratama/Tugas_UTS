<?php  
// koneksi database
include 'koneksi.php';

// Fungsi untuk mendapatkan ID_rm terakhir dan menambahkannya 1
function generateNewID($koneksi) {
    // Mengambil ID_rm terbesar dari tabel rm
    $query = "SELECT MAX(ID_rm) as max_id FROM rm";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    
    // Jika ada hasil, tambahkan 1; jika tidak, mulai dari 1
    $new_id = $data['max_id'] ? $data['max_id'] + 1 : 1;
    return $new_id;
}

// Memanggil fungsi generateNewID untuk mendapatkan ID_rm baru
$ID_rm = generateNewID($koneksi);

// Menangkap data yang dikirim dari form
$ID_Pasien = $_POST['ID_Pasien'];
$ID_Dokter = $_POST['ID_Dokter'];
$Riwayat_kunjungan = $_POST['Riwayat_kunjungan'];
$Keluhan = $_POST['Keluhan'];
$diagnosis = $_POST['diagnosis'];
$Tindakan = $_POST['Tindakan'];
$Resep_obat = $_POST['Resep_obat'];

// Menginput data ke database
$query = "INSERT INTO rm (ID_rm, ID_Pasien, ID_Dokter, Riwayat_kunjungan, Keluhan, diagnosis, Tindakan, Resep_obat) 
          VALUES ('$ID_rm', '$ID_Pasien', '$ID_Dokter', '$Riwayat_kunjungan', '$Keluhan', '$diagnosis', '$Tindakan', '$Resep_obat')";

// Eksekusi query dan cek kesalahan
if (mysqli_query($koneksi, $query)) {
    // Mengalihkan halaman kembali ke tampilrekammedis.php jika berhasil
    header("location:tampilrekammedis.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi database
mysqli_close($koneksi);

?>
