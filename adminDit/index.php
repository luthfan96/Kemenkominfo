<!doctype html>

<?php
/*script ini berfungsi untuk mengecek apakah user sudah login atau belum, jika sudah maka akan mengarah ke home.php
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
    <link href="../Include/hpInclude/images/kominfo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="../Include/hpInclude/css/style.css">
    <!-- Bonno - Responsive Multipurpose Template - v.1.0 -->
</head>
<body>

<!-- WRAPPER -->
<div class="wrapper">

    <!-- HEADER -->
    <header class="header section">
        <div class="col span_2_of_12">
			<a href="index.php" class="logo">
				<img src="../Include/hpInclude/images/logo.png" alt="index.php">
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
				
                <li class="dropdown">
					<a class='active'><?php echo $row['nama'];?></a>
					<ul>
						<li><a href="../adminDit/inputAgenda.php">Input Agenda</a></li>
						<li><a href="../adminDit/inputLaporan.php">Input Laporan</a></li>
                    </ul>
                </li>
				
                <li>
					<a href="../adminDit/contacts.php">Pesan</a>
				</li>
				<li>
					<a href="../processing/signout.php">Sign Out</a>
				</li>
        </nav>
    </header> <!-- /header -->

    <!-- Heading -->
    <div class="heading section">
        <h1><img src="" alt=""> Selamat Datang Admin Direktorat</h1>
        <hr>
        <div class="input-group">
                                                    <!-- ini modal tabledata nya js dan css sudah tertera -->
                                                    <div class="modal-dialog" style="width:1200px" >
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">Lihat Laporan</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table id="lookup" class="table table-bordered table-hover table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Nama Kegiatan</th>
                                                                            <th>Anggaran</th>
                                                                            <th>Kinerja</th>
                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            $username = $_SESSION['username'];
                                                                
                                                                            $id_dir = $conn -> prepare("SELECT id_direktorat FROM user WHERE username = '$username'");
                                                                            $id_dir -> execute();
                                                                            $tampil = $id_dir->fetch();
                                                                                
                                                                            $id_direk = $tampil['id_direktorat'];
                                                                            $i=1;
                                                                            $mtk_induk = $conn -> prepare("SELECT * FROM mtk_induk WHERE id_direktorat = '$id_direk'");
                                                                            $mtk_induk -> execute();
                                                                            while($hello = $mtk_induk->fetch())
                                                                            {
                                                                        ?>
                                                                            <tr>
                                                                                <th scope="row"><?php echo $i++;
                                                                                    $a = $hello['realisasi'];
                                                                                    $b = $hello['pagu'];

                                                                                    $ab = $a * 100;
                                                                                    $c = $hello['tgt_serapan'];
                                                                                    $anggaran = $c-$ab;
                                                                        ?>    

                                                                        </th>
                                                                                <td><?php echo $hello['nama_keg']; ?></td>
                                                                                <td><?php echo $anggaran; ?></td>
                                                                                <td><img src="../admindit/image/<?php
            if($anggaran <= 5){
                echo "hijau";
            }elseif($anggaran > 3 && $anggaran < 10){
                echo "kuning";
            }else{
                echo "merah";
            };
                    ?>.png"> <font size="1" color="blue"> <?php echo substr($anggaran,0,5); ?> % </font> <img src="../admindit/image/<?php
            if($anggaran >= 80){
                echo "hijau";
                
            }elseif($anggaran > 50 && $anggaran < 80){
                echo "kuning";
            }else{
                echo "merah";
            };
                    ?>.png"> <font size="1" color="blue"> <?php echo substr($hello['persen_capai'],0,5); ?> % </font>
                    &nbsp

        </td>
    </tr>
            <?php }  ?>
                                                                            </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div><table><img src="../admindit/image/hijau.png"> : Bagus &nbsp &nbsp<img src="../admindit/image/kuning.png"> : Sedang &nbsp &nbsp<img src="../admindit/image/merah.png"> : Buruk</table>
                                                        </div>
                                                    </div>
                                                </div>

        <script src="../datatables/js/jquery-1.11.2.min.js"></script>
        <script src="../datatables/bootstrap/js/bootstrap.js"></script>
        <script src="../datatables/datatables/jquery.dataTables.js"></script>
        <script src="../datatables/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">

//tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });
        </script>
    </div>

    <!-- CONTENT -->
    <div class="content section">

        <!-- Blog Roll -->
         <div class="blogroll">
		 <div class="col span_3_of_12">
			
			</div>
            <div class="col span_3_of_12">
                <a href="../adminDit/inputAgenda.php" class="img">
                    <figure class="circle"><img src="../Include/hpInclude/images/agenda2.png" alt=""></figure>
                    <div>
                        <ul>
                          <li class="comms">Agenda</li>						  
                        </ul>
                    </div>
                </a>
                <h4><a href="../adminDit/inputAgenda.php">Input Agenda</a></h4>
                <nav class="categories">
                </nav>
                
            </div>
			
            <div class="col span_3_of_12">
                <a href="../adminDit/inputLaporan.php" class="img">
                    <figure class="circle"><img src="../Include/hpInclude/images/laporan1.png" alt=""></figure>
                    <div>
                        <ul>
                            <li class="comms">Laporan</li>
                         </ul>
                    </div>
                </a>
                <h4><a href="../adminDit/inputLaporan.php">Input Laporan</a></h4>
                <nav class="categories">
                </nav>
               
            </div>

        </div>
        <!-- /.blogroll -->

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
                <img src="../Include/hpInclude/images/proaktif_1.png" alt=""><!-- <li><a href="#"><i class=""></i></a></li> -->
                <img src="../Include/hpInclude/images/jujur_1.png" alt=""><li><a href="#"><i class=""></i></a></li>
                <img src="../Include/hpInclude/images/incakap_1.png" alt=""><!-- <li><a href="#"><i class=""></i></a></li> -->
                <img src="../Include/hpInclude/images/TRUST_1.jpg" alt=""><li><a href="#"><i class=""></i></a></li>
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

<script src="../Include/hpInclude/js/jquery-2.1.0.min.js"></script>
<script src="../Include/hpInclude/js/jquery.plugins.js"></script>
<script src="../Include/hpInclude/js/custom.js"></script>
</script>
</body>
</html>