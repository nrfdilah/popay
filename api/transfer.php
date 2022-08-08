<?php
header('Content-Type: application/json; charset=utf-8');
require "../db/database.php";

$success = false;
$trx = null;

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $r_val["status"] = "failed";
    $r_val["message"] = "method not allowed";
    echo json_encode($r_val);
    exit;
}

if (isset($_POST["sender"]) && isset($_POST["receiver"])) {
  $db = new Database();

  $teleponsender = $_POST["sender"];
  $teleponreceiver = $_POST["receiver"];
  $amount = (int)$_POST["amount"];
  $keterangan = "";

  $user_pengirim = $db->getUserByteleponuser($teleponsender, PDO::FETCH_OBJ);
  $user_tujuan = $db->getUserByteleponuser($teleponreceiver, PDO::FETCH_OBJ);

  $diri_sendiri = $teleponsender == $teleponreceiver;

  if ($user_tujuan && $user_pengirim && !$diri_sendiri && $amount <= $user_pengirim->saldo && $amount >= 500) {
    if ($db->transferFromTeleponToTelepon($teleponsender, $teleponreceiver, $amount)) {
      $db->addTransaction($amount, "transfer", "keluar", 
          $user_pengirim->id, "manual", 
          "Transfer ke $user_tujuan->nama", $keterangan);

      $id = $db->addTransaction($amount, "transfer", "masuk", 
          $user_tujuan->id, "manual", 
          "Transfer dari $user_pengirim->nama", $keterangan);

        $trx = $db->getTransaction($id, PDO::FETCH_OBJ);
      
      $success = true;
    }
  }
}

$r_val["status"] = $success ? "success" : "failed";
$r_val["message"] = $success ? "jumlah uang telah berhasil terkirim" : "proses transfer uang mengalami kegagalan, silahkan coba lagi";
echo json_encode($r_val)

?>