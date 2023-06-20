<?php

    session_start();
    if( !isset($_SESSION["login"]) ) {
        header("Location: login.php");
        exit;
    }
    require 'controller.php';

    $laptop = query("SELECT * FROM peminjaman");
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $data_siswa = mysqli_fetch_array($result);
        $_SESSION['id_users'] = $data_siswa["id_users"];
        $_SESSION['username'] = $data_siswa["username"];
        $_SESSION['rayon'] = $data_siswa["rayon"];
        $_SESSION['rombel'] = $data_siswa["rombel"];
        $_SESSION['nis'] = $data_siswa["nis"];
    }

    $jumlahTersedia = 0;
    $jumlahDigunakan = 0;
    $jumlahTidaktersedia = 0;
    
    foreach($laptop as $lptp){
        $status = $lptp["status"];

        if ($status == "tersedia") {
            $jumlahTersedia++;
        } elseif ($status == "digunakan") {
            $jumlahDigunakan++;
        } else {
            $jumlahTidaktersedia++;
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utama</title>
    <script src="https://kit.fontawesome.com/492d4b16b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="index/style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="assets/profil.png" alt="">
            <ul>
                <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="#"><i class="fa-solid fa-tablet-button"></i>Retreival</a></li>
                <li><a href="contact.php"><i class="fa-solid fa-phone"></i>Contact</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="header">
                <div class="header-background">
                    <div class="header-text">
                        <h2>Selamat datang,</h2>
                        <h1><?= $_SESSION['username'] ?></h1>
                        <h4><?= $_SESSION['rayon'] ?> - <?= $_SESSION['rombel'] ?> - <?= $_SESSION['nis'] ?></h4>
                    </div>
                </div>
                </div>
                <div class="body">
                    <h2>Pinjam apa hari ini?</h2>
                    <div class="h-line"></div>
                        <div class="card-container">
                            <div class="card">
                                <a href="pinjam.php"><img src="assets/lenovo.png" alt="Image" class="card-image">
                            <div class="card-content">
                                <div class="shadow-text">
                                    <h3 class="card-title">Laptop</h3>
                                       <h3 class="card-title">Lenovo</h3>
                                    <p class="card-text">available <?= $jumlahTersedia?></p>
                                    <p class="card-text-2">In-use <?= $jumlahDigunakan?></p>
                                </div>
                                </a>
                            </div>
                        </div>
                            <div class="card">
                                <img src="assets/acer.png" alt="Image" class="card-image">
                            <div class="card-content">
                                <div class="shadow-text">
                                    <h3 class="card-title">Laptop</h3>
                                    <h3 class="card-title">Acer</h3>
                                    <p class="card-text">available 0</p>
                                    <p class="card-text-2">In-use 0</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                                <img src="assets/hp.png" alt="Image" class="card-image">
                            <div class="card-content">
                                <div class="shadow-text">
                                    <h3 class="card-title-hp">HP</h3>
                                    <p class="card-text">available 0</p>
                                    <p class="card-text-2">In-use 0</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                                <img src="assets/lainnya.png" alt="Image" class="card-image">
                            <div class="card-content">
                                <div class="shadow-text">
                                    <h3 class="card-title-lainnya">Lainnya</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</body>
</html>