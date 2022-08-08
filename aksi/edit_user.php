<?php
require "checkpost.php";
require "../db/database.php";

$db = new Database();

$pass = $db->editUserFull(
    $_POST["id"],
    $_POST["nama"],
    $_POST["idpengelola"],
    $_POST["jenis_kelamin"],
    $_POST["email"],
    $_POST["provinsi"],
    $_POST["kodepos"],
    $_POST["pekerjaan"],
    $_POST["teleponuser"]
);

$db->addAdminJournal($_POST["adminid"], "edit_user", 0, $_POST["id"]);

header("Location: ../admin/detail_user.php?id=".$_POST["id"]);
die();
