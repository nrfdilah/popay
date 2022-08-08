<?php
require "checkpost.php";
require "../db/database.php";

$validated = false;
$donasiname = "";
$donasiid = null;
$success = false;

if (isset($_POST["donasiid"])) {
    $db = new Database();

    $donasiid = $_POST["donasiid"];
    $userid = $_POST["userid"];
    $pass = $_POST["password"];
    $amount = (int)$_POST["jumlah_donasi"];
    $private = (boolean)$_POST["private"];
    $donasiame = $_POST["donasiname"];
    $keterangan = $_POST["keterangan"];

    $validated = $db->validatePassword($userid, $pass);

    if ($validated && $amount >= 1000 && $amount <= $db->getUserById($userid, PDO::FETCH_OBJ)->saldo) {
        if ($db->funddonasi($donasiid, $userid, $amount, $private)) {
            $db->addTransaction($amount, "donasi", "keluar", $userid, "direct", $keterangan, "Donasi $donasiname");
            $success = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>

    <title>Donasi Sukses</title>
</head>

<body>
    <div class="container text-center mt-2">
        <div class="p-2 pt-1">
            <h1 class="card-title">Donasi <?= $success ?'Sukses!' : 'Gagal' ?></h1>
            <p class="card-text">Donasi Anda <?= $donasiame ? "untuk $donasiame" : "" ?> <?= $success ?'senilai ' . boldGreen(rupiah($amount)) : '' ?> telah <?= $success ?'sukses!' : 'gagal' ?></p>

            <?php 
                $satusState = $success;
                include "../component/statusIcon.php";
            ?>

            <?php if (!isset($_POST["donasiid"])) { ?>
                <p class="card-text">Donasi telah dilakukan, Anda dapat meninggalkan halaman ini</p>
                <a href="../user/donasi.php" role="button" class="btn btn-lg" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">Kembali ke halaman list donasi</a>
            <?php } else if ($amount < 1000) { ?>
                <p class="card-text">Mohon maaf, minimal dana untuk donasi yaitu <?=boldGreen(rupiah(1000))?></p>
                <a href="../user/bayardonasi.php?payment_success=0&id_donasi=<?= $donasiid ?>" role="button" class="btn btn-lg" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">Kembali ke halaman list donasi</a>
            <?php } else if (!$validated) { ?>
                <p class="card-text">Terjadi kesalahan autentikasi</p>
                <a href="../user/bayardonasi.php?payment_success=0&id_donasi=<?= $donasiid ?>" role="button" class="btn btn-lg" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">Kembali ke halaman list donasi</a>
            <?php } else { ?>
                <a href="../user/bayardonasi.php?payment_success=1&id_donasi=<?= $donasiid ?>" role="button" class="btn btn-lg" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">Kembali ke halaman list donasi</a>
            <?php } ?>

        </div>
    </div>
    <?php include "../component/scripts.php" ?>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>