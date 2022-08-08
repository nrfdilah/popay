<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>

    <style>
        .card {
            width: 370px;
            border: 1px solid #000;
        }

        .card-body {
            padding: .8rem;
        }

        .card-footer>img {
            width: 30px;
        }

        .card-footer {
            background-color: #4B6ED4;
            color: #fff;
            font-size: 20px;
            text-align: right;
            -webkit-print-color-adjust: exact;
        }

        .left {
            float: left;
            color: rgba(255, 255, 255, 0.9) padding-top: 10px;
            /* font-size: 13px; */
        }

        @media print {
            .no-print,
            .no-print * {
                display: none !important;
            }
        }
    </style>

    <?php
    include "../phpqrcode/qrlib.php";

    $qr = $_GET["qrdata"];
    $judul = $_GET["judul"];
    $kantin = $_GET["kantin"];

    $file = "../qrcodes/$qr.png";

    if(!file_exists($file)) {
        QRCode::png($qr, $file, "L", 13, 1);
    }
    ?>

    <title><?= $judul ?> - <?= $kantin ?></title>
</head>

<body>
    <?php include "../process/getAdminLoginData.php" ?>

    <a class="no-print btn ml-5 mt-5" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff;"
 href="../admin/info_kantin.php?id=<?= $_GET["idkantin"] ?>">kembali</a>

    <div class="row">

        <?php for ($i = 0; $i < 4; $i++) { ?>
            <div class="col-6 p-5">
                <div class="card text-center">
                    <div class=" card-body">
                        <small style="font-size: 15px;">Nama produk: <?= $judul ?></small><br />
                        <img src="../qrcodes/<?= $qr ?>.png">
                        <small><?= $qr ?></small>
                        </div>
                        <div class="card-footer">
                            <span class="left"><?= $kantin ?></span>
                        <img src="../assets/pnup.png" alt=""> Popay
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <script>
        window.print();
    </script>

</body>

</html>