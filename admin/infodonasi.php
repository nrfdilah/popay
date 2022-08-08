<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <?php include "../process/getAdminLoginData.php" ?>

    <?php
    $donasiid = $_GET['id_donasi'];

    $res = $db->getDonasi($donasiid, PDO::FETCH_OBJ);
    ?>

    <style>
        body{
    background: #D8D8D8;
}
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
.btn-primary{

 border-radius: 0px; 
 border: 1px #4B6ED4; 
 background: #4B6ED4; 
 color: #fff;
}


    </style>

    <title><?= ucwords($res->judul) ?></title>
</head>

<body>
    <?php include "../component/admin/sidebaropen.php" ?>
<br><br><br>
    <?php
    if (!$res) {
        echo "<h1>Tidak dapat menemukan donasi. Donasi sudah tidak tersedia.</h1>
        <a href='donasi.php' role='button' class='btn btn-primary btn-lg mt-3'>Kembali ke halaman list donasi</a>";
    } else { // else open

        $percentage = number_format(($res->terkumpul / $res->target_donasi) * 100, 2, '.', '')
        ?>

    <div class="row">
        <div class="col-sm-7">
            <div class="card"><br><br>
                <div class="card-body">
                    <h1 class="card-title" style="font-size: 27px; text-decoration: underline;"><i class="fas ti-hand-open" style="background: #4B6ED4; 
                    color: #fff; padding: 5px;"></i> Donasi:
                    <?= ucwords($res->judul) ?></h1>
                    <p class="card-text" style="font-size: 21px;"> <i class="fas ti-pencil-alt" style="font-size: 27px;"></i> Detail donasi:
                    <?= $res->deskripsi ?></p>
                    <a href="donasi.php" role="button" class="btn" style="border-radius: 30px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">Kembali ke List Donasi</a>
                </div>
            </div>

            <div class="card mt-3 mb-3">
                <div class="card-body mt-2">
                    <h3 class="card-title" style="font-size: 19px;">Saat ini telah terkumpul <?= rupiah($res->terkumpul) ?> dari target <?= rupiah($res->target_donasi) ?></h3>

                    <div class="progress mb-3" style="height: 25px; border-radius: 0px; background: #B9C8F3;">
                        <div class="progress-bar" role="progressbar" style="font-size: 15px; color: #838181; width: <?= $percentage ?>%;"><?= $percentage ?>%</div>
                    </div>
                </div>
            </div>

            <div class="card p-4 mt-3" id="tarik_tunai">
                <h3 style="background: #4B6ED4; color: #fff; padding: 5px; border-radius: 30px;"><i class="fas ti-share-alt" style="
                    color: #fff;"></i> Pencairan Dana Donasi</h3>

                <form action="../aksi/pencairan_donasi.php" method="post">

                    <div class="form-group">
                        <label for="jumlah_penarikan">Jumlah Pencairan Dana:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background: #4B6ED4; color: #fff; border-radius: 0px; border: 1px solid #000;">Rp</span>
                            </div>
                            <input type="number" style="border-radius: 0px; border: 1px solid #000;" class="form-control uang" name="nominal" id="jumlah_penarikan" min="1" max="<?= $res->terkumpul ?>" value="<?= $res->terkumpul ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password Admin:</label>
                        <input type="password" style="border-radius: 0px; border: 1px solid #000;" class="form-control" name="password" required>
                    </div>

                    <input type="hidden" name="iddonasi" value="<?= $res->id ?>">
                    <input type="hidden" name="adminid" value="<?= $data["id"] ?>">

                    <input type="submit" class="btn" style="border-radius: 30px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" value="Tarik Dana Donasi">
                </form>
            </div>

        </div>

        <div class="col-sm-5 mb-3">
            <div class="card h-100" id="card-wrapper">
                <div class="card-body"><br><br><br>
                    <h3 class="card-title" style="text-decoration: underline; margin-top: -70px;"><i class="fas ti-user" style="background: #4B6ED4; 
                    color: #fff; padding: 5px;"></i>List Donatur</h3>

                    <?php 
                    $donatur = $db->getDonatur($_GET['id_donasi'], PDO::FETCH_OBJ);

                    if ($donatur) {
                        ?>

                    <div class="table-wrapper-scroll-y table-scroll-v">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <th>Kode Pos</th>
                                <th>Jumlah Donasi</th>
                            </tr>

                            <?php
                            foreach ($donatur as $d) {
                                ?>

                            <tr>
                                <td><?= $d->private ? "-" : $d->nama ?></td>
                                <td><?= $d->private ? "-" : "$d->provinsi, $d->pekerjaan, $d->kodepos" ?></td>
                                <td data-sort="<?=$d->jumlah?>"><?= rupiah($d->jumlah) ?></td>
                            </tr>

                            <?php

                        }
                        ?>
                        </table>
                    </div>

                    <?php

                } else {
                    echo "<p class='card-text'>Belum ada donatur untuk saat ini, jadilah donatur yang pertama!</p>";
                }
                ?>

                </div>
            </div>
        </div>

        <!-- Else CLose -->
        <?php 
    } ?>
    </div>
    </div>

    <?php include "../component/admin/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
    <?php $noback = true; require "../component/scrollTop.php" ?>

    <?php if ($res) { ?>
    <script>
        $(".table-scroll-v").height($("#card-wrapper").height() - <?= $isadmin ? 0 : 200 ?> + "px");
    </script>
    <?php 
} ?>
</body>

</html> 