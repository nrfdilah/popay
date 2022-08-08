<?php
session_start();

require '../db/database.php';

if (!isset($_SESSION['userid'])) {
    header("Location: ../user/login.php");
    die();
}

$db = new Database();
$data = $db->getUserById($_SESSION['userid'], PDO::FETCH_ASSOC);

if ($_SESSION['level'] != "user") {
    header("Location: ../admin/home.php");
    die();
}
