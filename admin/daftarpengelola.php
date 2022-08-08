
<?php
    session_start();

    require '../db/database.php';

    if (isset($_SESSION['userid'])) {
        header("Location: ../user/home.php");
        die();
    } else if (isset($_SESSION['adminid'])) {
        header("Location: ../admin/home.php");
        die();
    }

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
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

<style>
.form-check {
  width: 80%;
  margin: 0;
  padding: 0;
  color: #000;
  border: 1px solid #000;
}
.form-check-input{
    position:absolute; margin-top:0.3rem; margin-left:-1.25rem; color:#000;
    border: 1px solid #000;
}
.form-check-input:disabled ~ .form-check-label{color:#000; }
.form-check-label{margin-bottom:0; color:#000;
}
.form-check-inline{display:-webkit-inline-box;
    display:-ms-inline-flexbox;display:inline-flex;
    -webkit-box-align:center;-ms-flex-align:center;
    align-items:center;
    padding-left:0;
    margin-right:0.75rem;
    color:#000;
}
.form-check-inline .form-check-input{position:static;margin-top:0;margin-right:0.3125rem;margin-left:0}

.btn input[type="checkbox"],.btn-group-toggle>.btn-group>.btn input[type="radio"],.btn-group-toggle>.btn-group>.btn input[type="checkbox"]{position:absolute;clip:rect(0, 0, 0, 0);pointer-events:none}
.input-group-text input[type="checkbox"]{margin-top:0}

.custom-checkbox .custom-control-label::before{border-radius:0.25rem}
.custom-checkbox 
.custom-control-input:checked ~ .custom-control-label::after{
    background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3e%3c/svg%3e")}
.custom-checkbox .custom-control-input:indeterminate ~ 
.custom-control-label::before{border-color:#000;background-color:#000}
.custom-checkbox .custom-control-input:indeterminate ~ 
.custom-control-label::after{background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 4'%3e%3cpath stroke='%23fff' d='M0 2h4'/%3e%3c/svg%3e")}
.custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before{background-color:rgba(44,62,80,0.5)}.custom-checkbox .custom-control-input:disabled:indeterminate ~ 
.custom-control-label::before{background-color:rgba(44,62,80,0.5)}

</style>

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
      <div class="row" style="margin-top: 10px;">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">

          <form action="../aksi/daftar_pengelola.php" method="POST">
              <div class="card-header card-header-primary text-center" style="background: #4B6ED4;">
                <h4 class="card-title">Daftar Admin/Pengelola</h4>
                <img src="../assets/icon-128.png" style="border-radius: 30px;" width="70" height="70" class="d-inline-block align-top" alt=""></a>
        
              </div>
            
              <div class="card-body">

               
                
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas ti-user"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="nama_pengelola" id="nama_pengelola" placeholder="Nama pengelola" required>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" class="form-control" name="email_pengelola" id="email_pengelola" placeholder="Email" required>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">phone</i>
                    </span>
                  </div>
                  <input type="number" class="form-control" name="telepon_pengelola" id="telepon_pengelola" placeholder="No. Telepon" required>
                </div>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas ti-pin" style="font-size: 23px;"></i>
                    </span>
                  </div>
                  <select class="form-control" id="provinsi_pengelola" name="provinsi_pengelola" placeholder="Provinsi" required>
                  <option value="Aceh">Provinsi</option>
                  <option value="Aceh">Aceh</option>
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

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">home</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" required>
                </div>
                <br>
               
                <center>   <div class="form-group">
                       
                            <input type="checkbox" class="form-check-input" id="kode" name="kode">
                            <label class="form-check-label" for="kode">Ijinkan user mendaftar sendiri</label>
                        </div>     
</center> 

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
</body>

</html>