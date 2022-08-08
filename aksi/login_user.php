<?php
require "checkpost.php";
session_start();

require "../db/database.php";

$db = new Database();

$res = $db->login($_POST["useremail"], $_POST["userpass"], "*");

if($res) {
    $_SESSION['userid'] = $res;
    $_SESSION['level'] = "user";

    header("Location: ../user/home.php");
    die();
} else {
    header("Location: ../user/login.php?ssc=Login user tidak berhasil. User belum terdaftar&id=error=1");
    die();
}