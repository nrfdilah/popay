<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>Buka Donasi</title>

    <style>
body{
    background: #D8D8D8;
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
<br><br><br>
<div class="card" style="padding: 30px;">
    <div class="row">
        <div class="col-sm-4">
        <center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 5px; border-radius: 20px;">
                <i class="fas ti-hand-open" aria-hidden="true"></i> Buka Donasi Baru</h2></center>

            <form action="../aksi/donasi_baru.php" method="post">

                <div class="form-group">
                    <label for="judul">Judul Donasi:</label>
                    <input type="text" style="border-radius: 0px; border: 1px solid #000;" class="form-control" name="judul" id="judul" placeholder="Tujuan Donasi" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <textarea class="form-control" style="border-radius: 0px; border: 1px solid #000;" name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="target">Target Dana:</label>
                    <input type="number" style="border-radius: 0px; border: 1px solid #000;" class="form-control uang" name="target" id="target" placeholder="Target Donasi" required>
                </div>

                <input type="hidden" name="idposter" value="<?= $data["id"] ?>">

                <input type="submit" style="border-radius: 10px; background: #4B6ED4; border: 1px solid #4B6ED4;" class="btn btn-primary" value="Buka Donasi">
            </form>
        </div>

        <div class="col-sm-8">
        <center>  <h2 class="font-weight-light" style="border-radius: 30px; background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 5px;">
                <i class="fas ti-hand-open" aria-hidden="true"></i> Donasi Yang Dibuka</h2></center>
            <?php include "../component/daftardonasi.php" ?>
        </div>
    </div>

    <?php include "../component/admin/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
   

    <script>
        <?php if (isset($_GET["ssc"])) { ?>
            $(window).on('load', function() {
                $('#sccModal').modal('show');
            });
        <?php } ?>
    </script>
</body>

</html> 