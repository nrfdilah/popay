<?php
require "checkpost.php";
require "../db/database.php";

$db = new Database();

$pass = $db->deleteKantin(
    $_POST["id"]
);

$db->addAdminJournal($_POST["adminid"], "Hapus kantin", 0, $_POST["id"]);

header("Location: ../admin/kantin.php");
die();