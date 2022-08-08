<?php 
$trx = $db->getUserTransactionHistory($data["id"], PDO::FETCH_OBJ);

$limit = 5;
$i = 0;

if ($trx) {

    foreach ($trx as $val) {
        ?>

<div class="card mt-4">
    <div class="card-body" style="background-color: #B5C1E1; color: #fff;">
        <h5 class="card-title"><?= $val->deskripsi ?></h5>
        <p class="card-text"><i class="fas ti-time" style="font-size: 12px; 
            background: #4B6ED4; padding: 7px; color: #fff; border-radius: 15px;"></i>
            <?= indonesian_date($val->tanggal), date('H:i:s', strtotime($val->tanggal))?></p>
        <h4 class="card-text mb-2 font-weight-bold float-sm-left text-<?= $val->jenistransaksi == "masuk" ? "success" : "danger" ?> mb-0">
            <?= $val->jenistransaksi == "masuk" ? "+" : "-" ?> <?= rupiah($val->kredit) ?>
        </h4>
        <p class="card-text font-weight-bold float-sm-right text-muted mb-0">
                <?= rupiah($val->debit) ?>
        </p>
    </div>
</div>

<?php
$i++;
if($i >= $limit) break;
}

} else {
    echo "<p class='card-text'>Kamu belum melakukan transaksi apapun</p>";
}
?>
