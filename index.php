
<?php
    session_start();

    require 'db/database.php';

    if (isset($_SESSION['userid'])) {
        header("Location: user/home.php");
        die();
    } else if (isset($_SESSION['adminid'])) {
        header("Location: admin/home.php");
        die();
    }

    ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
<head>


  <link rel="shortcut icon" type="image/x-icon" href="icon.ico"/>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Bingo One page parallax responsive HTML Template ">
  
  <meta name="author" content="Themefisher.com">

  <link href="https://popay.my.id/themify-icons.css" rel="stylesheet">

  <title>PoPay - Poliupg E-Wallet</title>

  <link rel="manifest" href="/manifest.json">
          <link rel="apple-touch-icon" href="assets/images/icon-152.png">
  <meta name="theme-color" content="white"/>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Popay app">
  <meta name="msapplication-TileImage" content="assets/images/icon-144.png">
  <meta name="msapplication-TileColor" content="#FFFFFF">

  <style>
.navigation .navbar-light .navbar-nav .nav-item .nav-link {
  color: #fff;
  font-size: 14px;
  line-height: 26px;
  padding: 20px 15px;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: .2s ease-in-out 0s;
}

.navigation .navbar-light .navbar-nav .nav-item .nav-link:hover, .navigation .navbar-light .navbar-nav .nav-item .nav-link:active, .navigation .navbar-light .navbar-nav .nav-item .nav-link:focus {
  background: none;
  color: #28ABE3;
}

.navigation .navbar-light .navbar-nav .nav-item.active .nav-link {
  color: #28ABE3;
}

.call-to-action {
  padding: 100px 0;
  background: url("../assets/payci.jpg");
  background-size: cover;
  color: #fff;
}

.call-to-action h2 {
  line-height: 1.5;
}

.call-to-action p {
  color: #fff;
}

.call-to-action .btn-main {
  margin-top: 20px;
}

/*=================================================================
 Call To Action 2
==================================================================*/
.call-to-action-2 {
  padding: 100px 0;
  background-image: url("../assets/payci.jpg");
  background-size: cover;
  color: #fff;
}

.call-to-action-2 h2 {
  line-height: 1.5;
}

.call-to-action-2 p {
  color: #fff;
}

.call-to-action-2 .btn-main {
  margin-top: 20px;
}


.call-to-action {
  padding:100px 0;
  background: url('../assets/payci.jpg');
  background-size: cover;
  color: $light;
  h2 {
    line-height: 1.5;
  }
  p {
    color: $light;
  }
  .btn-main {
    margin-top: 20px;
  }
}





/*=================================================================
 Call To Action 2
==================================================================*/

.call-to-action-2 {
  padding:100px 0;
  background-image: url('../assets/payci.jpg');
  background-size: cover;
  color: $light;
  h2 {
    line-height: 1.5;
  }
  p {
    color: $light;
  }
  .btn-main {
    margin-top: 20px;
  }
  
}

h5 {
  font-size: 7px;
  color: #fff;
  font-weight: 400;
  text-transform: uppercase;
  margin-top: 7px;
 
}

.top-footer {
  background-color: #4B6ED4;
  color: #fff;
  padding: 80px;
}


.top-footer li a {
  font-size: 13px;
  line-height: 30px;
  color: #fff;
  font-weight: 300;
  letter-spacing: 1px;
  text-transform: capitalize;
  transition: color .3s;
  font-family: "Source Sans Pro", sans-serif;
  display: block;
}

li{
    color: #fff;
}

.service-2 .service-item {
  border: 1px solid #eee;
  margin-bottom: 30px;
  padding: 50px 20px;
  transition: all 0.3s ease 0s;
  background: #08298A;
  color: #fff;
}

.service-2 .service-item:hover {
  box-shadow: 0 5px 65px 0 rgba(0, 0, 0, 0.15);
  -webkit-box-shadow: 0 5px 65px 0 rgba(0, 0, 0, 0.15);
}

.service-2 .service-item:hover i {
  background: #fff;
  color: #28ABE3;
}

.service-2 .service-item i {
  font-size: 30px;
  display: inline-block;
  background: #08298A;
  background: #08298A none repeat scroll 0 0;
  border-radius: 30px;
  box-shadow: 0 5px 6px 0 rgba(0, 0, 0, 0.1);
  color: #fff;
  height: 55px;
  line-height: 55px;
  margin-bottom: 20px;
  width: 55px;
  transition: all 0.3s ease 0s;
}

      </style>

