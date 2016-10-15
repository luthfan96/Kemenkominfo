<!doctype html>

<?php
/*script ini berfungsi untuk cmengecek apakah user sudah login atau belum, jika sudah maka akan mengarah ke home.php
dan jika belum akan kembali ke login.php
*/

session_start();
$user = "root";
$pass = "";
$conn = new PDO('mysql:host=localhost;dbname=kominfo',$user,$pass);
?>

<html>
<head>
    <meta charset="utf-8">
    <title>KOMINFO - Kementerian Komunikasi dan Informatika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link href="Include/hpInclude/images/logo1.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="Include/hpInclude/css/style.css">
    <!-- Bonno - Responsive Multipurpose Template - v.1.0 -->
</head>
<body>

<!-- WRAPPER -->
<div class="wrapper">

    <!-- HEADER -->
    <header class="header section">
        <div class="col span_2_of_12">
			<a href="index.php" class="logo">
				<img src="Include/hpInclude/images/logo.png" alt="">
			</a>
		</div>
        <nav class="col span_10_of_12 aligned right">
            <ul class="mainmenu">
                <li><a href="login.php">Sign In</a></li>
				<li>
					<a href="index2.php">Direktorat</a>
                </li>
            </ul>
        </nav>
    </header> <!-- /header -->

    <!-- Heading -->
    <div class="heading section">
        <h1><img src=""alt=""> Selamat Datang di E-Monev</h1>
 		<hr>
    </div>

        <!-- section: PORTFOLIO -->
        <div class="section portfolio">
            <div class="work">
                <img src="Include/hpInclude/images/sekret.png" alt="">
                <div class="mask">
                    <a href="SA/Supersekre.php">Sekretaris Ditjen Aptika</a>
                </div>
            </div>
            <div class="work">
                <img src="Include/hpInclude/images/e-goverment.png" alt="">
                <div class="mask">
                    <a href="SA/Supergover.php">e-Goverment</a>
                </div>
            </div>
            <div class="work">
                <img src="Include/hpInclude/images/e-business-01.jpg" alt="">
                <div class="mask">
                    <a href="SA/Superbuss.php">e-Business</a>
                </div>
            </div>

        </div>
		<!-- section: PORTFOLIO2 -->
		<div class="section portfolio2">
		<div class="work">
                <img src="Include/hpInclude/images/pemberdayaan informatika.jpg" alt="">
                <div class="mask">
                    <a href="SA/SuperPI.php">Pemberdayaan Informatika</a>
                </div>
            </div>
            <div class="work">
                <img src="Include/hpInclude/images/pemberdayaan industri informatika.png" alt="">
                <div class="mask">
                    <a href="SA/SuperPII.php">Pemberdayaan Industri Informatika</a>
                </div>
            </div>
            <div class="work">
                <img src="Include/hpInclude/images/secuarity.png" alt="">
                <div class="mask">
                    <a href="SA/uperKI.php">Keamanan Informasi</a>
                </div>
            </div>
		</div>
        <!-- /.portfolio -->

</div>
<!-- /.wrapper -->

<!-- FOOTER -->
<footer class="footer">

    <div class="container" style="margin-top:20px;">
    <div class="row">
        <div class="footer-entry col-md-4 col-sm-4 col-xs-12">
            <h3 class="title">&nbsp;</h3>
            <ul>
                <li style="margin-bottom:10px; margin-top:-32px;"><img src="https://kominfo.go.id/images/logo_footer.png" /></li>
                <li><i class="fa fa-map-marker" style="margin-right:10px; color:#55b8bf;"></i>
                        <a href="https://www.google.co.id/maps/place/Kementerian+Komunikasi+dan+Informatika/@-6.1757433,106.8226487,17z/data=!4m2!3m1!1s0x2e69f5d4940cce37:0xda9f1f20f2d3c433?hl=en" target="_blank">
                                Jl. Medan Merdeka Barat no. 9, Jakarta 10110
                        </a>
                </li>
                <li><i class="fa fa-phone" style="margin-right:10px; color:#55b8bf;"></i><a>(021) 3452841 </a></li>
                <li><i class="fa fa-envelope" style="margin-right:10px; color:#55b8bf;"></i>
                        <a href="mailto:humas@mail.kominfo.go.id">humas@mail.kominfo.go.id </a>
                </li>
            </ul>
        </div>
        <div class="footer-entry col-md-5 col-sm-5 col-xs-12">
            <ul class="social">
                <img src="Include/hpinclude/images/proaktif_1.png" alt=""><!-- <li><a href="#"><i class=""></i></a></li> -->
                <img src="Include/hpinclude/images/jujur_1.png" alt=""><li><a href="#"><i class=""></i></a></li>
                <img src="Include/hpinclude/images/incakap_1.png" alt=""><!-- <li><a href="#"><i class=""></i></a></li> -->
                <img src="Include/hpinclude/images/TRUST_1.jpg" alt=""><li><a href="#"><i class=""></i></a></li>
            </ul>
        </div>
        <div class="footer-entry col-md-3 col-sm-3 col-xs-12">
            <h3 class="title">MENTERI KOMINFO</h3>
            <ul>
                <a href="https://kominfo.go.id/profil" title=""><img src="https://kominfo.go.id/images/menteri.png" /></a>
            </ul>
        </div>
    </div>
</div>
<div style="background:#1d282b;">
  <div class="container">
    <div class="col-md-6 col-sm-6">
        <ul class="footer-menu">
            <li>
                <a href="https://kominfo.go.id/profil "class="#" target="_blank">Profil</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                <a href="https://kominfo.go.id/faq" target="_blank">FAQ</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                <a href="https://kominfo.go.id/tautan" target="_blank">Tautan</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                <a href="https://kominfo.go.id/peta "class="#" target="_blank">Peta Situs</a></li>
        </ul>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="copyright">Hak Cipta © 2016 Kementerian Komunikasi dan Informatika RI</div>
    </div>
  </div>
</div>

</footer>
<!-- /.footer -->

<!-- Preloader -->
<div id="preloader"><div id="status">&nbsp;</div></div>

<script src="Include/hpInclude/js/jquery-2.1.0.min.js"></script>
<script src="Include/hpInclude/js/jquery.plugins.js"></script>
<script src="Include/hpInclude/js/custom.js"></script>

</body>
</html>