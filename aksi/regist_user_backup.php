<?php
require "checkpost.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    
    <title>Daftar User</title>

    <link href="https://popay.my.id/themify-icons.css" rel="stylesheet">

</head>

<body>
<div class='container text-center'>
    <?php
    include "../db/database.php";

    $db = new Database();

    $pengelola = $db->getPengelolaByCode($_POST["kode_pengelola"], PDO::FETCH_OBJ);
    $checkUser = $db->getUserByEmail($_POST["email"], PDO::FETCH_OBJ);

    if (!$pengelola) {
        echo "<h1>Maaf, PoPay tidak  menemukan kode pengelola tersebut</h1>";
        echo "<button onclick='history.back()' class='btn btn-primary'>Kembali</button>";

        return;
    }

    if ($checkUser) {
        echo "<h1>Maaf, email telah digunakan</h1>";
        echo "<button onclick='history.back()' class='btn btn-primary'>Kembali</button>";

        return;
    }

    $res = $db->register(
        $_POST["nama"],
        $pengelola->id,
        $_POST["jenis_kelamin"],
        $_POST["email"],
        $_POST["provinsi"],
        $_POST["kodepos"],
        $_POST["pekerjaan"],
        $_POST["teleponuser"],
        0
    );

    ?>


    <div class="card">
        <div class="card-body">
            <form action="../aksi/ubah_password.php" method="post" class="validatedForm">

               <center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 3px;">
                <i class="fas ti-bookmark" aria-hidden="true"></i> Atur Password</h2></center>

                <center>   <h2 class="font-weight-light" style=" color: red; font-size: 15px;">
               *Jika memutuskan untuk tidak mengubah password Anda, mohon diingat password
            yang telah ada saat ini.</h2></center>

                <div class="form-group">
                    <label for="old_password">Password saat ini:</label>
                    <input type="text" style="border-radius: 0px; border: 1px solid #464545;" name="old_password" id="old_password" class="form-control mb-1" value="<?= $res[1] ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="new_password">Password baru:</label>
                    <center>   <h2 class="font-weight-light" style=" color: red; font-size: 11px;">
               *Demi keamanan data, mohon masukkan password minimal 8 digit dengan kombinasi huruf kapital dan angka. Terima kasih.</h2></center>
                    <input type="password" style="border-radius: 0px; border: 1px solid #464545;" name="new_password" id="new_password" class="form-control mb-1">
                </div>

                <div class="form-group">
                    <label for="new_password_confirm">Konfirmasi password baru:</label>
                    <input type="password" style="border-radius: 0px; border: 1px solid #464545;" name="new_password_confirm" id="new_password_confirm" class="form-control mb-1">
                </div>

                <input type="hidden" name="id" value="<?= $res[0] ?>">

                <input type="submit" style="border-radius: 0px; border: 1px #4B6ED4; 
                background: #4B6ED4; color: #fff; padding: 7px;"
 class="btn" value="Ubah password">
            </form><br>
            <a href="../user/login.php" style="border-radius: 0px; font-size: 15px; border: 1px #4B6ED4; background: #4B6ED4; padding: 7px; color: #fff;">Tidak mengubah password</a>

        </div>
    </div>
</div>

    <?php include "../component/scripts.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script>
        $('.validatedForm').validate({
            rules: {
                old_password: {
                    minlength: 6
                },
                new_password: {
                    minlength: 6
                },
                new_password_confirm: {
                    minlength: 6,
                    equalTo: "#new_password"
                }
            },
            messages: {
                old_password: {
                    minlength: "Password setidaknya 6 karakter"
                },
                new_password: {
                    minlength: "Password setidaknya 6 karakter"
                },
                new_password_confirm: {
                    minlength: "Password setidaknya 6 karakter",
                    equalTo: "Password tidak cocok"
                }
            }
        });

        $('.validatedForm').submit(() => $('.validatedForm').valid())
    </script>
</body>

</html>