<!-- Mobile Specific Meta
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  <!-- CSS
  ================================================== -->
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Lightbox.min css -->
  <link rel="stylesheet" href="plugins/lightbox2/dist/css/lightbox.min.css">
  <!-- animation css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assetis/css/style.css">  

</head>

<body id="body">

 <!--
  Start Preloader
  ==================================== -->
  <div id="preloader">
    <div class='preloader'>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div> 
  <!--
  End Preloader
  ==================================== -->


  

<!--
Fixed Navigation
==================================== -->
<header class="navigation fixed-top">
  <div class="container">
    <!-- main nav -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <!-- logo -->
      <a class="navbar-brand logo" href="#">
      <img class="logo-default" style="border-radius: 30px;" src="assets/icon-128.png" width="60" height="60" alt="logo"/> 
        <img class="logo-white" style="border-radius: 30px;" src="assets/icon-128.png" width="60" height="60" alt="logo"/> 
      </a>
      <!-- /logo -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav ml-auto text-center">
         
          <li class="nav-item ">
            <a class="nav-link pointer" href="user/login.php">Login User</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link pointer" id="daftar-user">Daftar User</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link pointer" href="api/dokumentasi.php">Dokumentasi API</a>
          </li>
           <li class="nav-item ">
            <a class="nav-link pointer" href="https://drive.google.com/drive/folders/1FTkksIpEvYmryeYiP_ZV-oOiBjyect4-">Download Popay App</a>
          </li>
         
        </ul>
      </div>
    </nav>
    <!-- /main nav -->
  </div>
</header>
<!--
End Fixed Navigation
==================================== -->


	<div class="hero-slider">
	<div class="slider-item th-fullpage hero-area" style="background-image: url(assets/people.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Transaksi QR Code 
						</h1>
					<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Kini pembayaran maupun transfer saldo dapat dilakukan 
                        secara mudah dengan kode QR.</p>
					</div>
			</div>
		</div>
	</div>

	<div class="slider-item th-fullpage hero-area" style="background-image: url(assets/tsa.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".1">Transfer Saldo</h1>
					<p data-duration-in=".3" data-animation-in="fadeInDown" data-delay-in=".5">Kemudahan transfer saldo kini berada di genggaman Anda.</p>
					</div>
			</div>
		</div>
	</div>

    <div class="slider-item th-fullpage hero-area" style="background-image: url(assets/din.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">Donasi 
						</h1>
					<p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">Lakukan donasi dengan mudah dan cepat.</p>
					</div>
			</div>
		</div>
	</div>

</div>




<!--
Start About Section
==================================== -->
<section class="service-2 section">
  <div class="container">
    <div class="row">

      <div class="col-12">
        <!-- section title -->
        <div class="title text-center">
          <h2>POPAY</h2>
          <p>Your digital wallet.</p>
          <div class="border"></div>
        </div>
        <!-- /section title -->
      </div>

     
      <div class="col-md-7 offset-md-3 ">
        <div class="row text-center">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="service-item">
              <i class="tf-ion-qr-scanner" style="background: #fff; color: #08298A;"></i>
              <h4>QR Code</h4>
             
            </div>
          </div><!-- END COL -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="service-item">
              <i class="ti-share" style="background: #fff; color: #08298A;"></i>
              <h4>Transfer Saldo</h4>
              </div>
          </div><!-- END COL -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="service-item">
              <i class="ti-hand-open" style="background: #fff; color: #08298A;"></i>
              <h4>Donasi</h4>
              </div>
          </div><!-- END COL -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="service-item">
              <i class="ti-bolt-alt" style="background: #fff; color: #08298A;"></i>
              <h4>Mudah & Cepat</h4>
              </div>
          </div><!-- END COL -->
        </div>
      </div>
    </div> <!-- End row -->
  </div> <!-- End container -->
</section> <!-- End section -->


