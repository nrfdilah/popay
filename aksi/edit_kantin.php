<?php
require "checkpost.php";
require "../db/database.php";

$db = new Database();

$pass = $db->editKantinFull(
    $_POST["id"],
    $_POST["nama"],
    $_POST["deskripsi"]
);

$db->addAdminJournal($_POST["adminid"], "Edit kantin", 0, $_POST["id"]);

header("Location: ../admin/info_kantin.php?id=".$_POST["id"]);
die();