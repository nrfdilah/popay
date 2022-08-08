<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>Home</title>
    <link href="https://popay.my.id/themify-icons.css" rel="stylesheet">

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

body{
    background: #D8D8D8;
}
</style>
</head>

<body>
    <?php include "../process/getLoginData.php" ?>

    <?php include "../component/user/sidebaropen.php" ?>

    <?php
    $saldo = (int)$data["saldo"];
    ?>

    <!-- Content  -->
    <!-- <div class="jumbotron text-center bg-<?= $saldo >= 100000 ? 'success' : ($saldo >= 50000 ? 'warning' : 'danger') ?> text-white">
        <h3>Saldo Total</h3>
        <p class="display-4"><?= $saldo ?></p>
    </div> -->

    <div class="card">
        <div class="card-header" style="background: #4B6ED4; color: #fff;"><br><br><br>
         <div style="font-size: 25px;">   Selamat datang, <?= explode(' ', $data["nama"])[0] ?>.</div>
        </div>
        <div class="card-body">
            <h5 class="card-title">  <i class="fas ti-bookmark" style="font-size: 18px; 
            background: #4B6ED4; padding: 7px; color: #fff;"></i> Total Saldo Anda:</h5>
            <p class="card-text" id="saldo"><?= rupiah($saldo) ?></p>
        </div>
    </div>

    <div style="background-color: #0B0B61; border-radius: 5px; border: 2px solid #0B0B61; padding: 5px; color: #fff;">
<marquee scrollamount="7" onmouseover="this.stop()" onmouseout="this.start()" width="100%">Selamat datang - Pastikan selalu keamanan data Anda kapan pun dan di mana pun - Jangan serahkan data Anda ke orang lain - Pastikan data Anda aman dan terlindungi.</marquee>
</div>

    <br>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">  <i class="fas ti-share" style="font-size: 18px; 
            background: #4B6ED4; padding: 7px; color: #fff;"></i> Pembayaran:</h5>
            <div class="row">
                <div class="col-sm-4 mt-2">
                    <div class="card" style="background-color: #4B6ED4; color: #fff;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-qrcode" aria-hidden="true"></i> Kode QR</h5>
                            <p class="card-text">Bayar di kantin atau transfer saldo dengan Kode QR yang tersedia</p>
                            <a href="scan.php" class="btn" style="border-radius: 0px; background: #fff;
                            color: #000; border: 1px solid #fff;">Buka Pemindai</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mt-2">
                    <div class="card" style="background-color: #294365; color: #fff;">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas ti-hand-open"></i> Donasi</h5>
                            <p class="card-text">Donasikan sedikit uang sakumu untuk yang membutuhkan</p>
                            <a href="donasi.php" class="btn" style="border-radius: 0px; background: #fff;
                            color: #000; border: 1px solid #fff;">Donasi!</a>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <br />

    
    <br />

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><i class="fas ti-reload" style="font-size: 18px; 
            background: #4B6ED4; padding: 7px; color: #fff;"></i> Riwayat Transaksi</h5>
<div style="overflow: scroll; height: 300px;">
            <?php include "../component/user/riwayat.php" ?>
</div>
        </div>
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
    <!-- Content End -->

    <?php include "../component/user/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
   

    <script>
         $(document).ready(function() {
            $('#paymentHistoryTable').DataTable({
                "order": [
                    [1, "desc"]
                ]
            });

            
            $('#list-tagihan').on('show.bs.collapse', function(e) {
                $('#tagihan-help').hide();
            });

            $('#list-tagihan').on('hide.bs.collapse', function(e) {
                setTimeout(() => $('#tagihan-help').fadeIn('slow'), 100);
            });
        });
    </script>
</body>

</html> 