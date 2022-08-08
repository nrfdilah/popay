<?php
require "checkpost.php";
require "../db/database.php";

$db = new Database();

$res = $db->registerPengelola(
    $_POST["nama_pengelola"],
    $_POST["telepon_pengelola"],
    $_POST["provinsi_pengelola"],
    $_POST["alamat"],
    $_POST["email_pengelola"],
    isset($_POST["kode"])
);

if ($res) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include "../component/things.php" ?>

        <link rel="shortcut icon" type="image/x-icon" href="icon.ico"/>
    <link rel="stylesheet" href="../styles/landing.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://popay.my.id/themify-icons.css" rel="stylesheet">


        <title>Daftar Admin</title>

    </head>

    <body id="blog">

    <nav class="navbar fixed-top white navbar-expand-lg navbar-light" style="background-color: #4B6ED4;">
        <a class="navbar-brand" href="#"> <img src="../assets/pnup.png" width="30" height="50" class="d-inline-block align-top" alt=""></a>
        <div style="color: #ffffff; font-size: 23px;">POPAY</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff; font-size: 20px;">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #FFFFFF;">
                        <a class="dropdown-item" href="../user/login.php" style="background-color: #4B6ED4; color: #FFFFFF;">User</a>
                        <a class="dropdown-item" href="../admin/login.php" style="background-color: #4B6ED4; color: #FFFFFF;">Pengelola/Admin</a>
                    </div>
                </li>
                <li class="nav-item">
                 <a class="nav-link pointer" href="../index.php" style="color: #ffffff; font-size: 20px;">Daftar Pengelola/Admin</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link pointer" href="../index.php" style="color: #ffffff; font-size: 20px;">Daftar User</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link pointer" href="../index.php" style="color: #ffffff; font-size: 20px;">Tentang</a></div> 
                </li>
            </ul>
        </div>
    </nav>

        <div class="container"><br><br><br><br><br>
            <div class="card">
                <div class="card-body">
                <center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 3px;">
                <i class="fas ti-user" aria-hidden="true"></i> Daftar Admin</h2></center>


                    <form action="regist_admin.php" method="post" class="mt-4">
                        <div class="form-group">
                            <label for="nama">Nama Admin:</label>
                            <input type="text" style="border-radius: 0px; border: 1px solid #464545;" name="nama" id="nama" class="form-control input-sm" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Admin:</label>
                            <input type="email" style="border-radius: 0px; border: 1px solid #464545;" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" style="border-radius: 0px; border: 1px solid #464545;" name="password" id="password" class="form-control input-sm" required>
                        </div>

                        <input type="hidden" name="idpengelola" value="<?= $res ?>">

                     <center>   <input type="submit" value="Daftar" class="btn" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">
</center>   </form>
                </div>
            </div>
        </div>


        <?php include "../component/scripts.php" ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    </body>

    </html>

<?php
} else {
    echo "<div class='container text-center'>";
    echo "<h1>Maaf, tidak dapat mendaftarkan pengelola. Telah terjadi kesalahan</h1>";
    echo "<button onclick='history.back()' class='btn btn-primary'>Kembali</button>";
    echo "</div>";

    return;
}
?>