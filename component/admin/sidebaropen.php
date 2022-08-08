<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="https://popay.my.id/themify-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inder&display=swap" rel="stylesheet">

<style>
   .user-info {
        margin-left: 70px;
}

.indicator {
  width: 10px;
  height: 10px;
  display: inline-block;
  border-radius: 9999px;
  margin-right: 5px;
  margin-top: 20px;
}

  .profile-usertitle-status {
  text-transform: uppercase;
  color: #AAA;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px; }

  .label-success {
  background-color: #5cb85c;

}
.label-success[href]:hover,
.label-success[href]:focus {
  background-color: #449d44;
}

.navbar-nav{
    display:-webkit-box;
    display:-ms-flexbox;
    display:flex;
    -webkit-box-orient:vertical;
    -webkit-box-direction:normal;
    -ms-flex-direction:column;
    flex-direction:column;
    padding-left:0;
    margin-bottom:0;
    list-style:none;
    background: #4B6ED4;
}
.navbar-nav .nav-link{
    padding-right:0;
    padding-left:0
}

.navbar{
    position:fixed;
    display:-webkit-box;
    display:-ms-flexbox;
    display:flex;
    -ms-flex-wrap:wrap;
    flex-wrap:wrap;
    -webkit-box-align:center;
    -ms-flex-align:center;
    align-items:center;
    -webkit-box-pack:justify;
    -ms-flex-pack:justify;
    justify-content:space-between;
    padding:0.5rem 1rem;
    background-color: #E8E8EA;
}


.chiller-theme .sidebar-wrapper ul li:hover a i,
.chiller-theme
  .sidebar-wrapper
  .sidebar-dropdown
  .sidebar-submenu
  li
  a:hover:before,
.chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus + span,
.chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
  color: #FFFFFF;
  text-shadow: 0px 0px 10px #FFFFFF;
}

@import url('https://fonts.googleapis.com/css2?family=Carter+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Inder&display=swap');

h1 {
    font-family: 'Inder', sans-serif;
    font-size: 19px;
}
    </style>

<nav class="navbar hide-small fixed-top navbar-expand-sm navbar-dark navbar-fixed">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
        </li>
    </ul>
  <h1>  <a href="../aksi/logout.php" style="color: #202020;">
                <i class="ti-new-window" style="color: #202020;"></i> Logout</h1>
            </a>  &nbsp; &nbsp;
        <h1 style="color: #202020;"> | </h1> &nbsp;&nbsp;&nbsp;
    <h1>  <a class="navbar-brand" style="color: #202020;" href="home.php"><img src="../assets/icon-128.png" style=" border-radius: 30px; width: 50px; height: 50px;"
     alt=""> </a> </h1>
</nav> 

<div class="page-wrapper toggled chiller-theme">
    <a id="show-sidebar" style="background: #E8E8EA; border-radius: 0px;" class="btn btn-sm text-white" href="#">
        <i class="fas fa-bars" style="color: #000;"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper" style="background: #294365;">
        <div class="sidebar-content">
            <div class="sidebar-brand" id="close-sidebar">
               
                <div>
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="sidebar-header">
           <div class="user-info"><img src="../assets/admin.png" width="70" height="70" style="margin-left: -5px; border-radius: 30px;" class="d-inline-block align-top" alt=""></a>
               <br>  <br> <span class="user-name"><?=ucwords($data["nama"])?></span> 
               <div style="margin-top: -11px; margin-right: 19px;">   <span class="indicator label-success"></span> Online</div>
                </div> 
            </div>
            
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                       
                    </li>
                    <li>
                        <a href="home.php">
                            <i class="fas ti-home" style="font-size: 18px;"></i>
                            <span style="font-size: 18px;">Home</span>
                        </a>
                    </li>

                    
                    <li>
                  <a href="user.php">
                            <i class="fas ti-user" style="font-size: 18px;"></i>
                            <span style="font-size: 18px;">User</span>
                        </a>
                    </li>

                    <li>
                        <a href="donasi.php">
                            <i class="fas ti-hand-open" style="font-size: 18px;"></i>
                            <span style="font-size: 18px;">Donasi</span>
                        </a>
                    </li>

                  

                    <li>
                        <a href="transaksi.php">
                            <i class="fas ti-reload" style="font-size: 17px;"></i>
                            <span style="font-size: 17px;">Riwayat Transaksi User</span>
                        </a>
                    </li>

                    <li>
                        <a href="aktivitas.php">
                            <i class="fas ti-menu-alt" style="font-size: 18px;"></i>
                            <span style="font-size: 18px;">Aktivitas Admin</span>
                        </a>
                    </li>
                     
                </ul>
            </div>
            <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
        <div class="sidebar-footer">
           
            <a href="../aksi/logout.php">
                <i class="ti-new-window"></i>Logout
            </a>
        </div>
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content"> 
    <div class="container-fluid" id="mainbody">