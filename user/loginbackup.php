<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico"/>
    <link rel="stylesheet" href="../styles/landing.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://popay.my.id/themify-icons.css" rel="stylesheet">

    <title>Login User</title>

    <style>
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

    <?php include "../process/redirectLoggedUser.php" ?>

    <nav class="navbar fixed-top white navbar-expand-lg navbar-light" style="background-color: #4B6ED4;">
        <a class="navbar-brand" href="#"> <img src="../assets/pnup.png" width="30" height="50" class="d-inline-block align-top" alt=""></a>
        <div style="color: #ffffff; font-size: 23px;">POPAY</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                 <a class="nav-link pointer" href="../index.php" style="color: #ffffff; font-size: 20px;">Daftar User</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link pointer" href="../index.php" style="color: #ffffff; font-size: 20px;">Tentang</a></div> 
                </li>
            </ul>
        </div>
    </nav>

    <center>
        <div class="container"><br><br><br><br><br>

        <div style="background-color: #0B0B61; border-radius: 5px; border: 2px solid #0B0B61; padding: 5px; color: #fff;">
<marquee scrollamount="7" onmouseover="this.stop()" onmouseout="this.start()" width="100%">Selamat datang - Pastikan selalu keamanan data Anda kapan pun dan di mana pun - Jangan serahkan data Anda ke orang lain - Pastikan data Anda aman dan terlindungi.</marquee>
</div>
<br><br>
        <h2 class="font-weight-light" style=" background-color: #4B6ED4; color: #fff;">
                <i class="fas fa-user" aria-hidden="true"></i> Login User</h2>

            <div class="login">
                <form action="../aksi/login_user.php" method="POST">
                    <div class="form-group">
                        <label for="useremail">Email:</label>
                        <input type="email" style="border-radius: 0px; border: 1px solid #070707;" name="useremail" class="form-control" id="useremail" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="userpass">Password:</label>
                        <input type="password" style="border-radius: 0px; border: 1px solid #070707;" name="userpass" class="form-control" id="userpass" placeholder="Password">
                    </div>

                    <div class="right-left">
                        <div>
                            <button type="submit" class="btn btn-success" style="border-radius: 0px; 
                            background: #4B6ED4; width: 200px; border: 1px solid #4B6ED4;">Login</button>                                
                        </div><br><br>
                        <div>
                            <a href="../" class="btn btn-primary" style="border-radius: 0px; 
                            background: #0B0B61; width: 200px; border: 1px solid #0B0B61; margin-left: 5px;">Kembali ke home</a>
                        </div>
                    </div>
                    
                    <!-- </div> -->
                </form>
            </div>
        </div>
    </center>
<br><br><br>
          <!-- Footer -->
          <footer class="page-footer font-small blue pt-4" style="background: #4B6ED4;">
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

</body>

</html> 