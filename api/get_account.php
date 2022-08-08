<?php
header('Content-Type: application/json; charset=utf-8');
require "../db/database.php";

$is_valid = false;

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $r_val["status"] = "false";
    echo json_encode($r_val);
    exit;
}

if (isset($_POST["telponuser"])) {
  $db = new Database();

  $account = $_POST["telponuser"];

  $result = $db->getUserByteleponuser($account, PDO::FETCH_OBJ);
  if($result!=null) $is_valid = true;
}
$r_val["status"] = ($is_valid)? 'true': 'false';
$r_val["account"] = $result;
echo json_encode($r_val)

?>