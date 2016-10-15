<!doctype html>
<?php
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
	<link rel="stylesheet" href="Include/hpInclude/css/style9.css">
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

    <!-- CONTENT -->
    
	<div class="content">
        <!-- section: ONESLIDER -->
        <div class="section oneslider">
            <ul data-auto="true" data-fx="crossfade">
                <li>
                    <a href="#">
                        <img src="Include/hpInclude/images/slide-1-1.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="Include/hpInclude/images/slide-2-1.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="Include/hpInclude/images/slide-3-1.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="Include/hpInclude/images/slide-4-1.jpg" alt="">
                    </a>
                </li>
				<div class="navbar">
					<a href="#" class="arrow prev"></a>
					<a href="#" class="arrow next"></a>
				</div>
            </ul>
           
        </div>
        <!-- /.slider -->
	
	<body>
    <table id="table-two-axis" class="two-axis bt">
    <thead>
      <tr>
        <th>Direktorat</th>
        <th>Anggaran</th>
        <th>Kinerja</th>
		<?php
                $hey = $conn -> prepare("SELECT DISTINCT a.id_direktorat, a.nama_direktorat, SUM(b.persen_capai) as persen_capai, SUM(b.realisasi) as realisasi, SUM(b.pagu) as pagu, SUM(b.tgt_serapan) as tgt_serapan, b.id_direktorat, COUNT(b.id_induk) as bagi FROM direktorat a, mtk_induk b WHERE a.id_direktorat = b.id_direktorat GROUP BY b.id_direktorat ORDER BY b.id_direktorat ASC");
                $hey -> execute();
                while($tampil = $hey->fetch())
                {
        ?>
      </tr>
	  <tr class="ganjil">
        <td align="left"><?php echo $tampil['nama_direktorat']; ?></td>

        <?php
                $a = $tampil['realisasi'] / $tampil['bagi'];                
                $b = $tampil['pagu'] / $tampil['bagi'];
                $c = $a / $b ;
                $d = $c * 100;
                $e = $tampil['tgt_serapan'] / $tampil['bagi'];
                $anggaran = $e-$d;

            //    $a = $tampil['realisasi'] / $tampil['pagu'] * 100;
            //    $b = $tampil['tgt_serapan'];
            //    $anggaran = $b-$a;
                $persen_capai = $tampil['persen_capai'] / $tampil['bagi'];
        ?>

		<td><img src="admindit/image/<?php
            if($anggaran <= 5){
                echo "hijau";
                
            }elseif($anggaran > 3 && $anggaran < 10){
                echo "kuning";
            }else{
                echo "merah";
            };
                    ?>.png"> <font size="1" color="blue"> <?php echo substr($anggaran,0,5); ?> % </font></td>

		<td><img src="admindit/image/<?php
            if($d >= 80){
                echo "hijau";
                
            }elseif($d <= 50){
                echo "merah";
            }else{
                echo "kuning";
            };
                    ?>.png"> <font size="1" color="blue"> <?php echo substr($persen_capai,0,5); ?> % </font>
                    &nbsp
        </td>
		
    </tr>
            <?php }  ?>
            <td><a>Keterangan </a><img src="admindit/image/hijau.png"> : Bagus &nbsp &nbsp<img src="admindit/image/kuning.png"> : Sedang &nbsp &nbsp<img src="admindit/image/merah.png"> : Buruk</td>
            <td></td>
            <td></td>
    </table>
        </div>
    </thead>
    </body>
        <!-- section: SERVICES -->
        <div class="section services aligned center">
            <div class="heading section"> 
	<h2>Our Services</h2>
                <hr>
            </div>
            <div class="col span_4_of_12">
                <h4>Logo Design</h4>
                <p class="fs18">Mellentesque habitant morbi tristique senectus et netus et malesuada famesac turpis egestas.</p>
            </div>
            <div class="col span_4_of_12">
                <h4>Graphic Design</h4>
                <p>Dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
            </div>
            <div class="col span_4_of_12">
                <h4>Typography</h4>
                <p class="fs18">Mellentesque habitant morbi tristique senectus et netus et malesuada famesac turpis egestas.</p>
            </div>
        </div>
	
	<!-- /.services -->
    </div>
    <!-- /.content -->

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
                <img src="Include/hpInclude/images/proaktif_1.png" alt=""><!-- <li><a href="#"><i class=""></i></a></li> -->
                <img src="Include/hpInclude/images/jujur_1.png" alt=""><li><a href="#"><i class=""></i></a></li>
                <img src="Include/hpInclude/images/incakap_1.png" alt=""><!-- <li><a href="#"><i class=""></i></a></li> -->
                <img src="Include/hpInclude/images/TRUST_1.jpg" alt=""><li><a href="#"><i class=""></i></a></li>
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

<script src="Include/hpInclude/js/jquery.11min.js"></script>
<script src="Include/hpInclude/js/jquery-2.1.0.min.js"></script>
<script src="Include/hpInclude/js/jquery.plugins.js"></script>
<script src="Include/hpInclude/js/custom.js"></script>
<script src="Include/hpInclude/js/index9.js"></script>

</script>
</body>
</html>
