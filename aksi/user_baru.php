<?php
require "checkpost.php";
require "../db/database.php";

$db = new Database();

$res = $db->register(
    $_POST["nama"],
    $_POST["idpengelola"],
    $_POST["jenis_kelamin"],
    $_POST["email"],
    $_POST["provinsi"],
    $_POST["kodepos"],
    $_POST["pekerjaan"],
    $_POST["teleponuser"],
    $_POST["saldo"]
);

$db->addAdminJournal($_POST["adminid"], "Daftar user", 0, $res[0]);

echo "Password user: $res[1]<br/>Mohon untuk diingat. Terima kasih.";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../component/things.php" ?>

  <title>Daftar user berhasil</title>

<style>
body{
    font-size: 25px;
}
    </style>

</head>

<body>
  <div class="container text-center mt-2">
    <div class="p-2 pt-1">
    <a href="../admin/user.php" style="border-radius: 0px; font-size: 23px; border: 1px #4B6ED4; background: #4B6ED4; padding: 10px; color: #fff;">Kembali</a>

    </div>
  </div>
    </body>

</html>
