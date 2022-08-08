<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>

    <title>Riwayat Transaksi User</title>

    <style>
        body{
    background: #D8D8D8;
}
td, th {
  border: 1px solid #dddddd;
}

th{
  border: 1px solid #dddddd;
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
        </style>

</head>

<body>
    <?php include "../process/getAdminLoginData.php" ?>
    <?php include "../component/admin/sidebaropen.php" ?>

    <?php
        $trx = $db->getPengelolaTransactions($data["id_pengelola"]);;
    ?>
<br><br><br>
<div class="card" style="padding: 30px;">   
<center>  <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 5px; border-radius: 30px;">
                <i class="fas fa-user" aria-hidden="true"></i> Riwayat Transaksi User</h2></center>

    <?php if ($trx) { ?>
        <div class="table-responsive mt-4">
            <table id="paymentHistoryTable" class="table">
                <thead style="background: #4B6ED4; color: #fff;">
                    <tr>
                        <th>TRX ID</th>
                        <th>User ID</th>
                        <th>Tanggal</th>
                        <th>Jenis</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Tipe</th>
                        <th>Metode</th>
                        <th>Deskripsi</th>
                        <th>Ket. User</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($trx as $val) {
                        ?>

                        <tr>
                            <td><?= $val->id ?></td>
                            <td><a href="detail_user.php?id=<?= $val->user_id ?>"><?= $val->user_id ?></a></td>
                            <td><?= $val->tanggal ?></td>
                            <td class="text-<?= $val->jenistransaksi == "masuk" ? "success" : "danger" ?>"><?= ucwords($val->jenistransaksi) ?></td>
                            <td class="text-muted" data-sort="<?=$val->debit?>"><?= rupiah($val->debit) ?></td>
                            <td class="text-<?= $val->jenis == "masuk" ? "success" : "danger" ?>" data-sort="<?=$val->kredit?>"><?= rupiah($val->kredit) ?></td>
                            <td><?= $val->tipe ?></td>
                            <td><?= $val->metode ?></td>
                            <td><?= ucwords($val->deskripsi) ?></td>
                            <td><?= ucwords($val->keterangan) ?></td>
                        </tr>

                    <?php

                }
                ?>

                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <p>Belum terdapat transaksi</p>
    <?php } ?>

    <?php include "../component/user/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>
    <?php $noback = true; require "../component/scrollTop.php" ?>

    <script>
        $(document).ready(function() {
            $('#paymentHistoryTable').DataTable({
                "order": [
                    [0, "desc"]
                ],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ riwayat per halaman",
                    "zeroRecords": "Maaf, tidak dapat menemukan apapun",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
                    "infoEmpty": "Tidak ada riwayat yang dapat ditampilkan",
                    "infoFiltered": "(tersaring dari _MAX_ total riwayat)",
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