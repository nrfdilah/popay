<?php
require "checkpost.php";
require "../db/database.php";

$validated = false;

if (isset($_POST["userid"])) {
    $db = new Database();

    $userid = $_POST["userid"];
    $adminid = $_POST["adminid"];
    $nominal = (int)$_POST["nominal_setor"];
    $keterangan = $_POST["keterangan"];
    $deskripsi = $_POST["deskripsi"];
    $pass = $_POST["password"];

    $validated = $db->validateAdminPassword($adminid, $pass);

    if ($validated && $nominal >= 1000) {
        if ($db->userDeposit($userid, $nominal)) {
            $db->addTransaction($nominal, "topup", "masuk", $userid, "Disetor oleh admin", $keterangan, $deskripsi);
            $db->addAdminJournal($adminid, "setor_tunai_user", $nominal, $userid);

            header("Location: ../admin/detail_user.php?ssc=Top Up Sukses&id=$userid");
            die();
        }
    } else {
        header("Location: ../admin/detail_user.php?ssc=Password salah atau nominal tarik terlalu kecil&id=$userid");        
    }
}
?>
