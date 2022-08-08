<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>Pembayaran</title>
     <link href="https://popay.my.id/themify-icons.css" rel="stylesheet">
     
      <style>
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


/* Bottom Menu */
.bottom-menu{
    background-color: #4B6ED4;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;

}

.bottom-menu p{
    font-size: 14px;
}



.bottom-menu i{
    font-size: 18px;
}

.bottom-menu a{
    text-decoration: none;
    color: #fff;
}

.bottom-menu a:hover{
    color: #fff ;
}


/* Scan Tab */

.scan-tab{

    width: 60px;
    height: 60px;
    background-color: #4B6ED4;
    position: fixed;
    bottom: 40px;
    left: 0;
    right: 0;
    border-radius: 100%;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    

}

.inner{
    width: 52px;
    height: 52px;
    background-color: #fff;
    border-radius: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    animation: glow 3s infinite #142A67;
}
</style>

    
</head>

<body>
    <?php include "../process/getLoginData.php" ?>
    <?php include "../component/user/sidebaropen.php" ?>

    <div class="text-center">

    <?php
    $qrid = $_GET["qrid"];

    $detailPembayaran = $db->getQR($qrid, PDO::FETCH_OBJ);

    if($detailPembayaran) {
    ?>
     <br><br><br>
     <center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 3px;">
                <i class="fas ti-share" aria-hidden="true"></i> Pembayaran</h2></center>

     
        <h1 class="display-6 mb-0">Nama produk: <?= $detailPembayaran->judul ?></h1>
        <p class="lead text-muted pt-0">Kode unik produk: <?= $qrid ?></p>

        <form action="../aksi/pembayaran.php" method="post" class="mt-3">
            <div class="form-group">
                <label for="nominal_pembayaran">Nominal pembayaran:</label><br>

                <?php
                if ($detailPembayaran->tetap) {
                    ?>
                <h3><?=rupiah($detailPembayaran->nilai)?></h3>
                <input type="hidden" name="nominal" value="<?= $detailPembayaran->nilai ?>">
                <?php 
            } else { ?>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                </div>
                <input type="number" class="form-control uang" name="nominal" min="500" value="<?=$detailPembayaran->nilai?>" id="nominal_pembayaran" required>
            </div>
                <?php 
            } ?>
            </div>

            <input type="hidden" name="uniqueid" value="<?= $qrid ?>">
            <input type="hidden" name="userid" value="<?= $data["id"] ?>">
            <input type="hidden" name="judul" value="<?= $detailPembayaran->judul ?>">

            <input type="submit" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff; float: center;"
 class="btn btn-lg" value="Bayar">
        </form>
    <?php
    } else {
    ?>

    <h1>Kode QR tidak ditemukan</h1>
 
    <?php 
        $satusState = false;
        include "../component/statusIcon.php";
    ?>

    <a href="scan.php" role="button" class="btn btn-primary btn-lg">Kembali ke halaman pemindai</a>

    <?php } ?>

    </div>
    
      <div class="bottom-menu">


                <div class="scan-tab">
                    <div class="inner">
                        <a href="scan.php">
                            <i class="fa fa-qrcode" style="color: #000;" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="row">

                            <a href="home.php" class="col-3 text-center my-2">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <p class="mb-0">Home</p>
                            </a>

                            <a href="kirim.php" class="col-3 text-center my-2">
                                <i class="fa fa-wallet" aria-hidden="true"></i>
                                <p class="mb-0">Transfer</p>
                            </a>

                            <a href="donasi.php" class="col-3 text-center my-2">
                                <i class="fa ti-hand-open" aria-hidden="true"></i>
                                <p class="mb-0">Donasi</p>
                            </a>

                            <a href="history.php" class="col-3 text-center my-2">
                                <i class="fa fa-exchange-alt" aria-hidden="true"></i>
                                <p class="mb-0">Riwayat Transaksi</p>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br><br><br><br><br>

    <?php include "../component/user/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
  
</body>
</html> 