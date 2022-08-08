<?php

require "../db/database.php";

$db = new Database();

print_r($_POST);

$db->registerAdmin(
    $_POST["nama"], 
    $_POST["email"], 
    $_POST["password"],
    $_POST["idpengelola"]
);

header("Location: ../admin/login.php");
die();

