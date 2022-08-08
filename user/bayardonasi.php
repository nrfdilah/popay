<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <?php include "../process/getLoginData.php" ?>

    <?php
    $donasiid = $_GET['id_donasi'];

    $res = $db->getDonasi($donasiid, PDO::FETCH_OBJ);
    ?>

    <style>
        .table-scroll-v {
            position: relative;
            overflow: auto;
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        .right-left div:nth-child(1) {
            float: left;
            margin-left: 0;
        }
        td, th {
  border: 1px solid #dddddd;
}

th{
  border: 1px solid #dddddd;
  background: #4B6ED4;
  color: #fff;
  font-size: 17px;
  text-align: center;
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

<br><br><br>
    <title><?= ucwords($res->judul) ?></title>
</head>

<body>
    <?php include "../component/user/sidebaropen.php" ?>

    <?php
    if (!$res) {
        echo "<h1>Tidak dapat menemukan donasi 404</h1>
        <a href='donasi.php' role='button' class='btn btn-primary btn-lg mt-3'>Kembali ke halaman list donasi</a>";
    } else { // else open

        $mindonasi = $data["saldo"] >= 1000 ? 1000 : ($data["saldo"] < 0 ? 0 : $data["saldo"]);
        $maxdonasi = $data["saldo"] > 0 ? $data["saldo"] : 0;
        $percentage = number_format(($res->terkumpul / $res->target_donasi) * 100, 2, '.', '')
        ?>

    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title"  style="font-size: 27px; text-decoration: underline;"><i class="fas ti-hand-open" style="background: #4B6ED4; 
                    color: #fff; padding: 5px;"></i> Donasi: <?= ucwords($res->judul) ?></h1>
                    <p class="card-text" style="font-size: 21px;">  <i class="fas ti-pencil-alt" style="font-size: 27px;"></i> Detail donasi: <?= $res->deskripsi ?></p>
                </div>
            </div>

            <div class="card mt-3 mb-3">
                <div class="card-body mt-2">
                    <!-- <h1 class="display-4">Terkumpul <?= rupiah($res->terkumpul) ?></h1> -->

                    <h4 class="card-title">Saat ini telah terkumpul <?= rupiah($res->terkumpul) ?> dari target <?= rupiah($res->target_donasi) ?></h4>

                    <div class="progress mb-3" style="height: 25px; border-radius: 0px; background: #B9C8F3;">
                        <div class="progress-bar" role="progressbar" style="font-size: 15px; color: #000; width: <?= $percentage ?>%;"><?= $percentage ?>%</div>
                    </div>

                    <p class="lead">Mari segera berdonasi!</p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title"><i class="fas ti-hand-open" style="background: #4B6ED4; 
                    color: #fff; padding: 5px;"></i> Mari berdonasi</h3>

                    <form action="../aksi/bayar_donasi.php" method="post" class="mt-3" id="donasi-form">
                        <div class="form-group">
                            <label for="jumlah_donasi">Mari sisihkan sedikit rejeki Anda bagi mereka yang membutuhkan (<?= rupiah($mindonasi) ?> - <?= rupiah($maxdonasi) ?>)<br>
                                <span class="font-weight-bold" id="jmess"></span>
                            </label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="border-radius: 0px; color: #fff; background: #20346F; border: 1px solid #20346F;">Rp</span>
                                </div>
                                <input type="number" style="border-radius: 0px; border: 1px solid #000;" class="form-control uang" name="jumlah_donasi" id="jumlah_donasi" step="100" value="<?= $mindonasi ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="private">Opsi:</label>
                            <select class="form-control" style="border-radius: 0px; border: 1px solid #000;" name="private" id="private">
                                <option value="0">Tampilkan data diri pada list donatur</option>
                                <option vakue="1">Sembunyikan data diri dari list donatur</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                        <label for="keterangan_penyetoran">Keterangan:</label>
                        <input type="text" style="border-radius: 0px; border: 1px solid #464545;" class="form-control" name="keterangan" value="" required>
                    </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" style="border-radius: 0px; border: 1px solid #000;" class="form-control" name="password" id="password" required>
                        </div>

                        <input type="hidden" name="donasiid" value="<?= $donasiid ?>">
                        <input type="hidden" name="donasiname" value="<?= ucwords($res->judul) ?>">
                        <input type="hidden" name="userid" value="<?= $data["id"] ?>">

                        <div class="right-left">
                            <div>
                                <a href="donasi.php" role="button" class="btn" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">Kembali ke list donasi</a>
                            </div>

                            <div>
                                <input type="submit" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" class="btn" value="Submit Donasi">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-sm-5 mb-3">
            <div class="card h-100" id="card-wrapper">
                <div class="card-body">
                    <h3 class="card-title" style="text-decoration: underline;"><i class="fas ti-user" style="background: #4B6ED4; 
                    color: #fff; padding: 5px;"></i> List Donatur</h3>

                    <?php 
                    $donatur = $db->getDonatur($_GET['id_donasi'], PDO::FETCH_OBJ);

                    if ($donatur) {
                        ?>

                    <div class="table-wrapper-scroll-y table-scroll-v">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <th>Data</th>
                                <th>Jumlah Donasi</th>
                            </tr>

                            <?php
                            foreach ($donatur as $d) {
                                ?>

                            <tr>
                                <td><?= $d->private ? "-" : $d->nama ?></td>
                                <td><?= $d->private ? "-" : "$d->provinsi, $d->pekerjaan, $d->kodepos" ?></td>
                                <td><?= rupiah($d->jumlah) ?></td>
                            </tr>

                            <?php

                        }
                        ?>
                        </table>
                    </div>

                    <?php

                } else {
                    echo "<p class='card-text'>Belum ada donatur untuk saat ini, jadilah yang pertama!</p>";
                }
                ?>

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
        <br><br><br>
        <!-- Else CLose -->
        <?php 
    } ?>
    </div>
    </div>

    <?php include "../component/user/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
  

    <?php if ($res) { ?>
    <script>
        $('#donasi-form').submit(function() {
            const jumlahdonasi = $("#jumlah_donasi");
            const jd = Number(jumlahdonasi.val())

            if (jd < <?= $mindonasi ?> || jd > <?= $maxdonasi ?>) {
                $("#jmess").text(`Maaf, jumlah dana donasi terlalu ${jd < <?= $mindonasi ?> ? "kecil" : "besar"}`);
                jumlahdonasi.focus();
                return false;
            }

            return true;
        });

        $(".table-scroll-v").height($("#card-wrapper").height() - 200 + "px");
    </script>
    <?php 
} ?>
</body>

</html> 