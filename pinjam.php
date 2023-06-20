<?php
    require 'controller.php';
    $laptop = query("SELECT * FROM peminjaman");

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
    <title>Pinjam</title>
    <link rel="stylesheet" href="pinjam/style.css">
    <script src="https://kit.fontawesome.com/492d4b16b7.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="assets/profil.png" alt="">
            <ul>
                <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="#"><i class="fa-solid fa-tablet-button"></i>Retrieval</a></li>
                <li><a href="contact.php"><i class="fa-solid fa-phone"></i>Contact</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div class="header">
                <div class="header-background">
                        <div class="header-text">
                            <h1>LENOVO</h1>
                        </div>
                        <div class="card-container">
                            <div class="card">
                                <img src="assets/green.jpg" alt="" class="card-image">
                                <div class="card-content">
                                    <h2 style="margin-left: 8px;"><b><?= $jumlahTersedia ?></b></h2>
                                    <p style="margin-left: 8px;">Available</p>
                                </div>
                            </div>
                            <div class="card">
                                <img src="assets/red.png" alt="" class="card-image">
                                <div class="card-content">
                                    <h2 style="margin-left: 15px;"><b><?= $jumlahDigunakan?></b></h2>
                                    <p style="margin-left: 18px;">In-use</p>
                                </div>
                            </div>
                            <div class="card">
                                <img src="assets/silver.png" alt="" class="card-image">
                                <div class="card-content">
                                    <h2><b><?= $jumlahTidaktersedia?></b></h2>
                                    <p>Unavailable</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <div class="body-card-container">
                        <?php $i = 1 ?>
                        <?php foreach($laptop as $lptp){ ?>
                        <?php if($lptp['status'] === "tersedia") {?>
                        <a href="#">
                        <div class="body-card-tersedia">
                            <img src="assets/vector.png" alt="">
                            <div class="body-card-content">
                                <p class="body-card-text">no <span style="word-spacing: 62px">laptop: <?= $i?></span></p>
                                <p class="body-card-text-2">kondisi: <?= $lptp['kondisi']?></p>
                            </div>
                        </div>
                        </a>
                        <?php } ?>
                        <?php $i++ ?>
                        <?php } ?>

                        <?php $i = 1 ?>
                        <?php foreach($laptop as $lptp){ ?>
                        <?php if($lptp['status'] === "digunakan") {?>
                        <div class="body-card-digunakan">
                            <img src="assets/vector.png" alt="">
                            <div class="body-card-content">
                                <p class="body-card-text">no <span style="word-spacing: 62px">laptop: <?= $i?></span></p>
                                <p class="body-card-text-2">kondisi: <?= $lptp['kondisi']?></p>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $i++ ?>
                        <?php } ?>

                        <?php $i = 1 ?>
                        <?php foreach($laptop as $lptp){ ?>
                        <?php if($lptp['status'] === "tidak tersedia") {?>
                        <div class="body-card-tidaktersedia">
                            <img src="assets/vector.png" alt="">
                            <div class="body-card-content">
                                <p class="body-card-text">no <span style="word-spacing: 62px">laptop: <?= $i?></span></p>
                                <p class="body-card-text-2">kondisi: <?= $lptp['kondisi']?></p>
                            </div>
                        </div>
                        <?php } ?>
                        <?php $i++ ?>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>