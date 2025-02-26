<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bidang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1A1A2E;
            color: #FFFFFF;
        }
        
        /* Sidebar */
        .sidebar {
            width: 200px;
            height: 100vh;
            position: fixed;
            background-color: #162447;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar a {
            color: #FFFFFF;
            padding: 10px;
            width: 100%;
            text-align: left;
            text-decoration: none;
            display: block;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #1F4068;
        }

        .profile {
            margin-top: auto;
            text-align: center;
        }

        .sidebar img.logo {
            width: 100px;
            margin-bottom: 20px;
        }
        .profile img {
            width: 50px;
            border-radius: 50%;
        }

        /* Main Content */
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }

        .status-active {
            color: #21bf73;
        }

        .status-disabled {
            color: #ff4b5c;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <img src="icon/icon_logo.png" alt="Logo" class="logo">
    <a href="http://localhost/poliklinik/dashboard.php">Home</a>
    <a href="http://localhost/poliklinik/tampilbidang.php">Data Bidang</a>
    <a href="http://localhost/poliklinik/tampildokter.php">Data Dokter</a>
    <a href="http://localhost/poliklinik/tampilpasien.php">Data Pasien</a>
    <a href="http://localhost/poliklinik/tampilrekammedis.php">Data Rekam Medis</a>

</div>

<div class="main-content">
    <!-- Products Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Bidang</h2>
        <form method="POST" action="tambahbidang.php" class="mt-3">
        <button type="submit" class="btn btn-primary">
            <img src="icon/icon tambah.png" alt="Tambah" style="width: 16px; height: 16px; vertical-align: middle; margin-right: 5px;">Tambah data
        </button>
        </form>
    </div>
    <!-- Daftar Bidang Section -->
    
    <table class="table table-dark table-hover text-center">
        <thead>
            <tr>
                <th>Kode Bidang</th>
                <th>Nama Bidang</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include 'koneksi.php';
            $data = mysqli_query($koneksi, "SELECT * FROM bidang ORDER BY ID_Bidang");
            while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $d['ID_Bidang']; ?></td>
                    <td><?php echo $d['Nama_bidang']; ?></td>
                    <td>
                        <a role="button" class="btn btn-success" href="ubahbidang.php?id=<?php echo $d['ID_Bidang']; ?>">
                            <img src="icon/icon update2.png" alt="Edit" style="width: 16px; height: 16px; vertical-align: middle; margin-right: 5px;">UBAH
                        </a>
                        <a role="button" class="btn btn-danger" href="hapusbidang.php?id=<?php echo $d['ID_Bidang']; ?>">
                            <img src="icon/icon delete.png" alt="Delete" style="width: 16px; height: 16px; vertical-align: middle; margin-right: 5px;">HAPUS
                        </a>
                    </td>
                </tr>
                <?php 
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
