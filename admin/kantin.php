<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>Kantin</title>

    <style>
        body{
    background: #D8D8D8;
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
        </style>
</head>

<body>
    <?php include "../process/getAdminLoginData.php" ?>
    <?php include "../component/admin/sidebaropen.php" ?>

    <?php 
    $kantin = $db->getKantinList($data["id_pengelola"], PDO::FETCH_OBJ);
    ?>

    <!-- <h1>Tambah Kantin Baru</h1> -->
<br><br><br>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">
          
            <center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; border-radius: 30px; padding: 5px;">
                <i class="fas ti-shopping-cart" aria-hidden="true"></i> Kantin</h2></center>
                <br><br>

                <button class="btn btn-primary" style="background: #4B6ED4; border: 1px solid #4B6ED4; border-radius: 30px; padding: 7px;" type="button" data-toggle="collapse" data-target="#tambah_kantin"><i class="fas ti-shopping-cart" aria-hidden="true"></i> Tambah Kantin</button>
            </h1>

            <div class="collapse" id="tambah_kantin">
                <form action="../aksi/kantin_baru.php" method="post">
                    <div class="form-group">
                        <label for="nama_kantin">Nama Kantin:</label>
                        <input type="text" class="form-control" style="border-radius: 0px; border: 1px solid #070707;" name="nama" id="nama_kantin" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea class="form-control" style="border-radius: 0px; border: 1px solid #070707;" name="deskripsi" id="deskripsi" cols="30" rows="10" required></textarea>
                    </div>

                    <input type="hidden" name="idpengelola" value="<?=$data["id_pengelola"]?>">
                    <input type="hidden" name="adminid" value="<?=$data["id"]?>">

                    <input type="submit" style="border-radius: 30px; padding: 7px; background: #4B6ED4; border: 1px solid #4B6ED4;" class="btn btn-primary" value="Tambah kantin">
                </form>
            </div>

            <div class="row">
                <?php
                foreach ($kantin as $t) {
                    ?>

                <div class="col-sm-12 col-md-6 mt-4">
                    <div class="card h-100">
                        <div class="card-body" style="border-radius: 20px; 
                        background: #4B6ED4; color: #fff;">
                            <h5 class="card-text"><i class="fas ti-shopping-cart" aria-hidden="true"> Nama Kantin: </i> <?= $t->nama ?></h5>
                            <p class="card-text" style="font-size: 19px;"><i class="fas ti-pencil" aria-hidden="true"></i> Deskripsi: <?= $t->deskripsi ?></p>
                            <p class="card-text" style="font-size: 19px;"><i class="fas ti-bookmark-alt" aria-hidden="true"></i> Saldo: <?= rupiah($t->saldo) ?></p>
                         <center>   <a href="info_kantin.php?id=<?= $t->id ?>" class="btn" style="border-radius: 0px; 
                            border: 1px #fff; background: #fff; color: #000; width: 100px; float: center;">Detail</a> </center>
                        </div>
                    </div>
                </div>

                <?php

            }
            ?>
            </div>
        </div>

    </div>

    <?php include "../component/admin/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
    <?php require "../component/scrollTop.php" ?>

</body>

</html> 