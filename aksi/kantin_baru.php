<?php
require "checkpost.php";
require "../db/database.php";

$db = new Database();

$id = $db->registerKantin(
    $_POST["nama"],
    $_POST["deskripsi"],
    $_POST["idpengelola"]
)[1];

$db->addAdminJournal($_POST["adminid"], "Membuat kantin", 0, $id);

header("Location: ../admin/kantin.php");
die();

