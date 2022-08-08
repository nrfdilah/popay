<?php
require "checkpost.php";
require "../db/database.php";

$success = false;
$trx = null;

if (isset($_POST["teleponuser"])) {
  $db = new Database();

  $teleponuser = $_POST["teleponuser"];
  $userid = $_POST["userid"];
  $amount = (int)$_POST["nominal"];
  $keterangan = $_POST["keterangan"];

  $user = $db->getUserById($userid, PDO::FETCH_OBJ);
  $user_tujuan = $db->getUserByteleponuser($teleponuser, PDO::FETCH_OBJ);

  $diri_sendiri = $teleponuser == $user->teleponuser;

  if ($user_tujuan && $user->id_pengelola && !$diri_sendiri && $amount <= $user->saldo && $amount >= 500) {
    if ($db->transferByTELEPONUSER($userid, $teleponuser, $amount)) {
      $db->addTransaction($amount, "transfer", "keluar", 
          $userid, isset($_POST["metode"]) ? $_POST["metode"] : "qrcode", 
          "Transfer ke $user_tujuan->nama", $keterangan);

      $id = $db->addTransaction($amount, "transfer", "masuk", 
          $user_tujuan->id, isset($_POST["metode"]) ? $_POST["metode"] : "qrcode", 
          "Transfer dari $user->nama", $keterangan);

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

  <title>Transfer Sukses</title>
</head>

<body>
  <div class="container text-center mt-2">
    <div class="p-2 pt-1">
      <h1 class="card-title text-<?= $success ? "success" : "danger" ?>">Transfer <?= $success ?'Sukses!' : 'Gagal' ?></h1>
      <p class="card-text lead"><?= $success ? "$user->nama <i class='fas fa-arrow-right'></i> $user_tujuan->nama" : ""?></p>
      <p class="card-text">Waktu transfer: <?= $success ? $trx->tanggal : ""?></p>
      
      <?php 
        $satusState = $success;
        include "../component/statusIcon.php";
      ?>


      <?php if (!isset($_POST["teleponuser"])) { ?>
        <p class="card-text">Sepertinya proses transfer telah berhasil sebelumnya</p>
      <?php } else if ($diri_sendiri) { ?>
          <p class="card-text">Tidak dapat mentransfer ke akun sendiri</p>
      <?php } else if (!$user_tujuan) { ?>
          <p class="card-text">User dengan No. Telepon <?=boldGreen($teleponuser)?> tidak ditemukan, harap periksa kembali</p>
      <?php } else if (!$success) { 
         echo "<script>alert('Saldo anda tidak mencukupi')</script>";?>
        <p class="card-text">Terjadi kesalahan<br/><?= $amount > $user->saldo ? "Saldo anda tidak mencukupi" : ($amount < 500 ? "Minimal transfer adalah ".boldGreen(rupiah(500)): "") ?></p>
     
        <?php } if ($amount > $user->saldo ? "Saldo anda tidak mencukupi" : ($amount < 500 ? "Minimal transfer adalah ".boldGreen(rupiah(500)): "")) { 
            echo "<script>alert('Saldo anda tidak mencukupi')</script>";
            
            ?>
            
        <?php } else if ($user_tujuan->id_pengelola != $user->id_pengelola) { ?>
        <p class="card-text">Transfer telah berhasil</p>
      <?php } else { ?>
      <p class="card-text">Transfer <?= $success ?'senilai ' . boldGreen(rupiah($amount)) . ' ke <span class="text-dark">' . $user_tujuan->teleponuser . "</span>": '' ?> telah <?= $success ?'sukses!' : 'gagal' ?></p>
      <?php } ?>
      
      <a href="../user/kirim.php" role="button" class="btn btn-lg" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">Kembali ke halaman transfer</a>
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