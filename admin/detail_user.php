<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>

    <title>Detail User</title>

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

td, th {
  border: 1px solid #dddddd;
}

th{
  border: 1px solid #dddddd;
  text-align: center;
  background: #4B6ED4;
  color: #fff;
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
    $user = $db->getUserById($_GET["id"], PDO::FETCH_OBJ);
    ?>

    <div class="row">
        <div class="col-md-5"><br><br><br><br>
            <h1 style="font-size: 21px;"><i class="fas ti-user" style="background: #4B6ED4; color: #fff; padding: 7px;"></i> Nama User: <?= $user->nama ?></h1>

            <div class="my-4">
                <h3 style="font-size: 21px;"><i class="fas ti-bookmark" style="background: #4B6ED4; color: #fff; padding: 7px;"></i> Jumlah Saldo User:<?= rupiah($user->saldo) ?></h3>
            </div>

            <a href="user.php" class="btn" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;">
                        Kembali ke list user
                    </a>

                    <button type="button" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" class="btn" data-toggle="modal" data-target="#modalTransaksi">
                       Riwayat Transaksi User
                    </button>
                    <br><br>

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header pointer" style="background: #4B6ED4; color: #fff;" data-toggle="collapse" data-target="#collapseOne" id="headingOne">
                        <h5 class="mb-0">
                           <button class="btn" style="font-size: 23px; color: #fff;"
                             type="button">
                             <i class="fas ti-user" aria-hidden="true"></i>  Data User
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Nama:</th>
                                    <td><?= $user->nama ?></td>
                                </tr>
                                <tr>
                                    <th>No. Telepon:</th>
                                    <td><?= $user->teleponuser ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?= $user->email ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin:</th>
                                    <td><?= $user->jenis_kelamin ?></td>
                                </tr>
                                <tr>
                                    <th>Provinsi:</th>
                                    <td><?= "$user->provinsi" ?></td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan:</th>
                                    <td><?= "$user->pekerjaan" ?></td>
                                </tr>
                                <tr>
                                    <th>Kode Pos:</th>
                                    <td><?= "$user->kodepos" ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pointer" style="background: #4B6ED4; color: #fff;" data-toggle="collapse" data-target="#collapseTwo" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn collapsed" style="font-size: 23px; color: #fff;" type="button">
                            <i class="fas ti-pencil" aria-hidden="true"></i> Edit Data User
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="../aksi/edit_user.php" method="post">
                                  <div class="row">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label for="nama_user">Nama User:</label>
                                            <input type="text" style="border-radius: 0px; border: 1px solid #464545;" value="<?= $user->nama ?>" class="form-control" name="nama" id="nama_user" placeholder="Hafizh Beckham" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin:</label>
                                            <select class="form-control" style="border-radius: 0px; border: 1px solid #464545;" id="kelamin" name="jenis_kelamin" required>
                                                <option value="laki-laki" <?= $user->jenis_kelamin == "laki-laki" ? "selected" : "" ?>>Laki-Laki</option>
                                                <option value="perempuan" <?= $user->jenis_kelamin == "perempuan" ? "selected" : "" ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email_user">Email:</label>
                                            <input type="email" style="border-radius: 0px; border: 1px solid #464545;" value="<?= $user->email ?>" class="form-control" name="email" id="email_user" placeholder="hafizh@beckham.me" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="provinsi">Provinsi:</label>
                                            <select class="form-control" style="border-radius: 0px; border: 1px solid #464545;" id="provinsi" name="provinsi" required>
                            <option value="Aceh" <?= $user->provinsi == "Aceh" ? "selected" : "" ?>>Aceh</option>
                            <option value="Sumatera Utara" <?= $user->provinsi == "Sumatera Utara" ? "selected" : "" ?>>Sumatera Utara</option>
                            <option value="Sumatera Barat" <?= $user->provinsi == "Sumatera Barat" ? "selected" : "" ?>>Sumatera Barat</option>
                            <option value="Riau" <?= $user->provinsi == "Riau" ? "selected" : "" ?>>Riau</option>
                            <option value="Kepulauan Riau" <?= $user->provinsi == "Kepulauan Riau" ? "selected" : "" ?>>Kepulauan Riau</option>
                            <option value="Jambi" <?= $user->provinsi == "Jambi" ? "selected" : "" ?>>Jambi</option>
                            <option value="Sumatera Selatan" <?= $user->provinsi == "Sumatera Selatan" ? "selected" : "" ?>>Sumatera Selatan</option>
                            <option value="Kepulauan Bangka Belitung" <?= $user->provinsi == "Kepulauan Bangka Belitung" ? "selected" : "" ?>>Kepulauan Bangka Belitung</option>
                            <option value="Bengkulu" <?= $user->provinsi == "Bengkulu" ? "selected" : "" ?>>Bengkulu</option>
                            <option value="Lampung" <?= $user->provinsi == "Lampung" ? "selected" : "" ?>>Lampung</option>
                            <option value="DKI Jakarta" <?= $user->provinsi == "DKI Jakarta" ? "selected" : "" ?>>DKI Jakarta</option>
                            <option value="Banten" <?= $user->provinsi == "Banten" ? "selected" : "" ?>>Banten</option>
                            <option value="Jawa Barat" <?= $user->provinsi == "Jawa Barat" ? "selected" : "" ?>>Jawa Barat</option>
                            <option value="Jawa Tengah" <?= $user->provinsi == "Jawa Tengah" ? "selected" : "" ?>>Jawa Tengah</option>
                            <option value="DI Yogyakarta" <?= $user->provinsi == "DI Yogyakarta" ? "selected" : "" ?>>DI Yogyakarta</option>
                            <option value="Jawa Timur" <?= $user->provinsi == "Jawa Timur" ? "selected" : "" ?>>Jawa Timur</option>
                            <option value="Bali" <?= $user->provinsi == "Bali" ? "selected" : "" ?>>Bali</option>
                            <option value="Nusa Tenggara Barat" <?= $user->provinsi == "Nusa Tenggara Barat" ? "selected" : "" ?>>Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur" <?= $user->provinsi == "Nusa Tenggara Timur" ? "selected" : "" ?>>Nusa Tenggara Timur</option>
                            <option value="Kalimantan Barat" <?= $user->provinsi == "Kalimantan Barat" ? "selected" : "" ?>>Kalimantan Barat</option>
                            <option value="Kalimantan Tengah" <?= $user->provinsi == "Kalimantan Tengah" ? "selected" : "" ?>>Kalimantan Tengah</option>
                            <option value="Kalimantan Selatan" <?= $user->provinsi == "Kalimantan Selatan" ? "selected" : "" ?>>Kalimantan Selatan</option>
                            <option value="Kalimantan Timur" <?= $user->provinsi == "Kalimantan Timur" ? "selected" : "" ?>>Kalimantan Timur</option>
                            <option value="Kalimantan Utara" <?= $user->provinsi == "Kalimantan Utara" ? "selected" : "" ?>>Kalimantan Utara</option>
                            <option value="Sulawesi Utara" <?= $user->provinsi == "Sulawesi Utara" ? "selected" : "" ?>>Sulawesi Utara</option>
                            <option value="Gorontalo" <?= $user->provinsi == "Gorontalo" ? "selected" : "" ?>>Gorontalo</option>
                            <option value="Sulawesi Tengah" <?= $user->provinsi == "Sulawesi Tengah" ? "selected" : "" ?>>Sulawesi Tengah</option>
                            <option value="Sulawesi Barat" <?= $user->provinsi == "Sulawesi Barat" ? "selected" : "" ?>>Sulawesi Barat</option>
                            <option value="Sulawesi Selatan" <?= $user->provinsi == "Sulawesi Selatan" ? "selected" : "" ?>>Sulawesi Selatan</option>
                            <option value="Sulawesi Tenggara" <?= $user->provinsi == "Sulawesi Tenggara" ? "selected" : "" ?>>Sulawesi Tenggara</option>
                            <option value="Maluku" <?= $user->provinsi == "Maluku" ? "selected" : "" ?>>Maluku </option>
                            <option value="Maluku Utara" <?= $user->provinsi == "Maluku Utara" ? "selected" : "" ?>>Maluku Utara</option>
                            <option value="Papua Barat" <?= $user->provinsi == "Papua Barat" ? "selected" : "" ?>>Papua Barat</option>
                            <option value="Papua" <?= $user->provinsi == "Papua" ? "selected" : "" ?>>Papua</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="kodepos_user">Kode Pos:</label>
                                            <input type="text" style="border-radius: 0px; border: 1px solid #464545;" value="<?= $user->kodepos ?>" class="form-control" name="kodepos" id="kodepos_user" placeholder="A/B/C" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="pekerjaan_user">Pekerjaan:</label>
                                            <input type="text" style="border-radius: 0px; border: 1px solid #464545;" value="<?= $user->pekerjaan ?>" class="form-control" name="pekerjaan" id="pekerjaan_user" placeholder="RPL" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="teleponuser_user">No. Telepon:</label>
                                            <input type="text" style="border-radius: 0px; border: 1px solid #464545;" value="<?= $user->teleponuser ?>" class="form-control" name="teleponuser" id="teleponuser_user" placeholder="1234567890" required>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="idpengelola" value="<?= $data["id_pengelola"] ?>">
                                <input type="hidden" name="id" value="<?= $user->id ?>">
                                <input type="hidden" name="adminid" value="<?= $data["id"] ?>">

                              <center>  <input type="submit" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" class="btn" value="Update">
</center>   </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card my-3" id="card-wrapper">
                <div class="card-body">
                    

                   

                    <!-- Modal -->

                    <div class="modal fade" id="modalTransaksi" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 5px;" id="exampleModalLabel">
                                    <i class="fas ti-share-alt" aria-hidden="true"></i> Riwayat Transaksi User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <?php
                                        $trx = $db->getUserTransactionHistory($user->id, PDO::FETCH_OBJ);

                                        if ($trx) {
                                            ?>

                                            <div class="table-responsive">
                                                <table id="paymentHistoryTable" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Tanggal</th>
                                                            <th>Jenis</th>
                                                            <th>Debit</th>
                                                            <th>Kredit</th>
                                                            <th>Tipe</th>
                                                            <th>Metode</th>
                                                            <th>Deskripsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($trx as $val) {
                                                            ?>

                                                            <tr>
                                                                <td><?= $val->id ?></td>
                                                                <td><?= $val->tanggal ?></td>
                                                                <td><?= ucwords($val->jenistransaksi) ?></td>
                                                                <td data-sort="<?= $val->debit ?>"><?= rupiah($val->debit) ?></td>
                                                                <td data-sort="<?= $val->kredit ?>"><?= rupiah($val->kredit) ?></td>
                                                                <td><?= $val->tipe ?></td>
                                                                <td><?= $val->metode ?></td>
                                                                <td><?= ucwords($val->deskripsi) ?></td>
                                                            </tr>

                                                        <?php
                                                    }
                                                    ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                        <?php
                                    } else {
                                        echo "<p class='card-text'>Belum melakukan transaksi</p>";
                                    }
                                    ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" class="btn" onclick="printHistory()">Cetak Riwayat Transaksi</button>
                                    <button type="button" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" class="btn" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7"><br><br><br><br>
            <div class="card p-4 my-3" id="setor_tunai">
            <center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 3px;">
                <i class="fas ti-wallet" aria-hidden="true"></i> Top Up Saldo</h2></center>


                <form action="../aksi/setor_tunai_user.php" method="post">
                    <div class="form-group">
                        <label for="jumlah_penyetoran">Jumlah Top Up:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background: #20346F; color: #fff; border-radius: 0px; border: 1px solid #464545;">Rp</span>
                            </div>
                            <input type="number" style="border-radius: 0px; border: 1px solid #464545;" class="form-control uang" name="nominal_setor" id="jumlah_penyetoran" min="1000" value="1000" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan_penyetoran">Keterangan:</label>
                        <input type="text" style="border-radius: 0px; border: 1px solid #464545;" class="form-control" name="keterangan" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_penyetoran">Detail:</label>
                        <input type="text" style="border-radius: 0px; border: 1px solid #464545;" class="form-control" name="deskripsi" value="Setor Tunai" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password Admin:</label>
                        <input type="password" style="border-radius: 0px; border: 1px solid #464545;" class="form-control" name="password" required>
                    </div>

                    <input type="hidden" name="userid" value="<?= $user->id ?>">
                    <input type="hidden" name="adminid" value="<?= $data["id"] ?>">

                 <center>   <input type="submit" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" class="btn" onclick="return confirm('Yakin melakukan top up ini?');" value="Top Up">
                    </center> </form>
            </div>

            <div class="card p-4 my-3" id="tarik_tunai">
            <center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 3px;">
                <i class="fas ti-share-alt" aria-hidden="true"></i> Tarik Saldo</h2></center>


                <form action="../aksi/tarik_tunai_user.php" method="post">

                    <div class="form-group">
                        <label for="jumlah_penarikan">Jumlah Penarikan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" style="background: #20346F; color: #fff; border-radius: 0px; border: 1px solid #464545;">Rp</span>
                            </div>
                            <input type="number" style="border-radius: 0px; border: 1px solid #464545;" class="form-control uang" name="nominal_tarik" id="jumlah_penarikan" min="1" max="<?= $user->saldo ?>" value="5000" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan_penyetoran">Keterangan:</label>
                        <input type="text" style="border-radius: 0px; border: 1px solid #464545;" class="form-control" name="keterangan" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_penyetoran">Detail:</label>
                        <input type="text" style="border-radius: 0px; border: 1px solid #464545;" class="form-control" name="deskripsi" value="Tarik Tunai" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password Admin:</label>
                        <input type="password" style="border-radius: 0px; border: 1px solid #464545;" class="form-control" name="password" required>
                    </div>

                    <input type="hidden" name="userid" value="<?= $user->id ?>">
                    <input type="hidden" name="adminid" value="<?= $data["id"] ?>">

                    <center>  <input type="submit" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;" class="btn" onclick="return confirm('Yakin melakukan penarikan tunai saldo ini?');" value="Tarik Saldo">
                     </center>  </form>
            </div>
        </div>
    </div>


    <?php include "../component/admin/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
    <?php $noback = true;
    require "../component/scrollTop.php" ?>

    <script>
        <?php if (isset($_GET["ssc"])) { ?>
            $(window).on('load', function() {
                $('#sccModal').modal('show');
            });
        <?php } ?>

        $(document).ready(function() {
            $('#paymentHistoryTable').DataTable({
                "order": [
                    [1, "desc"]
                ]
            });
        });

        function printHistory() {
            var centeredText = function(text, y) {
                var textWidth = pdf.getStringUnitWidth(text) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
                var textOffset = (pdf.internal.pageSize.width - textWidth) / 2;
                pdf.text(textOffset, y, text);
            }

            var pdf = new jsPDF('p', 'pt', 'letter');

            pdf.setFontType("normal");

            centeredText("Riwayat Transaksi: <?= "{$user->nama} - {$user->provinsi} {$user->pekerjaan} {$user->kodepos}" ?>", 30);

            pdf.autoTable({
                html: "#paymentHistoryTable"
            });

            pdf.save('history-<?= $user->nama ?>.pdf');
        }
    </script>
</body>

</html>