<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>Riwayat Transaksi</title>

    <style>
        body{
    background: #D8D8D8;
}
        td, th {
  border: 1px solid #dddddd;
  background: #fff;
}

th{
  border: 1px solid #dddddd;
  text-align: center;
  background: #4B6ED4;
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

    <center>  <h2 class="font-weight-light" style=" border-radius: 30px; background-color: #4B6ED4; color: #fff; font-size: 25px; padding: 5px;">
                <i class="fas ti-hand-open" aria-hidden="true"></i> Riwayat Transaksi</h2></center><br>
         <button class="btn" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; border-radius: 30px; color: #fff;" onclick="printHistory()">Print riwayat transaksi <i class="fa fa-print" aria-hidden="true"></i></button>
<br><br>
    <?php
    $trx = $db->getUserTransactionHistory($data["id"], PDO::FETCH_OBJ);

    // print_r($trx);

    if ($trx) {
        ?>

        <div class="table-responsive" id="container-history">
            <table id="paymentHistoryTable" class="table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jenis Transaksi</th>
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
                            <td><?= $val->tanggal ?></td>
                            <td class="text-<?= $val->jenistransaksi == "masuk" ? "success" : "danger" ?>"><?= ucwords($val->jenistransaksi) ?></td>
                            <td class="text-muted" data-sort="<?= $val->debit ?>"><?= rupiah($val->debit) ?></td>
                            <td class="text-<?= $val->jenistransaksi == "masuk" ? "success" : "danger" ?>" data-sort="<?= $val->kredit ?>"><?= rupiah($val->kredit) ?></td>
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
    <?php

} else {
    echo "<p class='card-text' style='font-size: 19px;'>Anda belum melakukan transaksi apapun.</p>";
}
?>

    <?php include "../component/user/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>

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

        function printHistory() {
            var centeredText = function(text, y) {
                var textWidth = pdf.getStringUnitWidth(text) * pdf.internal.getFontSize() / pdf.internal.scaleFactor;
                var textOffset = (pdf.internal.pageSize.width - textWidth) / 2;
                pdf.text(textOffset, y, text);
            }

            var pdf = new jsPDF('p', 'pt', 'letter');

            pdf.setFontType("normal");
            
            centeredText("Riwayat Transaksi: <?= "{$data["nama"]} - {$data["provinsi"]}, {$data["pekerjaan"]}, {$data["kodepos"]}" ?>", 30);

            pdf.autoTable({
                html: "#paymentHistoryTable"
            });

            pdf.save('Riwayat transaksi-<?= $data["nama"] ?>.pdf');
        }
    </script>
</body>

</html>