<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        .sidebar img.logo {
            width: 100px;
            margin-bottom: 20px;
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

        .profile img {
            width: 50px;
            border-radius: 50%;
        }

        /* Main Content */
        .main-content {
            margin-left: 220px;
            padding: 20px;
        }
        .card-button {
            width: 150px;
            margin: 10px;
            text-align: center;
            color: #FFFFFF;
            border: none;
            border-radius: 8px;
            transition: transform 0.3s;
            cursor: pointer;
        }
        /* Warna khusus untuk setiap card-button */
        .card-bidang {
            background-color: #4E9F3D;
        }
        .card-dokter {
            background-color: #2A9D8F;
        }
        .card-pasien {
            background-color: #E76F51;
        }
        .card-rekam-medis {
            background-color: #F4A261;
        }
        /* Hover efek */
        .card-button:hover {
            transform: scale(1.05);
        }
        .card-bidang:hover {
            background-color: #3E8E2C;
        }
        .card-dokter:hover {
            background-color: #228A73;
        }
        .card-pasien:hover {
            background-color: #D65A41;
        }
        .card-rekam-medis:hover {
            background-color: #E78A49;
        }
        .card-button i {
            font-size: 2rem;
            margin-bottom: 8px;
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
    <h2>Selamat Datang di Dashboard</h2>
    
    <p><strong>Tentang Poliklinik Sinar Harapan:</strong></p>
    <p>Poliklinik Sinar Harapan adalah pusat kesehatan yang berdedikasi untuk memberikan layanan medis berkualitas tinggi kepada masyarakat. Dengan fasilitas modern dan tim medis yang berpengalaman, kami berkomitmen untuk menyediakan perawatan yang holistik dan terpercaya untuk semua pasien. Kami menawarkan berbagai layanan, termasuk pemeriksaan umum, spesialisasi tertentu, dan pelayanan medis lainnya.</p>

    <p>Ini adalah area konten utama di mana Anda dapat menavigasi ke berbagai bagian menggunakan kartu di bawah ini.</p>

    <div class="d-flex flex-wrap">
        <!-- Bidang Card -->
        <a href="http://localhost/poliklinik/tampilbidang.php" class="card-button card-bidang text-decoration-none">
            <i class="fas fa-building"></i>
            <div>Bidang</div>
        </a>

        <!-- Dokter Card -->
        <a href="http://localhost/poliklinik/tampildokter.php" class="card-button card-dokter text-decoration-none">
            <i class="fas fa-user-md"></i>
            <div>Dokter</div>
        </a>

        <!-- Pasien Card -->
        <a href="http://localhost/poliklinik/tampilpasien.php" class="card-button card-pasien text-decoration-none">
            <i class="fas fa-users"></i>
            <div>Pasien</div>
        </a>

        <!-- Rekam Medis Card -->
        <a href="http://localhost/poliklinik/tampilrekammedis.php" class="card-button card-rekam-medis text-decoration-none">
            <i class="fas fa-file-medical"></i>
            <div>Rekam Medis</div>
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
