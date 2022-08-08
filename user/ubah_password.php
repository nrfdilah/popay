<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>
    <title>Ubah Password</title>

<style>

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
    <div class="card">
        <div class="card-body">
            <form action="../aksi/ubah_password.php" method="post" class="validatedForm">
                <div class="form-group">
                    <label for="old_password">Password saat ini:</label>
                    <input type="password" style="border-radius: 0px; border: 1px solid #000;" name="old_password" id="old_password" class="form-control mb-1">
                </div>

                <div class="form-group">
                    <label for="new_password">Password baru:</label>
                    <input type="password" style="border-radius: 0px; border: 1px solid #000;" name="new_password" id="new_password" class="form-control mb-1">
                </div>

                <div class="form-group">
                    <label for="new_password_confirm">Konfirmasi password baru:</label>
                    <input type="password" style="border-radius: 0px; border: 1px solid #000;" name="new_password_confirm" id="new_password_confirm" class="form-control mb-1">
                </div>

                <input type="hidden" name="id" value="<?=$data["id"]?>">

              <center>  <input type="submit" class="btn" style="border-radius: 0px; border: 1px #4B6ED4; background: #4B6ED4; color: #fff; border-radius: 30px;" value="Ubah password">
            </form>
        </div>
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

    <?php include "../component/user/sidebarclose.php" ?>
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