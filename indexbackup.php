<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'component/things.php' ?>

    <link rel="shortcut icon" type="image/x-icon" href="icon.ico"/>
    <link rel="stylesheet" href="styles/landing.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://popay.my.id/themify-icons.css" rel="stylesheet">
    

    <title>PoPay</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="manifest" href="/manifest.json">
          <link rel="apple-touch-icon" href="assets/images/icon-152.png">
  <meta name="theme-color" content="white"/>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Popay app">
  <meta name="msapplication-TileImage" content="assets/images/icon-144.png">
  <meta name="msapplication-TileColor" content="#FFFFFF">


  <style>
      @import url("https://use.fontawesome.com/releases/v5.13.0/css/all.css");
.h-100{
    height:100% !important
}

    .nav-item{
        color: #FFFFFF;
    }

    .card{
        position: relative;
        display:-webkit-box;
        display:-ms-flexbox;
        display: flex;
        -webkit-box-orient:vertical;
        -webkit-box-direction:normal;
        -ms-flex-direction:column;
        flex-direction:column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #4B6ED4;
        color: #fff;
        background-clip: border-box;
        border: 1px solid #4B6ED4;
        border-radius: 0rem;
        left: 10px;
    }
    .card-body{
        -webkit-box-flex: 1;
        -ms-flex:1 1 auto;
        flex:1 1 auto;
        padding:1rem;
       
    }
    footer {
    width: 100%;
    bottom: 0;
    padding: 20px;
}

footer .konten {
    padding: 5px 0px 0px 0px;
}

.konten, .konten-utama {
    width: 1300px;
    margin: auto;
}

.konten-utama {
    padding: 0px 0;
    margin-top: 100px;
    margin-bottom: 15px;
    overflow: hidden;
    flex: 1;
}

.footer-footer {
    font-size: 9px;
}

footer {
    background-color: #748AA1;
    overflow: hidden;
}

.footer_kiri {
    float: left;
    color: #FFFFFF;
}

.footer_kanan {
	float: right;
	font-size: 13px;
    margin-right: 240px;
    color: #FFFFFF;
}

.footer_kanan a {
	color: #FFFFFF;
}