<!--
Start About Section
==================================== -->
<section class="about-2 section" id="about">
	<div class="container form-daftar-user">
		<div class="row">

			<!-- section title -->
			<div class="col-12">
				<div class="title text-center">
					<h2 style="background: #08298A; color:#fff; padding: 5px;"> <i class="fas ti-user" aria-hidden="true"></i> Pendaftaran User</h2>
					<p>Segera bergabung bersama Popay dan nikmati beragam kemudahan!</p>
					<div class="border"></div>
				</div>
			</div>
			<!-- /section title -->

			<div class="col-md-6">
				<img src="assets/regist.png" class="img-fluid" alt="">
			</div>
			<div class="col-md-6"><center>
            <form action="aksi/regist_user.php" method="post">
                    <div>
                        <div class="form-group">
                          <input type="hidden" style="border-radius: 0px; border: 1px solid #070707;" value="FOnpoTPqYk" class="form-control" name="kode_pengelola" id="kode_pengelola">
                        </div>

                        <div class="form-group">
                            <label for="nama_user">Nama:</label>
                            <input type="text" style="border-radius: 0px; border: 1px solid #070707;" class="form-control" name="nama" id="nama_user" required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis kelamin:</label>
                            <select class="form-control" style="border-radius: 0px; border: 1px solid #070707;" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div>
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

                    <div>
                        <div class="form-group">
                            <label for="pekerjaan_user">Pekerjaan:</label>
                            <input type="text" style="border-radius: 0px; border: 1px solid #070707;" class="form-control" name="pekerjaan" id="pekerjaan_user" required>
                        </div>

                        <div class="form-group">
                            <label for="kodepos_user">Kode Pos:</label>
                            <input type="text" style="border-radius: 0px; border: 1px solid #070707;" class="form-control" name="kodepos" id="kodepos_user" required>
                        </div>
                    </div>

                    <div>
                        <div class="form-group">
                            <label for="teleponuser_user">No. Telepon:</label>
                            <input type="number" style="border-radius: 0px; border: 1px solid #070707;" class="form-control" name="teleponuser" id="teleponuser_user" required>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" style="border-radius: 10px; 
                    border: 1px solid #4B6ED4; padding: 10px; background: #4B6ED4;" value="Daftar">
                </form>
            </div>
        </div>
    </section>
</center>

			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- End section -->


<!--
Start Call To Action
==================================== -->
<section class="call-to-action section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 style="color: #000;">POPAY</h2>
				<p style="color: #000;">Mari bergabung bersama PoPay, nikmati berbagai fitur & kemudahannya.</p>
			</div>
		</div> 		<!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->


<footer id="footer" class="bg-one">
  <div class="top-footer" style=" padding: 70px; background: #08298A;">
    <div class="container">
      <div class="row">
       

        <div class="offset-md-4">
       <center>  <ul style="color: #fff;">
            <li><h3>Mari terhubung bersama kami</h3></li>
            <li><a href="#">Facebook</a></li>
            <li><a href="https://twitter.com/PNUP_Official">Twitter</a></li>
            <li><a href="https://www.instagram.com/poltek_upg/">Instagram</a></li>
           
          </ul><br>
          <h5 style="font-size: 15px;">© 2021 PoPay - Politeknik Negeri Ujung Pandang</h5>
        </div>
        <!-- End of .col-sm-3 -->

      </div>
    </div> <!-- end container -->
  </div>
 
</footer> <!-- end footer -->


    <!-- end Footer Area
    ========================================== -->
    

    
    <!-- 
    Essential Scripts
    =====================================-->
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
    <script  src="plugins/google-map/gmap.js"></script>

    <!-- Form Validation -->
    <script src="plugins/form-validation/jquery.form.js"></script> 
    <script src="plugins/form-validation/jquery.validate.min.js"></script>
    
    <!-- Bootstrap4 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Parallax -->
    <script src="plugins/parallax/jquery.parallax-1.1.3.js"></script>
    <!-- lightbox -->
    <script src="plugins/lightbox2/dist/js/lightbox.min.js"></script>
    <!-- Owl Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <!-- filter -->
    <script src="plugins/filterizr/jquery.filterizr.min.js"></script>
    <!-- Smooth Scroll js -->
    <script src="plugins/smooth-scroll/smooth-scroll.min.js"></script>
    
    <!-- Custom js -->
    <script src="assetis/js/script.js"></script>

    
    <script>
        $("#daftar-pengelola").on("click", () => {
            $('html, body').animate({
                    scrollTop: $('.form-daftar-pengelola').offset().top - 60
                },
                1000
            );
        })

        $("#daftar-user").on("click", () => {
            $('html, body').animate({
                    scrollTop: $('.form-daftar-user').offset().top - 60
                },
                1000
            );
        })
        $("#tentang").on("click", () => {
            $('html, body').animate({
                    scrollTop: $('.tentang').offset().top - 60
                },
                1000
            );
        })
    </script>

<script src="assets/js/main.js"></script>

  </body>
  </html>
