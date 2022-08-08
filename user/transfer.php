<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>Transfer Saldo</title>

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
    $teleponuser = $_GET["teleponuser"];
    $detailTransfer = true;
    $data_tujuan = $db->getUserByTELEPONUSER($teleponuser, PDO::FETCH_OBJ);

    $diri_sendiri = $teleponuser == $data["teleponuser"];
    
  

    // $detailTransfer = $db->transfer($data["teleponuser"], $teleponuser);

    if($data_tujuan && !$diri_sendiri) {
    ?>
    

<center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 3px; margin-top: 90px;">
                <i class="fas ti-share" aria-hidden="true"></i> Transfer Saldo</h2></center>


    <br><br><br>
        <h1 class="display-6 mb-0">Transfer saldo ke <?=explode(" ", $data_tujuan->nama)[0]?></h1>
        <p class="lead text-muted pt-0"><?= $teleponuser ?></p>

        <form action="../aksi/transfer_saldo.php" onsubmit="return isSaldo()" method="post" class="mt-3">
            <div class="form-group">
                <label for="nominal_transfer" style="font-size: 21px;">Nominal Transfer Saldo:</label><br>
              
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="color: #fff; background: #20346F; border-radius: 0px; border: 1px solid #464545;">Rp</span>
                    </div>
                    <input type="number" style="border-radius: 0px; border: 1px solid #464545;" class="form-control uang" name="nominal" value="0" id="nominal_transfer" required>
                </div>
           
            </div>

            <div class="form-group">
                        <label for="keterangan" style="font-size: 21px;">Keterangan:</label>
                        <input type="text" style="border-radius: 0px; border: 1px solid #464545;" class="form-control" name="keterangan" value="Untuk membeli" required>
                    </div>

            <input type="hidden" name="userid" value="<?= $data["id"] ?>">
            <input type="hidden" name="teleponuser" value="<?= $teleponuser ?>">
            <input type="hidden" name="metode" value="<?=isset($_GET["metode"]) ? $_GET["metode"] : "qrcode"?>">

            <input type="submit" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" class="btn btn-lg" onclick="return confirm('Apakah Anda yakin ingin melakukan transaksi ini?');" value="Transfer Saldo">
        </form>
        
    

    <?php
    } else {
    ?>
<br><br><br>
<i class="fas ti-close" aria-hidden="true" style="color: red; font-size: 100px;"></i>
    <h1>Gagal</h1>
    <span><?=$diri_sendiri ? "Tidak dapat mentransfer ke akun sendiri": ("No. telepon user tidak ditemukan")?></span>
    <br/>

    <?php 
        $satusState = false;
        $iconNo = "siswa-times";
        include "../component/statusIcon.php";
    ?>

    <button onclick="history.back()" role="button" class="btn btn-lg mt-2" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">Kembali</button>

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

<script>

function isSaldo() {
    var saldo= '<?=$data["saldo"]+1?>';
    var nominal = $('#nominal_transfer').val();
    if(nominal < 500){
        alert("nominal yang anda masukkan tidak mencapai nilai minimum.");
        return false;
    }else if(saldo < 500){
        alert("saldo anda tidak mencukupi");
        return false;
    }else if(nominal > saldo){
        alert("saldo anda tidak mencukupi")
        return false;
    }else{
        return true;
    }

}

</script>