<?php
require "checkpost.php";
require "../db/database.php";

$db = new Database();

$id = $db->createDonasi(
    $_POST["judul"],
    $_POST["deskripsi"],
    $_POST["target"],
    $_POST["idposter"]
);

$db->addAdminJournal($_POST["idposter"], "Membuat donasi", 0, $id);

header("Location: ../admin/donasi.php");
die();
