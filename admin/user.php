<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>Manajemen User</title>

    <style>
        body{
    background: #D8D8D8;
}
.btn{
    border-radius: 0px;
    background: #4B6ED4;
    border: 1px solid #4B6ED4;
    color: #fff;
   
}
.btn:hover{
    background: #4B6ED4;
    border: 1px solid #4B6ED4;
    color: #fff;
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

td, th {
  border: 1px solid #dddddd;
}

th{
  border: 1px solid #dddddd;
  text-align: center;
}

.pagination{
    display:-webkit-box;
    display:-ms-flexbox;
    display:flex;
    padding-left:0;
    list-style:none;
    border-radius:0rem;
}

.pagination-lg .page-link{padding:0.75rem 1.5rem;font-size:1.171875rem;line-height:1.5;}

.pagination-lg .page-item:first-child .page-link{border-top-left-radius:0rem;border-bottom-left-radius:0rem;}

.pagination-lg .page-item:last-child .page-link{border-top-right-radius:0rem;border-bottom-right-radius:0rem;}

.pagination-sm .page-link{padding:0.25rem 0.5rem;font-size:0.8203125rem;line-height:1.5;}

.pagination-sm .page-item:first-child .page-link{border-top-left-radius:0rem;border-bottom-left-radius:0rem;}

.pagination-sm .page-item:last-child .page-link{border-top-right-radius:0rem;border-bottom-right-radius:0rem;}

.DataTable{
    border-radius: 0px;
}
</style>

</head>

<body>
    <?php include "../process/getAdminLoginData.php" ?>
    <?php include "../component/admin/sidebaropen.php" ?>
<br><br><br><br><br>
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">
                
<center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; border-radius: 30px; padding: 5px;">
                <i class="fas fa-user" aria-hidden="true"></i> Manajemen User</h2></center>
                <br><br>
                <button class="btn" type="button" data-toggle="collapse" data-target="#tambah_user"><i class="fas fa-users" aria-hidden="true"></i> Daftarkan User</button>
            </h1>

            <div class="collapse mb-4" id="tambah_user">
                <form action="../aksi/user_baru.php" method="post">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nama_user">Nama User:</label>
                                <input type="text" style="border-radius: 0px; border: 1px solid #070707;" class="form-control" name="nama" id="nama_user" required>
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" style="border-radius: 0px; border: 1px solid #070707;" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="email_user">Email:</label>
                                <input type="email" style="border-radius: 0px; border: 1px solid #070707;" class="form-control" name="email" id="email_user" required>
                            </div>

                            <div class="form-group">
                                <label for="provinsi">Provinsi:</label>
                                <select class="form-control" style="border-radius: 0px; border: 1px solid #070707;" id="provinsi" name="provinsi" required>
                                <option value="Aceh" selected>Aceh</option>
                            <option value="Sumatera Utara">Sumatera Utara</option>
                            <option value="Sumatera Barat">Sumatera Barat</option>
                            <option value="Riau">Riau</option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                            <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="Lampung">Lampung</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Banten">Banten</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="DI Yogyakarta">DI Yogyakarta</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Bali">Bali</option>
                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                            <option value="Maluku">Maluku </option>
                            <option value="Maluku Utara">Maluku Utara</option>
                            <option value="Papua Barat">Papua Barat</option>
                            <option value="Papua">Papua</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="kodepos_user">Kode Pos:</label>
                                <input type="text" style="border-radius: 0px; border: 1px solid #070707;" class="form-control" name="kodepos" id="kodepos_user" required>
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan_user">Pekerjaan:</label>
                                <input type="text" style="border-radius: 0px; border: 1px solid #070707;" class="form-control" name="pekerjaan" id="pekerjaan_user" required>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="teleponuser_user">No. Telepon:</label>
                                <input type="text" style="border-radius: 0px; border: 1px solid #070707;" class="form-control" name="teleponuser" id="teleponuser_user" required>
                            </div>

                            <div class="form-group">
                                <label for="saldo_awal_user">Saldo Awal User:</label>
                                <input type="number" style="border-radius: 0px; border: 1px solid #070707;" class="form-control uang" name="saldo" id="saldo_awal_user" value="0" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="idpengelola" value="<?=$data["id_pengelola"]?>">
                    <input type="hidden" name="adminid" value="<?=$data["id"]?>">

                    <input type="submit" class="btn" value="Daftar">
                </form>
            </div>

            <div class="card card-body">
                <?php 
                $user = $db->getSeluruhUser($data["id_pengelola"]);
                if ($user) {

                    ?>

                <div class="table-responsive">
                    <table id="listUser" class="table">
                        <thead style="background: #4B6ED4; color: #fff;">
                            <tr>
                                <th>ID</th>
                                <th>Tanggal Pendaftaran</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Pekerjaan</th>
                                <th>No. Telepon</th>
                                <th>Kode Pos</th>
                                <th>Provinsi</th>
                                <th>Saldo</th>
                                <th>Aksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($user as $user) {
                                ?>

                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->tanggal_pendaftaran ?></td>
                                <td><?= ucwords($user->nama) ?></td>
                                <td><?= $user->jenis_kelamin ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= "$user->pekerjaan" ?></td>
                                <td><?= $user->teleponuser ?></td>
                                <td><?= "$user->kodepos" ?></td>
                                <td><?= "$user->provinsi" ?></td>
                                <td data-sort="<?=$user->saldo?>"><?= rupiah($user->saldo) ?></td>
                                <td><a href="detail_user.php?id=<?=$user->id?>" class="btn btn-primary">Detail</a></td>
                                <td><a href="hapus.php?id=<?php echo $user->id?>" class="btn btn-primary">Hapus</a></td>
                            </tr>

                            <?php

                        }
                        ?>

                        </tbody>
                    </table>
                </div>

                <?php

            } else {
                echo "<p class='card-text'>Tidak ada user yang dapat ditampilkan</p>";
            }
            ?>
            </div>
        </div>

    </div>

    <?php include "../component/user/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
    <?php require "../component/scrollTop.php" ?>

    <script>
        $(document).ready(function() {
            $('#listUser').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ user per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada user yang dapat ditampilkan",
                    "infoFiltered": "(tersaring dari _MAX_ total user)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    },
                }
            });
        });
    </script>
</body>

</html> 