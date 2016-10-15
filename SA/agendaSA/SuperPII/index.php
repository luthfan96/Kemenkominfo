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
  header ('Location: ../../../index.php');
} 
?>

<!-- JS dan CSS untuk tabel input laporan Admin yang bersangkutan -->
<!-- jQuery -->   
    <script src="../../../Include/laporanInclude/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../../Include/laporanInclude/js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="../../../Include/laporanInclude/js/jquery.easing.min.js"></script>
    <script src="../../../Include/laporanInclude/js/scrolling-nav.js"></script>
    <!-- Bootstrap Core JavaScript -->
    
<!-- Bootstrap Core CSS -->
    <link href="../../../Include/laporanInclude/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../../Include/laporanInclude/css/modern-business.css" rel="stylesheet">
    <link href="../../../Include/laporanInclude/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../../Include/laporanInclude/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../Include/laporanInclude/css/templatemo-style.css" rel="stylesheet">
    <link href="../../../Include/laporanInclude/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../../Include/laporanInclude/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../../Include/laporanInclude/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="../../../Include/laporanInclude/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Table disini broh -->
    <link rel="stylesheet" href="../../../datatables/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../../../datatables/datatables/dataTables.bootstrap.css"/>
        <style>
            body{
                margin: 15px;
            }
            .pilih:hover{
                cursor: pointer;
            }
        </style>

<!-- JS dan CSS untuk tabel input laporan Admin yang bersangkutan -->


<html>
<head>
    <meta charset="utf-8">
    <title>KOMINFO - Kementerian Komunikasi dan Informatika</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link href="../../../Include/hpInclude/images/logo1.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="../../../Include/hpInclude/css/style.css">
    <!-- Bonno - Responsive Multipurpose Template - v.1.0 -->
</head>
<body>

<!-- WRAPPER -->
<div class="wrapper">

    <!-- HEADER -->
    <header class="header section">
        <div class="col span_2_of_12">
			<a href="../../../SA/index.php" class="logo">
				<img src="../../../Include/hpInclude/images/logo.png" alt="index.php">
			</a>
		</div>
        <nav class="col span_10_of_12 aligned right">
            <ul class="mainmenu">
                <li>
                    <a href="../../../SA/index.php">Beranda</a>
                </li>
                <li class="dropdown">
                    <a class='active'>Super Admin</a>
                </li>
                
                <li>
                    <a href="../../../SA/contacts.php">Pesan</a>
                </li>
				
				<li>
                    <a href="../../../processing/signout.php">Sign Out</a></li>
                </li>
            </ul>
        </nav>
    </header> <!-- /header -->

    <!-- Heading -->
    <div class="heading section">
        <h1><img src="" alt="">AGENDA</h1>
        <hr>
    </div>

    <!--- Tampilan Table Hasil Inputan Agenda By: Akbar dan Ranggih -->
    <div class="content section">
        
        <!-- Blog Roll -->
        <div class="blogroll">
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div id="1">
                                    <div class="panel-body">
                                        <div>
                                            <div class="form-group" style="padding:5px; overflow:auto; width:auto; border:1px solid grey">
                                                <div class="input-group">

        <!-- Blog Roll -->
        <div class="modal-dialog"; style="width:auto">
                <div class="modal-content"; style="auto">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><center>Lihat Agenda</center></h4>
                    </div>
                    <div class="modal-body">
                        <table id="lookup" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Pagu Anggaran</th>
                                    <th>Rencana Aksi</th>
                                    <th>Target Sasaran</th>
                                    <th>Tanggal</th>
                                    <th>Hasil Capaian</th>
                                    <th>Hambatan Real</th>
                                    <th>Solusi</th>
                                    <th>Data Dukung</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //Data mentah yang ditampilkan ke tabel    
                                mysql_connect('localhost', 'root', '');
                                mysql_select_db('kominfo');

                $id_us = 5;
                $i=1;
                $hey = $conn -> prepare("SELECT * FROM mtk_agenda WHERE id_user = '$id_us'");
                $hey -> execute();
                while($age = $hey->fetch())
                {
                                    ?>
                                    <tr class="pilih" data-kodeobat="<?php echo $r['id_induk']; ?>">
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><?php echo $age['nama_keg']; ?></td>
                                        <td><?php echo $age['pen_jwb']; ?></td>
                                        <td>Rp. <?php echo $age['pagu']; ?></td>
                  <td><?php echo $age['rencana_aksi']; ?></td>
                  <td><?php echo $age['tgt_sasar']; ?></td>
                  <td><?php echo $age['tanggal']; ?></td>
                  <td><?php echo $age['hasil_capai']; ?></td>
                  <td><?php echo $age['hambat_real']; ?></td>
                  <td><?php echo $age['solusi']; ?></td>
                  <td><?php echo $age['data_dukung']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            
        <script src="../../../datatables/js/jquery-1.11.2.min.js"></script>
        <script src="../../../datatables/bootstrap/js/bootstrap.js"></script>
        <script src="../../../datatables/datatables/jquery.dataTables.js"></script>
        <script src="../../../datatables/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript">


//            tabel lookup obat
            $(function () {
                $("#lookup").dataTable();
            });

        </script>
        <!-- /.blogroll -->
        <!-- Table -->
    </div>    

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
                <img src="../../../Include/hpInclude/images/proaktif_1.png" alt=""><!-- <li><a href="#"><i class=""></i></a></li> -->
                <img src="../../../Include/hpInclude/images/jujur_1.png" alt=""><li><a href="#"><i class=""></i></a></li>
                <img src="../../../Include/hpInclude/images/incakap_1.png" alt=""><!-- <li><a href="#"><i class=""></i></a></li> -->
                <img src="../../../Include/hpInclude/images/TRUST_1.jpg" alt=""><li><a href="#"><i class=""></i></a></li>
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


<script src="../../../Include/hpInclude/js/jquery.plugins.js"></script>
<script src="../../../Include/hpInclude/js/custom.js"></script>

</body>
</html>