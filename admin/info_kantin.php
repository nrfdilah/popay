<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>

    <title>Detail Kantin</title>

    <style>
        body{
    background: #D8D8D8;
}
td{
color: #fff;
}

td, th {
  border: 1px solid #dddddd;
}

th{
  background: #fff;  
}

</style>

</head>

<body>
    <?php include "../process/getAdminLoginData.php" ?>
    <?php include "../component/admin/sidebaropen.php" ?>

    <?php if (isset($_GET["ssc"])) { ?>
        <div class="modal" id="sccModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content bg-primary text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <?= $_GET["ssc"] ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
} ?>


    <?php
    $kantin = $db->getKantin($_GET["id"], PDO::FETCH_OBJ);
    ?>
<br><br><br>
    <div class="row">
        <div class="col-md-5">
            <h1><i class="fas ti-shopping-cart" style="background: #4B6ED4; padding: 7px; border-radius: 7px;
            color: #fff;"></i> Nama Kantin: <?= $kantin->nama ?>
            
               </h1>

            <div class="mt-4" style="font-size: 19px;">
                <p><i class="fas ti-book" style="background: #4B6ED4; border-radius: 7px; padding: 7px; color: #fff;"></i> Deskripsi: <?= $kantin->deskripsi ?></p>
               
                <?php
$isadmin = isset($_SESSION['adminid']);
$res = $db->getKantinList($data["id_pengelola"], PDO::FETCH_OBJ);

