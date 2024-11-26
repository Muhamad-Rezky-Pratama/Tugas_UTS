<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Rekam Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        /* Gaya untuk seluruh halaman */
        body {
            background-color: #121936; /* Warna latar belakang halaman */
            color: #fff; /* Warna teks default */
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

        .sidebar .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
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

		.sidebar img.logo {
            width: 100px;
            margin-bottom: 20px;
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
            <li><a href="http://localhost/poliklinik/dashboard.php">Home</a></li>
            <li><a href="http://localhost/poliklinik/tampilbidang.php">Data Bidang</a></li>
            <li><a href="http://localhost/poliklinik/tampildokter.php">Data Dokter</a></li>
            <li><a href="http://localhost/poliklinik/tampilpasien.php">Data Pasien</a></li>
            <li><a href="http://localhost/poliklinik/tampilrekammedis.php">Data Rekam Medis</a></li>
        </ul>
    </div>

    <br/>
    <form method="POST" action="tampilpasien.php" style="margin-left: 220px;">
        <button type="input" class="btn">kembali</button>
    </form>
    <br/>
    <br/>
    <h3>Tambah Data Pasien</h3>
	<br>
    <div class="mb-3" style="margin-left: 220px;">
        <form method="post" action="inputpasien.php">
            <table class="table">
                <tr>
                    <td>Nama Pasien</td>
                    <td><input class="form-control form-control-lg" type="text" name="Nama_Pasien"required></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
					<td><select class="form-control form-control-lg" id="Jenis_kelamin" name="Jenis_kelamin"required>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td><input class="form-control form-control-lg" type="text" name="umur"required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input class="form-control form-control-lg" type="text" name="alamat"required></td>
                </tr>
                <tr>
                    <td>Diagnosis</td>
                    <td><input class="form-control form-control-lg" type="text" name="diagnosis"required></td>
                </tr>
                <tr>
                    <td>ID Dokter</td>
                    <td><select class="form-control form-control-lg" id="ID_Dokter" name="ID_Dokter" required>
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
                        </select></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="input" class="btn">Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
