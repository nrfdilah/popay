<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    
    <link href="https://popay.my.id/themify-icons.css" rel="stylesheet">

    <title>Halaman Admin</title>

<style>
body{
    background: #D8D8D8;
}

.card-text{
   font-size: 21px;
}
 .card-body{
     border-radius: 0px;
 }

 .table-responsive{
     border-radius: 0px;
 }
     .col-sm-4{
        border-radius: 0px;
     }

     ::-webkit-scrollbar-thumb {
  background: #000000;
  border: 0px none #000;
  border-radius: 0px;
}

::-webkit-scrollbar-thumb:hover {
  background: #000000;
}

::-webkit-scrollbar-thumb:active {
  background: #000000;
}
::-webkit-scrollbar {
  width: 8px;
  height: 7px;
}

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
    </style>
    
</head>

<body>
    <?php include "../process/getAdminLoginData.php" ?>
    <?php include "../component/admin/sidebaropen.php" ?>

    <?php

function boldWhite($str) {
    return "<span class='lead text-white'>$str</span>";
}
?>

<?php

function boldDark($str) {
    return "<span class='lead text-dark'>$str</span>";
}
?>


    <?php
    $pengelola = $db->getPengelolaData($data["id_pengelola"], PDO::FETCH_OBJ);

    $stats = $db->getPengelolaStats($data["id_pengelola"]);

    // print_r($trx);
    ?>
<br><br><br>
<center>  <h2 class="font-weight-light" style="border-radius: 30px; background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 5px;">
                <i class="fas fa-user" aria-hidden="true"></i> Halaman Admin</h2></center>



    <div class="card my-4">
        <div class="card-body">
        <img src="../assets/icon-128.png" style="width: 90px; height: 90px; float: left; margin-right: 10px; border-radius: 30px;"  alt=""> 
            <h3 class="card-title" style="font-size: 19px;"><i class="fas fa-building" aria-hidden="true"></i>
            Pengelola: <?= $pengelola->nama_pengelola ?>
            <h3 class="card-title" style="font-size: 19px;"><i class="fas fa-phone" aria-hidden="true"></i>
            No. Telepon: <?= $pengelola->telepon ?></span></h3>
          
       <br><br>

            <div class="row">
                <div class="col-sm-4 my-5 mr-5-mx-1 pl-1">
                    <div class="card" style="background-color: #4B6ED4; color: #fff;">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-male" style="background: #fff; padding: 7px; color: #4B6ED4;" aria-hidden="true"></i> Total User Laki-laki</h4>
                            <p class="card-text"><?= $stats->user->laki ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 my-5 pr-1">
                    <div class="card" style="background-color: #DA5925; color: #fff;">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="fas fa-female" style="background: #fff; padding: 7px; color: #DA5925;"></i> Total User Perempuan</h4>
                            <p class="card-text"><?= $stats->user->perempuan ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 my-5">
                    <div class="card" style="background-color: #294365; color: #fff;">
                        <div class="card-body">
                            <h4 class="card-title"><i class="fas fa-male" style="background: #fff; padding: 7px; color: #294365;"></i>
                            <i class="fas fa-female" style="background: #fff; padding: 7px; color: #294365;"></i> Total User</h4>
                            <p class="card-text"><?= $stats->user->total ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
               
                <div class="col-sm-3 mt-2 pl-1">
                    <div class="card pointer" onclick="location.href = 'user.php'">
                        <div class="card-body" style="background-color: #43BD5C; color: #fff;">
                            <h4 class="card-title" style="font-size: 20px;"><i class="fas ti-user" style="background: #fff; padding: 7px; color: #43BD5C;"></i> Total Saldo User</h4>
                            <p class="card-text"><?= boldWhite(rupiah($stats->balance->user)) ?></p>
                        </div>
                    </div>
                </div>
               
                <div class="col-sm-3 mt-2">
                    <div class="card pointer" onclick="location.href = 'donasi.php'">
                        <div class="card-body" style="background-color: #4B6ED4; color: #fff;">
                            <h4 class="card-title"><i class="fas ti-hand-open" style="background: #fff; padding: 7px; color: #4B6ED4;"></i> Donasi</h4>
                            <p class="card-text"><?= boldWhite(rupiah($stats->balance->donasi)) ?></p>
                        </div>
                    </div>
                </div>
            </div>
           
            <h4 class="mt-4"  style="background-color: #4B6ED4; color: #fff; padding: 7px;" >Total: <?= boldWhite(rupiah($stats->balance->total)) ?></h4>
        </div></div>
    </div>

    <?php include "../component/admin/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
    <?php $noback = true; require "../component/scrollTop.php" ?>
</body>

</html>