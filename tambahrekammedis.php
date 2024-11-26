<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Rekam Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        /* Gaya untuk seluruh halaman */
        body {
            background-color: #121936;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        /* Sidebar */
        .sidebar {
            background-color: #0a0f2c;
            color: #fff;
            width: 200px;
            height: 100vh;
            position: fixed;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar img.logo {
            width: 100px; 
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            width: 100%;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            text-align: left;
        }

        .sidebar ul li a:hover {
            background-color: #333a5e;
        }

        .profile {
            margin-top: auto;
            text-align: center;
        }

        /* Gaya untuk tabel */
        .table {
            margin-left: 220px;
            margin-top: 20px;
            background-color: #1b203d;
            border-radius: 8px;
            color: #fff;
            width: 80%;
        }

        .table th, .table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #333a5e;
        }

        .table th {
            background-color: #1f2647;
        }

        .table tr:hover {
            background-color: #2a3055;
        }

        /* Gaya untuk judul dan tombol */
        h3 {
            color: #ffffff;
            text-align: center;
            margin-left: 220px;
            padding-top: 20px;
        }

        .btn {
            background-color: #0d6efd;
            color: #ffffff;
            border: none;
            margin-top: 10px;
            padding: 10px 20px;
        }

        .btn:hover {
            background-color: #0b5ed7;
        }

        /* Gaya untuk formulir */
        .form-control {
            background-color: #1b203d;
            color: #fff;
            border: none;
        }

        .form-control::placeholder {
            color: #c0c0c0;
        }
    </style>
</head>
<body>
    <?php
    // Koneksi ke database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "poliklinik"; // Ganti dengan nama database Anda

    $koneksi = new mysqli($host, $username, $password, $database);

    // Cek koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }
    ?>

    <div class="sidebar">
        <img src="icon/icon_logo.png" alt="Logo" class="logo">
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="tampilbidang.php">Data Bidang</a></li>
            <li><a href="tampildokter.php">Data Dokter</a></li>
            <li><a href="tampilpasien.php">Data Pasien</a></li>
            <li><a href="tampilrekammedis.php">Data Rekam Medis</a></li>
        </ul>
    </div>

    <br/>
    <form method="POST" action="tampilrekammedis.php" style="margin-left: 220px;">
        <button type="button" onclick="window.location.href='tampilrekammedis.php'" class="btn">Kembali</button>
    </form>
    <br/>
    <br/>
    <h3>Tambah Data Rekam Medis</h3>
    <br>
    <div class="mb-3" style="margin-left: 220px;">
        <form method="post" action="inputrekammedis.php">
            <table class="table">
                <tr>
                    <td>No Pasien</td>
                    <td>
                        <select class="form-control form-control-lg" id="ID_Pasien" name="ID_Pasien" required>
                            <?php
                            // Query untuk mengambil data pasien dari tabel pasien
                            $pasien = $koneksi->query("SELECT ID_Pasien, Nama_Pasien FROM pasien");

                            // Cek apakah query berhasil dan ada data
                            if ($pasien->num_rows > 0) {
                                // Loop untuk menampilkan setiap pasien dalam bentuk <option>
                                while ($row = $pasien->fetch_assoc()) {
                                    echo "<option value='" . $row['ID_Pasien'] . "'>" . $row['ID_Pasien'] . " - " . $row['Nama_Pasien'] . "</option>";
                                }
                            } else {
                                // Jika tidak ada data pasien
                                echo "<option>Tidak ada data pasien</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>ID Dokter</td>
                    <td>
                        <select class="form-control form-control-lg" id="ID_Dokter" name="ID_Dokter" required>
                            <?php
                            // Query untuk mengambil data pasien dari tabel pasien
                            $pasien = $koneksi->query("SELECT ID_Dokter, Nama_dokter FROM dokter");

                            // Cek apakah query berhasil dan ada data
                            if ($pasien->num_rows > 0) {
                                // Loop untuk menampilkan setiap pasien dalam bentuk <option>
                                while ($row = $pasien->fetch_assoc()) {
                                    echo "<option value='" . $row['ID_Dokter'] . "'>" . $row['ID_Dokter'] . " - " . $row['Nama_dokter'] . "</option>";
                                }
                            } else {
                                // Jika tidak ada data pasien
                                echo "<option>Tidak ada data Dokter</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Riwayat Kunjungan</td>
                    <td><input class="form-control form-control-lg" type="date" name="Riwayat_kunjungan" required></td>
                </tr>
                <tr>
                    <td>Keluhan</td>
                    <td><input class="form-control form-control-lg" type="text" name="Keluhan" required></td>
                </tr>
                <tr>
                    <td>Diagnosis</td>
                    <td>
                        <select class="form-control form-control-lg" id="diagnosis" name="diagnosis" required>
                            <?php
                            // Query untuk mengambil data pasien dari tabel pasien
                            $pasien = $koneksi->query("SELECT diagnosis, Nama_Pasien FROM pasien");

                            // Cek apakah query berhasil dan ada data
                            if ($pasien->num_rows > 0) {
                                // Loop untuk menampilkan setiap pasien dalam bentuk <option>
                                while ($row = $pasien->fetch_assoc()) {
                                    echo "<option value='" . $row['diagnosis'] . "'>" . $row['diagnosis'] . " - " . $row['Nama_Pasien'] . "</option>";
                                }
                            } else {
                                // Jika tidak ada data pasien
                                echo "<option>Tidak ada data diagnosis</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tindakan</td>
                    <td><input class="form-control form-control-lg" type="text" name="Tindakan" required></td>
                </tr>
                <tr>
                    <td>Resep Obat</td>
                    <td><input class="form-control form-control-lg" type="text" name="Resep_obat" required></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="submit" class="btn">Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    // Tutup koneksi database
    $koneksi->close();
    ?>
</body>
</html>
