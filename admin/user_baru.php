<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>User Baru</title>
</head>

<body>
    <?php include "../process/getAdminLoginData.php" ?>
    <?php include "../component/admin/sidebaropen.php" ?>

    <h1>Form Akun User Baru</h1>

    <form action="../aksi/user_baru.php" method="post">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="nama_user">Nama User</label>
                    <input type="text" class="form-control" name="nama" id="nama_user" placeholder="Hafizh Beckham" required>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="email_user">Email User</label>
                    <input type="email" class="form-control" name="email" id="email_user" placeholder="hafizh@beckham.me" required>
                </div>

                <div class="form-group">
                    <label for="provinsi">Provinsi User</label>
                    <select class="form-control" id="provinsi" name="provinsi" required>
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
                    <label for="kodepos_user">Kode Pos User</label>
                    <input type="text" class="form-control" name="kodepos" id="kodepos_user" placeholder="A/B/C" required>
                </div>

                <div class="form-group">
                    <label for="pekerjaan_user">Pekerjaan User</label>
                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan_user" placeholder="RPL" required>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="teleponuser_user">No. Telepon User</label>
                    <input type="text" class="form-control" name="teleponuser" id="teleponuser_user" placeholder="1234567890" required>
                </div>

                <div class="form-group">
                    <label for="saldo_awal_user">Saldo Awal User</label>
                    <input type="number" class="form-control uang" name="saldo" id="saldo_awal_user" value="0" required>
                </div>
            </div>
        </div>

        <input type="hidden" name="idpengelola" value="<?=$data["id_pengelola"]?>">

        <input type="submit" class="btn btn-primary" value="Masukan">
    </form>

    </div>



    <?php include "../component/admin/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
</body>

</html> 