<?php
require "checkpost.php";
require "../db/database.php";

$success = false;

$judul = "";
$trx = null;

if (isset($_POST["uniqueid"])) {
  $db = new Database();

  $judul = $_POST["judul"];
  $userid = $_POST["userid"];
  $uniqueid = $_POST["uniqueid"];
  $amount = (int)$_POST["nominal"];

  $user = $db->getUserById($userid, PDO::FETCH_OBJ);

  if ($amount < $user->saldo && $amount >= 500) {
    if ($db->payKantin($userid, $uniqueid, $amount)) {
      $id = $db->addTransaction($amount, "pembelian", "keluar", $userid, "qrcode", "Pembelian $judul");
      $trx = $db->getTransaction($id, PDO::FETCH_OBJ);
      
      $success = true;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../component/things.php" ?>

  <title>Pembayaran Sukses</title>
  
   <style>
     ::-webkit-scrollbar-thumb {
  background: #000000;
  border: 0px none #000;
  border-radius: 0px;
}

::-webkit-scrollbar-thumb:hover {
  background: #000000;
}

::-webkit-scrollbar-thumb:active {
  background: #000000;
}
::-webkit-scrollbar {
  width: 8px;
  height: 7px;
}


/* Bottom Menu */
.bottom-menu{
    background-color: #4B6ED4;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;

}

.bottom-menu p{
    font-size: 14px;
}



.bottom-menu i{
    font-size: 18px;
}

.bottom-menu a{
    text-decoration: none;
    color: #fff;
}

.bottom-menu a:hover{
    color: #fff ;
}


/* Scan Tab */

.scan-tab{

    width: 60px;
    height: 60px;
    background-color: #4B6ED4;
    position: fixed;
    bottom: 40px;
    left: 0;
    right: 0;
    border-radius: 100%;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    

}

.inner{
    width: 52px;
    height: 52px;
    background-color: #fff;
    border-radius: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    animation: glow 3s infinite #142A67;
}
</style>

  
</head>

<body>
  <div class="container text-center mt-2">
    <div class="p-2 pt-1">
      <h1 class="card-title text-<?= $success ? "success" : "danger" ?>">Pembayaran <?= $success ?'Sukses!' : 'Gagal' ?></h1>
      <p class="card-text lead">Produk: <?= $success ? $judul : ""?></p>
      <p class="card-text">Tanggal pembayaran: <?= $success ? $trx->tanggal : ""?></p>
      
      <?php 
        $satusState = $success;
        include "../component/statusIcon.php";
      ?>

      <?php if (!isset($_POST["uniqueid"])) { ?>
        <p class="card-text">Pembayaran telah dilakukan, silakan scan ulang QR code untuk melakukan pembayaran lagi</p>
        <a href="../user/scan.php" role="button" class="btn btn-lg" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;"
>Kembali</a>
      <?php } else if (!$success) { ?>
        <p class="card-text">Terjadi kesalahan<br/><?= $amount > $user->saldo ?"Saldo anda tidak mencukupi" : ($amount < 500 ? "Minimal pembayaran adalah ".boldGreen(rupiah(500)): "") ?></p>
        <a href="../user/scan.php" role="button" class="btn btn-lg" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">Kembali</a>
      <?php } else { ?>
      <p class="card-text">Pembelian <?= $judul ?> <?= $success ?'senilai ' . boldGreen(rupiah($amount)) : '' ?> telah <?= $success ?'sukses!' : 'gagal' ?></p>
        <a href="../user/scan.php" role="button" class="btn btn-lg" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">Kembali</a>
      <?php } ?>

    </div>
  </div>
  
  <div class="bottom-menu">


                <div class="scan-tab">
                    <div class="inner">
                        <a href="scan.php">
                            <i class="fa fa-qrcode" style="color: #000;" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="row">

                            <a href="home.php" class="col-3 text-center my-2">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <p class="mb-0">Home</p>
                            </a>

                            <a href="kirim.php" class="col-3 text-center my-2">
                                <i class="fa fa-wallet" aria-hidden="true"></i>
                                <p class="mb-0">Transfer</p>
                            </a>

                            <a href="donasi.php" class="col-3 text-center my-2">
                                <i class="fa ti-hand-open" aria-hidden="true"></i>
                                <p class="mb-0">Donasi</p>
                            </a>

                            <a href="history.php" class="col-3 text-center my-2">
                                <i class="fa fa-exchange-alt" aria-hidden="true"></i>
                                <p class="mb-0">Riwayat Transaksi</p>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br><br>
  
  <?php include "../component/scripts.php" ?>
  

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>