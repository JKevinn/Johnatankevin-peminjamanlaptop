<?php
    session_start();
    require 'controller.php';

    if( isset($_POST["submit"]) ) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email = '$email' AND password ='$password'";
        $result = mysqli_query($conn, $sql);
        if( mysqli_num_rows($result) === 1 ) {
            $row = mysqli_fetch_assoc($result);
            if($row['email'] === $email && $row['password'] === $password) {
                $_SESSION["login"] = true;
                $_SESSION['id_users'] = $row['id_users'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['rayon'] = $row['rayon'];
                $_SESSION['rombel'] = $row['rombel'];
                $_SESSION['nis'] = $row['nis'];
                header("location: index.php");
                exit();
            }
        }

        $error = true;

    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login/style.css">
</head>
<body>
    <div class="title">
        <h1>WeLend</h1>
        <p>Peminjaman menjadi</p>
        <p>lebih mudah.</p>
    </div>
    <div class="container">
            <div class="container-h2">
                <h2>Silahkan Login</h2>
                <h2>Terlebih dahulu</h2>
            </div>
            <?php if( isset($error) ) : ?>
                <p style="color: red; font-style: italic;">Email / Password salah</p>
            <?php endif; ?>
            <form action="" method="post">
                <div class="txt-field">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Contoh@gmail.com">
                </div>
                <div class="txt-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="*****">
                </div>
                    <button type="submit" name="submit" class="button">Masuk</button>
            </form>
            <p>Hubungi CS bila bermasalah <a href="contact.php">CS</a></p>
        </div>
    </div>
</body>
</html>