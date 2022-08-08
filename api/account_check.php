<?php
header('Content-Type: application/json; charset=utf-8');
require "../db/database.php";

$is_valid = false;

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $r_val["status"] = "false";
    echo json_encode($r_val);
    exit;
}

if (isset($_POST["phone"])) {
  $db = new Database();

  $account = $_POST["phone"];

  $is_exist = $db->getUserByteleponuser($account, PDO::FETCH_OBJ);

  if ($is_exist) {
    $is_valid = true;
  }
}

$r_val["status"] = $is_valid ? "true" : "false";
echo json_encode($r_val)

?>