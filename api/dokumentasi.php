
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>Dokumentasi API Popay</title>
    <meta name="description" content="">
    <meta name="author" content="dila">

    <meta http-equiv="cleartype" content="on">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assetsdok/css/hightlightjs-dark.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500|Source+Code+Pro:300" rel="stylesheet">
    <link rel="stylesheet" href="../assetsdok/css/style.css" media="all">
    <script>hljs.initHighlightingOnLoad();</script>
</head>

<body>
<div class="left-menu">
    <div class="content-logo">
        <img alt="popay" title="Popay" src="../assetsdok/images/logo.png" height="32" />
        <span style="margin-left: 3px;">Dokumentasi API Popay</span>
    </div>
    <div class="content-menu">
        <ul>
            <li class="scroll-to-link active" data-target="get-started">
                <a>Get Started</a>
            </li>
            <li class="scroll-to-link" data-target="get-characters">
                <a>Transfer Antar User</a>
            </li>
            <li class="scroll-to-link" data-target="content-check">
                <a>Cek Akun</a>
            </li>
            <li class="scroll-to-link" data-target="content-saldo">
                <a>Cek Saldo</a>
            </li>
        </ul>
    </div>
</div>
<div class="content-page">
    <div class="content-code"></div>
    <div class="content">
        <div class="overflow-hidden content-section" id="content-get-started">
            <h1 id="get-started">Dokumentasi API Popay</h1>
           
            <p>
               Dokumentasi ini menjelaskan mengenai cara mengakses layanan API Popay. Sehingga integrasi dapat dilakukan
               secara mudah dan cepat. Berikut ini API yang dapat digunakan pada keperluan development website yang terintegrasi dengan Popay.
               
        </p>
           
        </div>
        <div class="overflow-hidden content-section" id="content-get-characters">
            <h2 id="get-characters">Transfer Antar User</h2>
            <pre><code class="bash">
curl --location --request POST 'https://popay.my.id/api/transfer.php' \
--form 'sender="081579104378"' \
--form 'receiver="081111111"' \
--form 'amount="1000"'
                </code></pre>
            <p>
                Untuk dapat melakukan transaksi antar user, maka dapat digunakan URL berikut:<br>
                <code class="highlighted">https://popay.my.id/api/transfer.php</code>
            </p>
            <br>
            <pre><code class="json">
Hasil/output :

{
    "status": "success",
    "message": "Saldo berhasil dikirim"
}
                </code></pre>
     
            <h4>INPUT-> BODY-FORM DATA</h4>
            <table>
                <thead>
                <tr>
                    <th>Key</th>
                    <th>Keterangan</th>
                    
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Sender</td>
                    <td>Pengirim saldo</td>
                </tr>
                <tr>
                    <td>Receiver</td>
                   
                    <td>Penerima saldo</td>
                </tr>

                <tr>
                    <td>Amount</td>
                   
                    <td>Total saldo yang dikirim</td>
                </tr>
               
              
                </tbody>
            </table>
        </div>



        <div class="overflow-hidden content-section" id="content-check">
            <h2 id="check">Cek Akun</h2>
            <p>
            Untuk dapat melakukan cek apakah akun telah terdaftar di Popay, maka dapat digunakan URL berikut:<br>
            <code class="highlighted">https://popay.my.id/api/account_check.php</code>
            </p>


            <pre><code class="bash">
curl --location --request POST 'https://popay.my.id/api/account_check.php?phone=081111111' \
--form 'phone="082345566370"'
                </code></pre>
           
            <br>
            <pre><code class="json">
Hasil/output :

{
    "status": "true"
}
                </code></pre>

            <h4>INPUT-> BODY-FORM DATA</h4>
          
            <table>
                <thead>
                <tr>
                    <th>Key</th>
                    <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>phone</td>
                    <td>
                        No. telepon user Popay
                    </td>
                </tr>
               
                </tbody>
            </table>
        </div>
  


    <div class="overflow-hidden content-section" id="content-saldo">
            <h2 id="saldo">Memperoleh Data User -Termasuk Cek Saldo</h2>
            <p>
            Untuk dapat memperoleh data user, termasuk mengetahui jumlah saldo yang dimiliki user di Popay, maka dapat digunakan URL berikut:<br>
            <code class="highlighted">https://popay.my.id/api/cek_saldo.php</code>
            </p>


            <pre><code class="bash">
curl --location --request POST 'https://popay.my.id/api/account_check.php?phone=081111111' \
--form 'phone="082345566370"'
                </code></pre>
           
            <br>
            <pre><code class="json">
Hasil/output :

{
    "status": "true",
    "account": {
        "id": "2",
        "id_pengelola": "1",
        "tanggal_pendaftaran": "2021-09-27 09:20:24",
        "nama": "Akun dua",
        "jenis_kelamin": "laki-laki",
        "email": "akundua@yahoo.com",
        "level": "user",
        "provinsi": "Sulawesi Selatan",
        "kodepos": "17181",
        "pekerjaan": "Mahasiswa",
        "teleponuser": "081579104378",
        "saldo": "76000"
    }
}
                </code></pre>
                

            <h4>INPUT-> BODY-FORM DATA</h4>
          
            <table>
                <thead>
                <tr>
                    <th>Key</th>
                    <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>telponuser</td>
                    <td>
                        No. telepon user Popay
                    </td>
                </tr>
               
                </tbody>
            </table>
        </div>
    </div>

    <div class="content-code"></div>
</div>
<script src="../assetsdok/js/script.js"></script>
</body>
</html>