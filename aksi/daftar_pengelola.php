<?php
require "checkpost.php";
require "../db/database.php";

$db = new Database();

$res = $db->registerPengelola(
    $_POST["nama_pengelola"],
    $_POST["telepon_pengelola"],
    $_POST["provinsi_pengelola"],
    $_POST["alamat"],
    $_POST["email_pengelola"],
    isset($_POST["kode"])
);

if ($res) { ?>


<!DOCTYPE html>
<html lang="en">

<head>

<?php include "../component/things.php" ?>

  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../theassets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../theassets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


  <?php include "../component/things.php" ?>
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico"/>
    <link rel="stylesheet" href="../styles/landing.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">

  <title>
    Daftar Admin/Pengelola
  </title>
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
            <a class="nav-link" href="login.php" target="_blank">
              <i class="material-icons">unarchive</i> Login Admin/Pengelola
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

  <div class="page-header header-filter" style="background-image: url('../theassets/img/admin.jpg'); background-size: cover; height: 1100px; background-position: top center;">
    <div class="container" >
      <div class="row" style="margin-bottom: 100px;">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">

          <form action="regist_admin.php" method="POST">
              <div class="card-header card-header-primary text-center" style="background: #4B6ED4;">
                <h4 class="card-title">Daftar Admin</h4>
                <img src="../assets/icon-128.png" style="border-radius: 30px;" width="70" height="70" class="d-inline-block align-top" alt=""></a>
        
              </div>
            
              <div class="card-body">

               
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas ti-user"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama admin" required>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>

                <input type="hidden" name="idpengelola" value="<?= $res ?>">

              <center>  <button type="submit" class="btn btn-success" style=" 
                            background: #4B6ED4; border-radius: 10px; width: 200px; border: 1px solid #4B6ED4;">Daftar</button>  </center>
              </div>

           <center>   <a href="../" class="btn btn-primary" style="border-radius: 0px; 
                            background: #0B0B61; width: 200px; border: 1px solid #0B0B61; border-radius: 10px; margin-right: 20px;">Kembali</a>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>



<?php
} else {
    echo "<div class='container text-center'>";
    echo "<h1>Maaf, tidak dapat mendaftarkan pengelola. Telah terjadi kesalahan</h1>";
    echo "<button onclick='history.back()' class='btn btn-primary'>Kembali</button>";
    echo "</div>";

    return;
}
?>