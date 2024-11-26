<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pasien</title>
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

    <form method="POST" action="tampilpasien.php" style="margin-left: 220px;">
        <button type="button" onclick="window.location.href='tampilpasien.php'" class="btn">Kembali</button>
    </form>
    
    <h3>Update Data Pasien</h3>
    <div class="mb-3" style="margin-left: 220px;">
        <?php
        include 'koneksi.php';
        $id = $_GET['id']; // Mengambil ID dari URL
        $data = mysqli_query($koneksi, "SELECT * FROM pasien WHERE ID_Pasien='$id'");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <form method="post" action="updatepasien.php">
            <table class="table">
                <tr>
                    <td>Nama Pasien</td>
                    <td>
                        <input type="hidden" name="ID_Pasien" value="<?php echo $d['ID_Pasien']; ?>">
                        <input class="form-control form-control-lg" type="text" name="Nama_Pasien" value="<?php echo $d['Nama_Pasien']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <select class="form-control form-control-lg" id="Jenis_kelamin" name="Jenis_kelamin">
                            <option value="L" <?php if ($d['Jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki-laki</option>
                            <option value="P" <?php if ($d['Jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td><input class="form-control form-control-lg" type="text" name="umur" value="<?php echo $d['umur']; ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input class="form-control form-control-lg" type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
                </tr>
                <tr>
                    <td>Diagnosis</td>
                    <td><input class="form-control form-control-lg" type="text" name="diagnosis" value="<?php echo $d['diagnosis']; ?>"></td>
                </tr>
                <tr>
                    <td>ID Dokter</td>
                    <td>
                        <select class="form-control form-control-lg" name="ID_Dokter" required>
                            <?php
                            $all_dokter = mysqli_query($koneksi, "SELECT ID_Dokter, Nama_dokter FROM dokter");
                            while ($dokter = mysqli_fetch_assoc($all_dokter)) {
                                $selected = ($dokter['ID_Dokter'] == $d['ID_Dokter']) ? "selected" : "";
                                echo "<option value='" . $dokter['ID_Dokter'] . "' $selected>" . $dokter['ID_Dokter'] ." - ". $dokter['Nama_dokter'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>               
                <tr>
                    <td colspan="3">
                        <button type="submit" class="btn">Simpan</button>
                    </td>
                </tr>        
            </table>
        </form>
        <?php
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2QojEczY2n8bFl1lCBKjt5uqj1k8VCSKJ2zxiwHjB4cvEdF4WpGwiPwc73u" crossorigin="anonymous"></script>
</body>
</html>
