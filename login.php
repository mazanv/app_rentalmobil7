<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.js"></script>
    <title>Login | Sewa</title>
</head>

<body>
    <div class="container">
        <!-- <?php
                // if (isset($_GET["pesan"])) {
                //     if ($_GET["pesan"] == "gagal") {
                //         echo "Login Gagal Username & Password Salah!";
                //     } else if ($_GET["pesan"] == "logout") {
                //         echo "Anda Telah Berhasil Logout";
                //     } else if ($_GET["pesan"] == "belum_login") {
                //         echo "Anda Harus Login Terlebih Dulu!";
                //     }
                // }

                ?> -->
        <h1 class="text-center">Login</h1>
        <!-- <div class="card"> -->
        <form action="proses_login.php" method="post">
            <label for="username" class="label-control">Username</label>
            <br><input class="form-control" type="username" name="username" id="username"><br>
            <label for="password" class="label-control">Password</label>
            <br><input class="form-control" type="password" name="password" id="password"><br>
            <a href="submit"><button class="btn btn-primary">Login</button></a>
        </form>
        <!-- </div> -->
    </div>

</body>

</html>