<?php
require "checkpost.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../theassets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../theassets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <?php include "../component/things.php" ?>

  <title>Daftar User</title>

  <link href="https://popay.my.id/themify-icons.css" rel="stylesheet">

  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../theassets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../theassets/demo/demo.css" rel="stylesheet" />

</head>

<body class="login-page sidebar-collapse">

 <?php
    include "../db/database.php";

    $db = new Database();

    $pengelola = $db->getPengelolaByCode($_POST["kode_pengelola"], PDO::FETCH_OBJ);
    $checkUser = $db->getUserByEmail($_POST["email"], PDO::FETCH_OBJ);

    if (!$pengelola) {
        echo "<h1>Maaf, PoPay tidak  menemukan kode pengelola tersebut</h1>";
        echo "<button onclick='history.back()' class='btn btn-primary'>Kembali</button>";

        return;
    }

    if ($checkUser) {
        echo "<h1>Maaf, email telah digunakan</h1>";
        echo "<button onclick='history.back()' class='btn btn-primary'>Kembali</button>";

        return;
    }

    $res = $db->register(
        $_POST["nama"],
        $pengelola->id,
        $_POST["jenis_kelamin"],
        $_POST["email"],
        $_POST["provinsi"],
        $_POST["kodepos"],
        $_POST["pekerjaan"],
        $_POST["teleponuser"],
        0
    );

    ?>

  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate"> <img src="../assets/pnup.png" width="40" height="50" class="d-inline-block align-top" alt=""></a>
        &nbsp;
        <a class="navbar-brand" style="font-size: 25px;" href="https://popay.my.id">
          POPAY </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item">
            <a class="nav-link" href="user/login.php" target="_blank">
              <i class="material-icons">unarchive</i> Login User
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="https://popay.my.id" target="_blank">
              <i class="material-icons">unarchive</i> Tentang
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://twitter.com/PNUP_Official" target="_blank" data-original-title="Follow PNUP on Twitter" rel="nofollow">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.facebook.com/poltekujungpandang/?_rdc=1&_rdr" target="_blank" data-original-title="Like PNUP on Facebook" rel="nofollow">
              <i class="fa fa-facebook-square"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="https://www.instagram.com/poltek_upg/" target="_blank" data-original-title="Follow PNUP on Instagram" rel="nofollow">
              <i class="fa fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="page-header header-filter" style="background-image: url('../theassets/img/wallet.jpg'); background-size: cover; height: 900px; background-position: top center;">
    <div class="container" >
      <div class="row" style="margin-top: -30px;">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">

          <form action="../aksi/ubah_password.php" method="POST" class="validatedForm">
              <div class="card-header card-header-primary text-center" style="background: #4B6ED4;">
                <h4 class="card-title">Atur Password User</h4>
                <img src="../assets/icon-128.png" style="border-radius: 30px;" width="70" height="70" class="d-inline-block align-top" alt=""></a>
        
              </div>
            
              <div class="card-body">

              <center>   <h2 class="font-weight-light" style=" color: red; font-size: 11px;">
               *Jika memutuskan untuk tidak mengubah password Anda, mohon diingat password
            yang telah ada saat ini.</h2></center>
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="old_password" id="old_password" placeholder="Password saat ini" value="<?= $res[1] ?>" readonly>
                </div>

                <center>   <h2 class="font-weight-light" style=" color: red; font-size: 11px;">
               *Demi keamanan data, mohon masukkan password minimal 8 digit dengan kombinasi huruf kapital dan angka. Terima kasih.</h2></center>
                   
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password baru">
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="new_password_confirm" id="new_password_confirm" placeholder="Konfirmasi password baru">
                </div>

                <input type="hidden" name="id" value="<?= $res[0] ?>">

              <center>  <button type="submit" class="btn btn-success" style=" 
                            background: #4B6ED4; border-radius: 10px; width: 200px; border: 1px solid #4B6ED4;">Ubah password</button>  </center>
              </div>

           <center>   <a href="../user/login.php" class="btn btn-primary" style="border-radius: 0px; padding: 5px;
                            background: #0B0B61; width: 200px; border: 1px solid #0B0B61; border-radius: 10px; margin-right: 20px;">Tidak mengubah password</a>
                      </center> 

              <br><br>

              <div class="footer text-center">
               
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer"  style="margin-bottom: 5px;">
      <div class="container">
      
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>
          <a href="https://popay.my.id/" target="_blank">POPAY - POLITEKNIK NEGERI UJUNG PANDANG</a>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="../theassets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../theassets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../theassets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../theassets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../theassets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../theassets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../theassets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>


  <?php include "../component/scripts.php" ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
    $('.validatedForm').validate({
        rules: {
            old_password: {
                minlength: 8
            },
            new_password: {
                minlength: 8
            },
            new_password_confirm: {
                minlength: 8,
                equalTo: "#new_password"
            }
        },
        messages: {
            old_password: {
                minlength: "Password setidaknya 8 karakter"
            },
            new_password: {
                minlength: "Password setidaknya 8 karakter"
            },
            new_password_confirm: {
                minlength: "Password setidaknya 8 karakter",
                equalTo: "Password tidak cocok"
            }
        }
    });

    $('.validatedForm').submit(() => $('.validatedForm').valid())
</script>

</body>

</html>