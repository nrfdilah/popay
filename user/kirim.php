<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>Transfer Saldo</title>

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
</style>
</head>

<body>
    <?php include "../process/getLoginData.php" ?>
    <?php include "../component/user/sidebaropen.php" ?>
<br><br><br>
  
<center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; border-radius: 30px; color: #fff; font-size: 25px; padding: 3px;">
                <i class="fas ti-share" aria-hidden="true"></i> Transfer Saldo Anda</h2></center>
<br>
<div class="card">
        <div class="card-body">
        <img src="../assets/icon-128.png" style="border-radius: 20px; width: 90px; height: 90px; float: left; margin-right: 10px;"  alt=""> 
               <div style="font-size: 18px;"> 
               <i class="fas fa-phone "  style="font-size: 18px; 
            background: #4B6ED4; padding: 7px; color: #fff;" aria-hidden="true"></i> Nomor Telepon Anda:  <a class="text-dark"><?=$data["teleponuser"]?></a>
</div>
<br>
    <h5 class="card-title">  <i class="fas ti-bookmark" style="font-size: 15px; 
            background: #4B6ED4; padding: 7px; color: #fff;"></i> Total Saldo Anda:  
    <p class="card-text" style="font-size: 18px;"  id="saldo"><?= rupiah($data["saldo"]) ?></p></h5>

    <br><br>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <div class="card"  style="background-color: #4B6ED4; color: #fff;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-qrcode" aria-hidden="true"></i> Kode QR</h5>
                    <p class="card-text">Transer saldo kini lebih mudah melalui Kode QR</p>

                    <a href="qr.php" class="btn" style="border-radius: 0px; background: #fff;
                            color: #000; border: 1px solid #fff;">Kode QRmu</a>
                    <a href="scan.php" class="btn" style="border-radius: 0px; background: #fff;
                            color: #000; border: 1px solid #fff;">Buka Pemindai</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
        <div class="card"  style="background-color: #294365; color: #fff;">
                <div class="card-body">
                <h5 class="card-title"><i class="fas fa-phone" aria-hidden="true"></i> Transfer Melalui No. Telepon</h5>
            <form action="transfer.php" method="get">
                <div class="form-group">
                    <label for="teleponuser_transfer">No. Telepon Tujuan:</label>
                    <input type="number" style="border-radius: 0px; border: 1px solid #000;" class="form-control" name="teleponuser" min="0" max="99999999999" value="" required>
                </div>

                <input type="hidden" name="metode" value="manual"/>

                <input type="submit" class="btn" style="border-radius: 0px; background: #fff;
                            color: #000; border: 1px solid #fff;" value="OK">
            </form>
        </div> </div> </div>

    </div>
</div></div>


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
        <br><br><br>

    <?php include "../component/user/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
  
</body>

</html>