<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../component/things.php" ?>

    <link rel="stylesheet" href="https://unpkg.com/vue-qrcode-reader@1.3.1/dist/vue-qrcode-reader.css">

    <style>
        #preview {
            min-width: 30vw;
            min-height: 30vw;
            border: 1px solid black
        }

        .qrcode-stream__camera,
        .qrcode-stream__pause-frame {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            background-size: cover;
            max-width: inherit !important;
            max-height: inherit !important;
        }

        .qrcode-stream__inner-wrapper {
            position: inherit !important;
            max-width: inherit !important;
            max-height: inherit !important;
            z-index: inherit !important;
        }

        @media only screen and (max-width: 600px) {

            .qrcode-stream__camera,
            .qrcode-stream__pause-frame {
                right: -20vw;
            }
        }

        @media only screen and (max-width: 350px) {

            .qrcode-stream__camera,
            .qrcode-stream__pause-frame {
                right: -55vw;
            }
        }

        .overlay {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            margin-left: auto;
            margin-right: auto;
            background-size: cover;
            max-width: inherit !important;
            max-height: inherit !important;
            z-index: 1029;
        }

        .qrbutton {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        
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

.qrbutton{
    margin-bottom: 65px;
}
    </style>

    <title>Scan Kode QR</title>
</head>

<body>
    <?php include "../process/getLoginData.php" ?>
    <?php include "../component/user/sidebaropen.php" ?>

    <div id="app">
        <div class="overlay">
            <a href="qr.php" class="btn btn-lg qrbutton " style="border-radius: 0px; 
            background: #4B6ED4; color: #fff; border: 1px solid #fff; font-size: 12px;"><i class="fas fa-qrcode"></i> Kode QR Anda</a>
        </div>
        <qrcode-stream @decode="onDecode" :track="repaint" @init="onInit"></qrcode-stream>
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
<br><br>

    <?php include "../component/user/sidebarclose.php" ?>
    <?php include "../component/scripts.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.min.js"></script>
    <script src="https://unpkg.com/vue-qrcode-reader@1.3.1/dist/vue-qrcode-reader.browser.js"></script>

    <script>
        Vue.use(VueQrcodeReader)

        new Vue({
            el: '#app',

            data() {
                return {
                    url: '',
                    errorMessage: ''
                }
            },

            methods: {
                onDecode(content) {
                    if (content) {
                        if (isNaN(content)) {
                            this.url = `./pembayaran.php?qrid=${content}`
                        } else {
                            this.url = `./transfer.php?teleponuser=${content}`
                        }
                        
                        window.location.href = this.url
                    }
                },
                repaint(location, ctx) {
                    if (location !== null) {
                        const {
                            topLeftFinderPattern,
                            topRightFinderPattern,
                            bottomLeftFinderPattern
                        } = location

                        const pointArray = [
                            topLeftFinderPattern,
                            topRightFinderPattern,
                            bottomLeftFinderPattern
                        ]

                        ctx.fillStyle = '#2C3E50'

                        pointArray.forEach(({
                            x,
                            y
                        }) => {
                            ctx.fillRect(x - 220, y - 5, 25, 25)
                        })
                    }
                },
                onInit(promise) {
                    promise.then(() => {
                            console.log('Successfully initilized! Ready for scanning now!')
                        })
                        .catch(error => {
                            if (error.name === 'NotAllowedError') {
                                this.errorMessage = 'Hey! I need access to your camera'
                            } else if (error.name === 'NotFoundError') {
                                this.errorMessage = 'Do you even have a camera on your device?'
                            } else if (error.name === 'NotSupportedError') {
                                this.errorMessage = 'Seems like this page is served in non-secure context (HTTPS, localhost or file://)'
                            } else if (error.name === 'NotReadableError') {
                                this.errorMessage = 'Couldn\'t access your camera. Is it already in use?'
                            } else if (error.name === 'OverconstrainedError') {
                                this.errorMessage = 'Constraints don\'t match any installed camera. Did you asked for the front camera although there is none?'
                            } else {
                                this.errorMessage = 'UNKNOWN ERROR: ' + error.message
                            }

                            alert(this.errorMessage);
                        })
                }
            }
        })
    </script>
</body>

</html>