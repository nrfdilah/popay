<style>
    body{
    background: #D8D8D8;
}
td, th {
  border: 1px solid #dddddd;
}

th{
  border: 1px solid #dddddd;
  background: #4B6ED4;
  color: #fff;
  font-size: 17px;
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

<?php
$isadmin = isset($_SESSION['adminid']);
$res = $db->getAllDonasi($data["id_pengelola"], PDO::FETCH_OBJ);

if ($res) {
    echo '<div class="row">';

    foreach ($res as $r) {

        $percentage = number_format(($r->terkumpul / $r->target_donasi) * 100, 2, '.', '');

        ?>
<div class="card">
        <div class='col-lg-6 col-md-12 mt-3 mb-3'>
           
                <?php if ($r->status == "close") { ?>
                    <div class='card-overlay'>
                        <div>
                            <h3 class="text-white">Donasi telah Ditutup</h3>

                            <?php if ($isadmin) { ?>
                                <a href='infodonasi.php?id_donasi=<?= $r->id ?>' class='btn btn-primary m-1'>Detail</a>

                                <form action="../aksi/status_donasi.php" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $r->id ?>">
                                    <input type="hidden" name="adminid" value=<?= $data["id"] ?>>
                                    <input type="hidden" name="status" value="open">

                                    <input type="submit" class="btn btn-primary m-1" value="Buka Kembali Donasi">
                                </form>

                                <form action="../aksi/hapus_donasi.php" method="POST" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $r->id ?>">
                                    <input type="hidden" name="adminid" value=<?= $data["id"] ?>>

                                    <input type="submit" class="btn btn-danger m-1" value="Hapus Donasi">
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <div class='card-body' style="width: 300px;">
                    <h3 class='card-title' style="font-size: 27px; text-decoration: underline;"><i class="fas ti-hand-open" style="background: #4B6ED4; 
                    color: #fff; padding: 5px;"></i> Donasi Terbuka: <?= $r->judul ?></h3>
                    <p class='card-text'  style="font-size: 21px;">
                     <i class="fas ti-pencil-alt" style="font-size: 27px;"></i> Detail donasi: <?= substr($r->deskripsi, 0, 150) ?>...</p>

                    <div class="table-responsive mb-1">
                        <table class='table'>
                            <tr>
                                <th>Saat ini terkumpul:</th>
                                <th class="text-right">Target dana donasi:</th>
                            </tr>
                            <tr>
                                <td><?= rupiah($r->terkumpul) ?></td>
                                <td class="text-right"><?= rupiah($r->target_donasi) ?></td>
                            </tr>
                        </table>

                        <div class="progress mb-3" style="height: 25px; border-radius: 0px; background: #B9C8F3;">
              <div class="progress-bar" role="progressbar" style="font-size: 15px; color: #000; width: <?= $percentage ?>%;"><?= $percentage ?>%</div>
                        </div>
                    </div>

                    <?php if ($r->status == "open") { ?>

                        <a href='<?= $isadmin ? "infodonasi" : "bayardonasi" ?>.php?id_donasi=<?= $r->id ?>' class='btn m-1' style="border-radius: 0px; background: #4B6ED4;
                        border: 1px solid #4B6ED4; color: #fff; border-radius: 30px;">Lihat detail donasi</a>
            

                        <?php if ($isadmin) { ?>
                            <form action="../aksi/status_donasi.php" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $r->id ?>">
                                <input type="hidden" name="adminid" value=<?= $data["id"] ?>>
                                <input type="hidden" name="status" value="close">

                                <input type="submit" class="btn m-1" style="background: #7BD1A0; border-radius: 30px;
                                color: #fff;" value="Tutup Donasi">
                            </form>

                            <form action="../aksi/hapus_donasi.php" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $r->id ?>">
                                <input type="hidden" name="adminid" value=<?= $data["id"] ?>>

                                <input type="submit" class="btn m-1" style="background: #C16350; border-radius: 30px;
                                color: #fff;" value="Hapus Donasi">
                            </form> <div style="font-size: 21px;">
                        <?php }
                }

                echo "</div></div></div></div>";
            }
        } else {
            echo "<p class='card-text' style='font-size: 19px; text-align: center;'>Tidak ada donasi yang tersedia saat ini.</p>";
        }
        ?>
        </div>
      
        <br><br><br><br><br><br>