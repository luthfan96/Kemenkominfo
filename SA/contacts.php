<!doctype html>

<?php
/*script ini berfungsi untuk cmengecek apakah user sudah login atau belum, jika sudah maka akan mengarah ke home.php
dan jika belum akan kembali ke login.php
*/

session_start();
$user = "root";
$pass = "";
$conn = new PDO('mysql:host=localhost;dbname=kominfo',$user,$pass);
if (isset($_SESSION['username']) == null){
  header ('Location: ../index.php');
} 
?>

<html>
<head>
    <meta charset="utf-8">
    <title>KOMINFO - Kementerian Komunikasi dan Informatika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link href="../Include/hpInclude/images/logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="../Include/hpInclude/css/style.css">
    <!-- Bonno - Responsive Multipurpose Template - v.1.0 -->
	
	
	<!--untuk setting pengetikan teks description -->
	<script src="../Include/ckeditor/ckeditor.js"></script>
	
</head>
<body>

<!-- WRAPPER -->
<div class="wrapper">

    <!-- HEADER -->
    <header class="header section">
        <div class="col span_2_of_12">
			<a href="../SA/index.php" class="logo">
				<img src="../Include/hpInclude/images/logo.png" alt="">
			</a>
		</div>
        <nav class="col span_10_of_12 aligned right">
            <ul class="mainmenu">
			
                <?php
				$username = $_SESSION['username'];
				
				$stmt = $conn -> prepare("SELECT * FROM user WHERE username = '$username'");
				$stmt -> execute();
				$row = $stmt->fetch();
				?>

				<li>
                    <a href="index.php">Beranda</a>
                </li>
                <li>
					<a href="../SA/contacts.php">Pesan</a>
				</li>
				<li>
					<a href="../processing/signout.php">Sign Out</a>
				</li>
			</ul>
        </nav>
    </header> <!-- /header -->

    <!-- Heading -->
    <div class="heading section">
        <h1><img src="../Include/hpInclude/images/ico-contact.png" alt=""> Pesan </h1>
        <hr>
    </div>
	
	<!-- tampilan dan tombol teks input utk disave ke database -->
	<div class='content-product' style="background: #9fc5e8; color:#0000cc; font-family: impact; font-size: 20px; border: 4px outset #3d85c6">
		<div class='col-md-12 contact-form'>
            <form action='../processing/kirim.php' method='post' enctype='multipart/form-data'>
				<div class='contact-in col-xs-12'>
				
				<div>
					<input type='hidden' name='id_pesan' />
				</div>
				<div>
					<input type='hidden' size='50px' name='nama' value='<?php echo $row['nama']; ?>' />
				</div>

				<div class='name-in'>
					<span>Subjek : </span>
					<input type='text' name='subjek' placeholder='Subjek'/ required>
				</div>
				<div>
					<input type='hidden' name='id_direktorat' value='<?php echo $row['id_direktorat']; ?>' />
				</div>
				<div class='col-xs-12'>
					<span>Isi Pesan : </span>
					<textarea name='isi_pesan' id='isi_pesan'>
					</textarea>
				</div>
				
				<div class='btn pull-left'>
					<input type="submit" name="send" value="Kirim" />
				</div>
				
			</form>
		<div class='clearfix'> </div>
	</div>
</div>

    <!-- CONTENT -->
	
    <!-- <div class="content"> -->

        <!-- section -->
		<!--
        <div class="section contact">
            <div class="col span_5_of_12">
                <h3 class="color">Bonno Company</h3>
                <h6>Branding &amp; Design</h6>
            </div>
            <div class="col span_3_of_12">
                <p>Le Meridien Piccadilly<br>
                    21 Piccadilly<br>
                    London W1J 0BH<br>
                    United Kingdom</p>
            </div>
            <div class="col span_4_of_12">
                <table>
                    <tr>
                        <th>Telephone</th>
                        <td>+44 20 7734 8000</td>
                    </tr>
                    <tr>
                        <th>Fax</th>
                        <td>+44 20 7734 8945</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><a href="mailto:info@bonno.com">info@bonno.com</a></td>
                    </tr>
                </table>
            </div>
        </div>
		-->
        <!-- /.section -->

        <!-- section: MAP -->
		<!--
        <div class="section map" id="map"></div>
        -->
		<!-- /#map -->

        <!-- section -->
		<!--
        <div class="section">
            <div class="col span_4_of_12">
                <h3>Contact form</h3>
                <p>Mellentesque habitant morbi tristique senectus et netus et malesuada famesac turpis egestas. Ut non enim eleifend felis pretium feugiat. Vivamus quis mi.
                </p>
            </div>
            <div class="col span_1_of_12">&nbsp;</div>
            <div class="col span_7_of_12">
                <form action="http://bonno.aisconverse.com/php/email.php" method="post" id="send-form">
                    <div class="formwrap">
                        <input type="text" name="name" id="send-form-name" placeholder="Name">
                        <input type="email" name="email" id="send-form-email" placeholder="Email">
                        <textarea name="message" placeholder="Message" id="send-form-message"></textarea>
                    </div>
                    <input type="submit" class="button" value="Send">
                    <div class="succs-msg">Мessage was sent</div>
                </form>
            </div>
        </div>
		-->
        <!-- /.section -->

    </div>
	<div class="fpadding cf"></div>

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
                <img src="../Include/hpinclude/images/proaktif_1.png" alt=""><!-- <li><a href="#"><i class=""></i></a></li> -->
                <img src="../Include/hpinclude/images/jujur_1.png" alt=""><li><a href="#"><i class=""></i></a></li>
                <img src="../Include/hpinclude/images/incakap_1.png" alt=""><!-- <li><a href="#"><i class=""></i></a></li> -->
                <img src="../Include/hpinclude/images/TRUST_1.jpg" alt=""><li><a href="#"><i class=""></i></a></li>
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
                <a href=" https://kominfo.go.id/profil "class="#" target="_blank">Profil</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                <a href="https://kominfo.go.id/faq" target="_blank">FAQ</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                <a href="https://kominfo.go.id/tautan" target="_blank">Tautan</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                <a href=" https://kominfo.go.id/peta "class="#" target="_blank">Peta Situs</a></li>
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

<script>
// Replace the <textarea id="isi_pesan"> with a CKEditor
// menggunakan mode CK editor standart secara default
CKEDITOR.replace( 'isi_pesan' );
</script>

<script src="../Include/hpInclude/js/jquery-2.1.0.min.js"></script>
<script src="../Include/hpInclude/js/jquery.plugins.js"></script>
<script src="../Include/hpInclude/js/custom.js"></script>

</body>
</html>