.footer_kanan a:hover {
	text-decoration: none;
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

<body id="blog">
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


    <nav class="navbar fixed-top white navbar-expand-lg navbar-light" style="background-color: #4B6ED4;">
        <a class="navbar-brand" href="#"> <img src="assets/pnup.png" width="30" height="50" class="d-inline-block align-top" alt=""></a>
        <div style="color: #ffffff; font-size: 23px;">POPAY</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                 <a class="nav-link pointer" href="user/login.php" style="color: #ffffff; font-size: 20px;">Login User</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link pointer" id="daftar-user" style="color: #ffffff; font-size: 20px;">Daftar User</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link pointer" id="tentang" style="color: #ffffff; font-size: 20px;">Tentang</a></div> 
                </li>
            </ul>
        </div>
    </nav>


    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-left brand-container">
                  <center>  <h1 class="font-weight-light" style="color: #FFFFFF; background: rgb(0, 0, 0); 
			background: rgba(0, 0, 0, 0.5); width: 250px;">POPAY</h1>
                    <p class="lead" style="color: #FFFFFF; background: rgb(0, 0, 0); 
			background: rgba(0, 0, 0, 0.5); width: 250px; font-size: 20px; margin-top: -8px;">Poliupg Payment Wallet</p>  </center>  
                </div>
            </div>
        </div>
    </header>


    <section class="py-5">
        <div class="container">
            <div class="container text-center py-2">
                <h2 class="font-weight-light" style="text-decoration: underline;">Kini mudah dengan PoPay</h2>
                <p style="font-size: 18px;">PoPay merupakan sebuah dompet elektronik yang dikhususkan di lingkungan
                    pengelola. User dapat menabung, membayar di kantin, serta melakukan donasi secara
                    mudah dan cepat.</p>
            </div>

            <div class="row">
		<div class="col-md-12">
			<div class="carousel slide" id="carousel-288005">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-288005" class="active">
					</li>
					<li data-slide-to="1" data-target="#carousel-288005">
					</li>
					<li data-slide-to="2" data-target="#carousel-288005">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" alt="Carousel Bootstrap First" src="assets/payci.jpg" 
                        style="height: 350px;" />
						<div class="carousel-caption" style="color: #FFFFFF; background: rgb(0, 0, 0); 
			background: rgba(0, 0, 0, 0.5);">
							<h4>
								QR Code
							</h4>
							<p>
                            Pembayaran di kantin maupun transfer saldo dengan kode QR.
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap Second" src="assets/tsa.jpg" 
                        style="height: 350px;" />
						<div class="carousel-caption" style="color: #FFFFFF; background: rgb(0, 0, 0); 
			background: rgba(0, 0, 0, 0.5);">
							<h4>
								Transfer saldo
							</h4>
							<p>
								Kemudahan transfer saldo kini berada di genggaman Anda.
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" alt="Carousel Bootstrap Third" src="assets/din.jpg" 
                        style="height: 350px;"  />
						<div class="carousel-caption" style="color: #FFFFFF; background: rgb(0, 0, 0); 
			background: rgba(0, 0, 0, 0.5);">
							<h4>
								Donasi
							</h4>
							<p>
							Lakukan donasi dengan mudah dan cepat.
							</p>
						</div>
					</div>
				</div> <a class="carousel-control-prev" href="#carousel-288005" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-288005" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
			</div>
		</div>
	</div>

            <div class="container py-2 text-center form-daftar-user">
                <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff;">
                <i class="fas fa-user" aria-hidden="true"></i> Pendaftaran User</h2>

                <form action="aksi/regist_user.php" method="post">
                    <div>
                        <div class="form-group">
                            <label for="kode_pengelola" style="margin-top: 10px; margin-bottom: -30px;">Kode Pendaftaran:</label>
                            <p style="color: blue";>*Silakan masukkan kode pendaftaran ini: </p>
                            <input type="text" style="border-radius: 0px; border: 1px solid #070707;" class="form-control" name="kode_pengelola" id="kode_pengelola" required>
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

                    <input type="submit" class="btn btn-primary" style="border-radius: 0px; 
                    border: 1px solid #4B6ED4; background: #4B6ED4;" value="Daftar">
                </form>
            </div>
        </div>
    </section>


         <!-- Footer -->
    <footer class="page-footer font-small blue pt-4 tentang" style="background: #4B6ED4;">
        <div class="container-fluid text-center">
            <h5 class="text-uppercase">© 2021 PoPay Politeknik Negeri Ujung Pandang</h5>
        </div>

        <div class="footer-copyright text-left py-3"><span class="ti-facebook" style="background-color: #2E2EFE; padding: 3px; font-size: 15px;"></span>
               <a href="https://www.poliupg.ac.id/" style="color: #fff;"> Facebook</a>
        </div>

        <div class="footer-copyright text-left py-3" style="margin-top: -20px;"><span class="ti-twitter-alt" style="background-color: #0db4d6; padding: 3px; font-size: 15px;"></span>
               <a href="https://twitter.com/PNUP_Official" style="color: #fff;"> Twitter</a>
        </div>
        <div class="footer-copyright text-left py-3" style="margin-top: -20px;"><span class="ti-instagram" style="background-color: #DF3A01; padding: 3px; font-size: 15px;"></span>
               <a href="https://www.instagram.com/poltek_upg/" style="color: #fff;"> Instagram</a>
        </div>
      


        <div class="footer-copyright text-left py-3"><span class="ti-angle-right" style="font-size: 15px;">Alamat:</span>
               <a style="color: #fff;"> Jalan Perintis Kemerdekaan
KM. 10, Tamalanrea, Makassar, 90245</a>
        </div>

        <div class="footer-copyright text-left py-3" style="margin-top: -25px;"><span class="ti-angle-right" style="font-size: 15px;">E-mail:</span>
               <a style="color: #fff;">  pnup@poliupg.ac.id</a>
        </div>

        <div class="footer-copyright text-left py-3" style="margin-top: -25px;"><span class="ti-angle-right" style="font-size: 15px;">No. Telp:</span>
               <a style="color: #fff;">  +62 (411) 585365</a>
        </div>
      
    </footer>

      <!-- End footer -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php $noback = true; require 'component/scrollTop.php'; ?>

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