<?php
require "checkpost.php";
require "../db/database.php";

$db = new Database();

$pass = $db->deleteDonasi(
    $_POST["id"]
);

$db->addAdminJournal($_POST["adminid"], "Hapus donasi", 0, $_POST["id"]);

header("Location: ../admin/donasi.php");
die();