<?php
require "checkpost.php";
session_start();

require "../db/database.php";

$db = new Database();

$res = $db->loginAdmin($_POST["useremail"], $_POST["userpass"], "*");

if($res) {
    $_SESSION['adminid'] = $res;
    $_SESSION['level'] = "admin";

    $db->addAdminJournal($res, "login", 0);

    header("Location: ../admin/home.php");
    die();
} else {
    header("Location: ../admin/login.php?ssc=Login admin tidak berhasil. Admin belum terdaftar&id=error=1");
    die();
}