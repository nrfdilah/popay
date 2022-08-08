<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>Donasi</title>

<style>
    body{
    background: #D8D8D8;
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
  
<div class="card">
<center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 3px; margin-left: -1px;">
                <i class="fas ti-hand-open" aria-hidden="true"></i> Berikan Donasi Anda</h2></center>
               
</div>

<?php include "../component/daftardonasi.php" ?>

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


    <?php include "../component/user/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
   
</body>

</html> 