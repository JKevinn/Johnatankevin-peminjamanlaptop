<?php
    require 'controller.php';
    $users = query("SELECT * FROM users");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center">
    </div>
    <div class="container" style="margin: 100px 0px 20px 20px;">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 60rem;">
                <div class="card-body" style="width: 10rem;">
                    <table class="table" style="width: 60rem">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Rayon</th>
                            <th scope="col">Rombel</th>
                            <th scope="col">NIS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach($users as $user){ ?>
                            <tr>
                                <td><?= $i?></td>
                                <td><?= $user["username"] ?></td>
                                <td><?= $user["rayon"] ?></td>
                                <td><?= $user["rombel"] ?></td>
                                <td><?= $user["nis"] ?></td>
                                <td>
                            </tr>
                        <?php $i++ ?>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>