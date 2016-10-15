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

<!-- JS dan CSS untuk tabel input laporan Admin yang bersangkutan -->
<!-- jQuery -->   
    <script src="../Include/laporanInclude/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../Include/laporanInclude/js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="../Include/laporanInclude/js/jquery.easing.min.js"></script>
    <script src="../Include/laporanInclude/js/scrolling-nav.js"></script>
    <!-- Bootstrap Core JavaScript -->
    
<!-- Bootstrap Core CSS -->
    <link href="../Include/laporanInclude/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../Include/laporanInclude/css/modern-business.css" rel="stylesheet">
    <link href="../Include/laporanInclude/css/font-awesome.min.css" rel="stylesheet">
    <link href="../Include/laporanInclude/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Include/laporanInclude/css/templatemo-style.css" rel="stylesheet">
    <link href="../Include/laporanInclude/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../Include/laporanInclude/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../Include/laporanInclude/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Table disini broh -->
    <link rel="stylesheet" href="../datatables/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../datatables/datatables/dataTables.bootstrap.css"/>
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
    <link href="../Include/hpInclude/images/logo1.png" rel="shortcut icon" type="image/x-icon">
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
                                $user	=	"root";
								$pass	=	"";
								$conn=new PDO('mysql:host=localhost;dbname=kominfo',$user,$pass);
								$username = $_SESSION['username'];
                
								$datas = $conn -> prepare("SELECT id_user,id_direktorat FROM user WHERE username = '$username'");
								$datas -> execute();
								$tampil = $datas->fetch();
								
								$id_us = $tampil['id_user'];
								$id_dir = $tampil['id_direktorat'];
								
								$i = 1;
								$hey = $conn -> prepare("SELECT a.nama_keg, a.pen_jwb, a.pagu, a.rencana_aksi, a.tgt_sasar, a.tanggal, a.hasil_capai, a.hambat_real, a.solusi, b.id
								FROM mtk_agenda a INNER JOIN upload b ON a.id_direktorat = b.id_direktorat
								WHERE a.id_direktorat = '$id_dir' AND b.id_direktorat = '$id_dir'
								GROUP BY b.id");
								$hey -> execute();
								
								while($age = $hey->fetch())
								{
                                    ?>
                                    <tr class="pilih">
										<td><?php echo $i++; ?></th>
										<td><?php echo $age['nama_keg']; ?></td>
										<td><?php echo $age['pen_jwb']; ?></td>
										<td>Rp. <?php echo $age['pagu']; ?></td>
										<td><?php echo $age['rencana_aksi']; ?></td>
										<td><?php echo $age['tgt_sasar']; ?></td>
										<td><?php echo $age['tanggal']; ?></td>
										<td><?php echo $age['hasil_capai']; ?></td>
										<td><?php echo $age['hambat_real']; ?></td>
										<td><?php echo $age['solusi']; ?></td>
										<td><a href="download.php?id=<?php echo $age['id']; ?>">Download</a></td>
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
    </div>    


    <div class="content section">
    <div class="heading section">
        <h1><img src="" alt="">INPUT AGENDA</h1>
        <hr>
    </div>

    <!-- CONTENT -->
    <div class="content section">
        <!-- Blog Roll -->
        <div class="blogroll">
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Input Agenda</a>
                                    <div class="">
                                        
                                        <form action="../processing/inputAge.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="">
                                                        <i class="fa fa-edit fa-fw"></i><label>Nama Kegiatan</label>
                                                    </div>
                                                    <input required="required" name="nama_keg" type="text" class="form-control" placeholder="Nama Kegiatan" size="100">
                                                    </input>
                                                </div>
                                                <div class="input-group">
                                                    <div class="">
                                                        <i class="fa fa-edit fa-fw"></i><label>Penanggung Jawab</label>
                                                    </div>
                                                    <input required="required" name="pen_jwb" type="text" class="form-control" placeholder="Penanggung Jawab" size="70">
                                                    </input>
                                                </div>
                                                <div class="input-group">
                                                    <div class="">
                                                        <i class="fa fa-edit fa-fw"></i><label>Pagu Anggaran</label>
                                                    </div>
                                                    <input required="required" name="pagu" type="number" class="form-control" placeholder="Rp ....">
                                                    </input>
                                                </div>    
                                            </div>
										</div>
                                </h4>
                            </div>
                            <div id="1">
                                <div class="panel-body">
                                    <div>
                                        <!--
                                        <section id="" class="intro-section">
                                        </section>
                                        -->
                                            
                                            <div class="form-group" style="padding:20px; overflow:auto; width:1055px; border:1px solid grey">
                                                <div class="input-group">   
                                                    <table border="1" style="width:100%; height:250px" >
                                                    <tr>
                                                        <td align = "center">Rencana Aksi</td>
                                                        <td align = "center">Target Sasaran</td>
                                                        <td align = "center">Tanggal</td>
                                                        <td align = "center">Hasil Capaian</td>
                                                        <td align = "center">Hambatan Real</td>
                                                        <td align = "center">Solusi</td>
                                                        <td align = "center">Data Dukung</td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <textarea style="width: 300px; height: 150px"  required="required"  name="rencana_aksi" class="form-control" size="12">
                                                            </textarea>
                                                        </td>
                                                        
                                                        <td>
                                                            <textarea style="width: 300px; height: 150px"  required="required"  name="tgt_sasar" class="form-control" size="12">
                                                            </textarea>
                                                        </td>
                                                        
                                                        <td> 
                                                            <input required="required" type="date" name="tanggal" class="form-control">
                                                            </input> 
                                                        </td>
                                                        
                                                        <td>
                                                            <textarea style="width: 300px; height: 150px"  required="required"  name="hasil_capai" class="form-control" size="12">
                                                            </textarea>
                                                        </td>

                                                        <td>
                                                            <textarea style="width: 300px; height: 150px"  required="required"  name="hambat_real" class="form-control" size="12">
                                                            </textarea>
                                                        </td>

                                                        <td>
                                                            <textarea style="width: 300px; height: 150px"  required="required"  name="solusi" class="form-control" size="12">
                                                            </textarea>
                                                        </td>

                                                        <td>
                                                            <input type="file" style="width: 200px" name="data_dukung" class="form-control">
                                                            </input>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" style="width: 200px" name="id_direktorat" value="<?php 
                                                                $id_dir = $conn -> prepare("SELECT id_direktorat FROM user where username ='$username'");
                                                                $id_dir -> execute();
                                                                $dir = $id_dir->fetch();
                                                                echo $dir['id_direktorat']; ?>" class="form-control">
                                                            </input>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" style="width: 200px" name="id_user" value="<?php 
                                                                $id_user = $conn -> prepare("SELECT id_user FROM user where username='$username'");
                                                                $id_user -> execute();
                                                                $data = $id_user->fetch();
                                                                echo $data['id_user']; ?>" class="form-control">
                                                            </input>
                                                        </td>
                                                        <!--
                                                        <td>
                                                            <input type="hidden" style="width: 200px" name="id_direktorat" value="<?php $row['id_direktorat'];?>" class="form-control">
                                                            </input>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" style="width: 200px" name="id_user" value="<?php $row['id_user'];?>" class="form-control">
                                                            </input>
                                                        </td>
                                                        -->
                                                    </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group">
												<!--<button type="submit" name="input" class="templatemo-blue-button width-20" style="background-color:#66AF33">
													Submit
												</button>-->
												
												<!--Link Yang akan memanggil Popup/Modal--> 
												<a href="#" data-toggle="modal" data-target="#contact" class="btn btn-lg btn-primary">Simpan</a> 
												<!--Sisipkan File (Isi Modal) yang ada di Folder include-->
													<?php include 'dialog.php';?>
													
											</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
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

<script src="../datatables/js/jquery-1.11.2.min.js"></script>
<script src="../datatables/bootstrap/js/bootstrap.js"></script>
<script src="../datatables/datatables/jquery.dataTables.js"></script>
<script src="../datatables/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript">

//tabel lookup
$(function () {
    $("#lookup").dataTable();
});
</script>
<!-- /.blogroll -->
<!-- Table -->

<script src="../Include/hpInclude/js/jquery.plugins.js"></script>
<script src="../Include/hpInclude/js/custom.js"></script>

</body>
</html>