if ($res) {
    echo '<div class="row">';

    foreach ($res as $r) {

        ?>

<form action="../aksi/hapus_kantin.php" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $r->id ?>">
                                    <input type="hidden" name="adminid" value=<?= $data["id"] ?>>

                                    <input type="submit" class="btn m-1" style="padding: 8px; background: #C16350; border-radius: 20px;
                                color: #fff;" value="Hapus Kantin">
                                </form>
                            <?php } ?>
                        </div>
                        <?php } ?>

               
                <a href="#edit_kantin" data-toggle="collapse" class="btn" style=" margin-top: -78px; margin-left: 105px; background: #20346F; padding: 7px;
            color: #fff; border-radius: 20px;"><i class="fas fa-pencil-alt" style="background: #20346F; padding: 5px;color: #fff;"></i> Edit info kantin</a>
           
          
           <h3>Saldo Kantin: <?= rupiah($kantin->saldo) ?></h3>
            </div>

            <!-- <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4"><a href="#buat_qr" data-toggle="collapse" class="btn btn-primary m-1 w-100"><i class="fas fa-qrcode" aria-hidden="true"></i> Buat Kode QR</a></div>
                        <div class="col-md-4"><a href="#tarik_tunai" data-toggle="collapse" class="btn btn-primary m-1 w-100"><i class="fas fa-qrcode" aria-hidden="true"></i> Tarik Tunai</a></div>
                        <div class="col-md-4"><a href="scan.php" class="btn btn-primary m-1 w-100"><i class="fas fa-qrcode" aria-hidden="true"></i> Edit Kantin</a></div>
                    </div>
                </div>
            </div> -->

            <div class="collapse card p-4 mt-3" id="edit_kantin">
            <center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 3px;">
                <i class="fas ti-shopping-cart" aria-hidden="true"></i> Edit Info Kantin</h2></center>


                <form action="../aksi/edit_kantin.php" method="post">

                    <div class="form-group">
                        <label for="nama">Nama Kantin:</label>
                        <input type="text" style="border-radius: 0px; border: 1px solid; #464545;" class="form-control" name="nama" id="nama" value="<?= $kantin->nama ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea class="form-control" style="border-radius: 0px; border: 1px solid; #464545;" name="deskripsi" id="deskripsi" cols="30" rows="10" required><?= $kantin->deskripsi ?></textarea>
                    </div>

                                <input type="hidden" name="id" value="<?= $kantin->id ?>">
                                <input type="hidden" name="adminid" value="<?= $data["id"] ?>">

                    <input type="submit" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" class="btn" value="Edit">
                </form>
            </div>

            <div class="card my-3" id="card-wrapper">
                <div class="card-body" style="background: #4B6ED4; color: #fff;">
                    <h3 class="card-title"><i class="fas fa-qrcode" style="color: #fff;"></i>
                        Kode QR</h3>

                    <?php
                    $qr = $db->getQRCodeKantin($kantin->id, PDO::FETCH_OBJ);

                    if ($qr) {
                        ?>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Produk</th>
                                    <th>Unique ID</th>
                                    <th>Tetap</th>
                                    <th>Nominal</th>
                                    <th>Print</th>
                                    <th>Hapus</th>
                                </tr>

                                <?php
                                foreach ($qr as $q) {
                                    ?>

                                    <tr>
                                        <td><?= $q->id ?></td>
                                        <td><?= $q->judul ?></td>
                                        <td><?= $q->unique_id ?></td>
                                        <td class="pl-4"><?= $q->tetap ? "&check;" : "X" ?></td>
                                        <td><?= $q->nilai ?></td>
                                        <td><a href="<?= "../aksi/printqr.php?qrdata=$q->unique_id&judul=$q->judul&kantin=$kantin->nama&idkantin=$kantin->id" ?>">Print</a></td>
                                        <td><a href="hapus_produk.php?id=<?php echo $q->id?>" class="btn" style="border-radius: 0px; border: 1px #fff; background: #fff; color: #000;"
>Hapus</a></td>
                                    </tr>

                                <?php

                            }
                            ?>
                            </table>
                        </div>

                    <?php

                } else {
                    echo "<p class='card-text'>Belum ada Kode QR yang dibuat pada kantin ini</p>";
                }
                ?>

                </div>
            </div>

            <div class="card my-3" id="card-wrapper">
                <div class="card-body" style="background: #294365; color: #fff;">
                    <h3 class="card-title"><i class="fas ti-share" style="color: #fff;"></i> Transaksi</h3>

                    <?php
                    $transaksi = $db->getTransaksiKantin($kantin->id, PDO::FETCH_OBJ);

                    if ($transaksi) {
                        ?>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>ID Kode QR</th>
                                    <th>ID Pembeli</th>
                                    <th>Waktu Transaksi</th>
                                    <th>Jumlah Transaksi</th>
                                </tr>

                                <?php
                                foreach ($transaksi as $d) {
                                    ?>

                                    <tr>
                                        <td><?= $d->id ?></td>
                                        <td><?= $d->qr_id ?></td>
                                        <td><a href="detail_user.php?id=<?= $d->user_id ?>"><?= $d->user_id ?></a></td>
                                        <td><?= $d->tanggal ?></td>
                                        <td data-sort="<?=$d->jumlah?>"><?= rupiah($d->jumlah) ?></td>
                                    </tr>

                                <?php

                            }
                            ?>
                            </table>
                        </div>

                    <?php

                } else {
                    echo "<p class='card-text'>Belum ada transaksi di kantin ini</p>";
                }
                ?>

                </div>
            </div>
        </div>

        <div class="col-md-7">

            <div class="card p-4 mt-3" id="buat_qr">
                <form action="../aksi/qr_baru.php" method="post">
                <center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 5px; border-radius: 30px;">
                <i class="fas fa-qrcode" aria-hidden="true"></i> Buat Kode QR</h2></center>

                    <div class="form-group">
                        <label for="judul_qr">Nama Produk:</label>
                        <input type="text" style="border-radius: 0px;
                        border: 1px solid #464545;" class="form-control" name="judul" id="judul_qr" required>
                    </div>

                    <div class="form-group">
                        <label for="nilai">Harga Produk:</label>
                        <input type="number" style="border-radius: 0px;
                        border: 1px solid #464545;" class="form-control uang" name="nilai" id="nilai" value="0" required>
                        <small class="form-text text-muted">*Harga produk yang harus dibayar oleh pembeli.</small>
                    </div>

                    <div class="form-check ml-4 mb-3">
                        <input type="checkbox" class="form-check-input" name="tetap" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Tidak dapat diubah</label>
                        <small class="form-text text-muted">*Harga tidak dapat diubah</small>
                    </div>

                    <input type="hidden" name="adminid" value="<?= $data["id"] ?>">
                    <input type="hidden" name="kantinid" value="<?= $kantin->id ?>">
                    <input type="hidden" name="namakantin" value="<?= $kantin->nama ?>">

                    <input type="submit" style="padding: 5px; border-radius: 30px; background: #4B6ED4; color: #fff;" class="btn" value="Buat kode QR">
                </form>
            </div>

            <div class="card p-4 my-3" id="tarik_tunai">
            <center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 5px; border-radius: 30px;">
                <i class="fas fa-user" aria-hidden="true"></i> Tarik Saldo/Tunai Kantin</h2></center>


                <form action="../aksi/tarik_tunai_kantin.php" method="post">

                    <div class="form-group">
                        <label for="jumlah_penarikan">Jumlah Penarikan Saldo:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="border-radius: 0px;
                        border: 1px solid #464545; background: #20346F; color: #fff;">Rp</span>
                            </div>
                            <input type="number" style="border-radius: 0px;
                        border: 1px solid #464545;" class="form-control uang" name="nominal_tarik" id="jumlah_penarikan" min="1" max="<?= $kantin->saldo ?>" value="<?= $kantin->saldo ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_penyetoran">Deskripsi:</label>
                        <input type="text" style="border-radius: 0px;
                        border: 1px solid #464545;" class="form-control" name="deskripsi" value="Tarik Tunai Kantin" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password Admin:</label>
                        <input type="password" style="border-radius: 0px;
                        border: 1px solid #464545;" class="form-control" name="password" required>
                    </div>

                    <input type="hidden" name="kantinid" value="<?= $kantin->id ?>">
                    <input type="hidden" name="adminid" value="<?= $data["id"] ?>">

                    <input type="submit" style="padding: 7px; border-radius: 30px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" class="btn" value="Tarik Saldo">
                </form>
            </div>
        </div>
    </div>


    <?php include "../component/admin/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
    <?php require "../component/scrollTop.php" ?>

    <script>
        <?php if (isset($_GET["ssc"])) { ?>
            $(window).on('load', function() {
                $('#sccModal').modal('show');
            });
        <?php } ?>
    </script>
</body>

</html>