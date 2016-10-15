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
    <!-- Custom Fonts -->
    <link href="../Include/laporanInclude/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- tabelnya disini broh -->
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
	
	<link rel="stylesheet" href="../Include/includeDataTable/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="../Include/includeDataTable/datatables/dataTables.bootstrap.css"/>
    <style>
        body{
            margin: 15px;
        }
        .pilih:hover{
            cursor: pointer;
        }
    </style>
	
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
        <h1><img src="" alt="">LAPORAN</h1>
        <hr>
    </div>
	
    <!-- CONTENT -->
	<!--- Tampilan Table Hasil Inputan Agenda -->
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
													<!-- ini modal tabledata nya js dan css sudah tertera -->
													<div class="modal-dialog" style="width:auto" >
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
																			<th>Bulan</th>
																			<th>Program Kerja</th>
																			<th>Instansi Terkait</th>
																			<th>Penanggung Jawab</th>
																			<th>Rencana Aksi</th>
																			<th>Tindakan Aktif</th>
																			<th>Target Sasaran</th>
																			<th>Waktu Kegiatan Selesai</th>
																			<th>Target Uraian</th>
																			<th>Pagu</th>
																			<th>Target Serapan</th>
																			<th>Realisasi Anggaran</th>
																			<th>Persen Pagu</th>
																			<th>Hasil Capaian</th>
																			<th>Persen Capaian</th>
																			<th>Hambatan Realisasi</th>
																			<th>Solusi</th>
																			<th>Indikator Kerja</th>
																			<th>Keterangan</th>
																			<th>Data Pendukung</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php
																			/*
																			$username = $_SESSION['username'];
																
																			$id_dir = $conn -> prepare("SELECT id_direktorat FROM user WHERE username = '$username'");
																			$id_dir -> execute();
																			$tampil = $id_dir->fetch();
																				
																			$id_direk = $tampil['id_direktorat'];
																			$i=1;
																			$a = $conn -> prepare("SELECT * FROM mtk_induk WHERE id_direktorat = '$id_direk'");
																			$a -> execute();
																			
																		$user	=	"root";
																		$pass	=	"";
																		$conn=new PDO('mysql:host=localhost;dbname=kominfo',$user,$pass);
																		$username = $_SESSION['username'];
														
																		$id_user = $conn -> prepare("SELECT id_user, id_direktorat FROM user WHERE username = '$username'");
																		$id_user -> execute();
																		$tampil = $id_user->fetch();
																		
																		$id_us = $tampil['id_user'];
																		$id_dir = $tampil['id_direktorat'];
																		
																		$hey = $conn -> prepare("SELECT * FROM mtk_agenda WHERE id_user = '$id_us'");
																		$hey -> execute();
																		
																		$stmt = $conn -> prepare("SELECT * FROM upload where id_direktorat='$id_dir'");
																		$stmt -> execute();
																		*/
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
																		$hey = $conn -> prepare("SELECT a.nama_keg, a.bulan, a.prog_ker, a.instan_kait, a.pen_jwb,
																		a.rencana_aksi, a.tind_aktiv, a.tgt_sasar, a.waktu_selesai, a.urai_tgt, a.pagu, a.tgt_serapan,
																		a.realisasi, a.persen_pagu, a.hasil_capai, a.persen_capai, a.hambat_real, a.solusi, a.indik_krj,
																		a.ket, b.id
																		FROM mtk_induk a INNER JOIN upload2 b ON a.id_direktorat = b.id_direktorat
																		WHERE a.id_direktorat = '$id_dir' AND b.id_direktorat = '$id_dir'
																		GROUP BY b.id");
																		$hey -> execute();

																		while($age = $hey->fetch())
																		{        
																		?>
																			<tr>
																				<th scope="row"><?php echo $i++; ?></th>
																				<td><?php echo $age['nama_keg']; ?></td>
																				<td><?php echo $age['bulan']; ?></td>
																				<td><?php echo $age['prog_ker']; ?></td>
																				<td><?php echo $age['instan_kait']; ?></td>
																				<td><?php echo $age['pen_jwb']; ?></td>
																				<td><?php echo $age['rencana_aksi']; ?></td>
																				<td><?php echo $age['tind_aktiv']; ?></td>
																				<td><?php echo $age['tgt_sasar']; ?></td>
																				<td><?php echo $age['waktu_selesai']; ?></td>
																				<td><?php echo $age['urai_tgt']; ?></td>
																				<td>Rp. <?php echo $age['pagu']; ?></td>
																				<td><?php echo $age['tgt_serapan']; ?>%</td>
																				<td>Rp. <?php echo $age['realisasi']; ?></td>
																				<td><?php echo $age['persen_pagu']; ?>%</td>
																				<td><?php echo $age['hasil_capai']; ?></td>
																				<td><?php echo $age['persen_capai']; ?>%</td>
																				<td><?php echo $age['hambat_real']; ?></td>
																				<td><?php echo $age['solusi']; ?></td>
																				<td><?php echo $age['indik_krj']; ?></td>
																				<td><?php echo $age['ket']; ?></td>
																				<td><a href="download2.php?id=<?php echo $age['id']; ?>">Download</a></td>
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
		
	<!-- Heading -->
    <div class="heading section">
        <h1><img src="" alt=""> INPUT LAPORAN</h1>
        <hr>
    </div>
	
        <!-- Blog Roll -->
        <div class="blogroll">
			<div class="row"> 
				<div class="col-lg-12">
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Input Laporan Direktorat</a>
									<div class="">									
										<form action="../processing/inputLap.php" class="templatemo-login-form" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<div class="input-group">
													<div class="">
														<i class="fa fa-edit fa-fw"></i><label>Nama Kegiatan</label>
													</div>
													<input required="required" name="nama_keg" type="text" class="form-control" placeholder="Nama Kegiatan" size="100">
													</input>
												</div>    
											</div>
									</div>
								</h4>
							</div>
							<div id="1">
								<div class="panel-body">
									<div>
											<div class="form-group" style="padding:20px; overflow:auto; width:1285px; border:1px solid grey">
												<div class="input-group">	
													<table border="1" style="width:100%; height:250px" >
													<tr>
														<td align = "center">Laporan Bulanan</td>
														<td align = "center">Program Kerja</td>
														<td align = "center">Instansi Terkait</td>
														<td align = "center">Penanggung Jawab</td>
														<td align = "center">Rencana Aksi</td>
														<td align = "center">Tindakan Aktivitas</td>
														<td align = "center">Target Sasaran</td>
														<td align = "center">Target Waktu Penyelesaian</td>
														<td align = "center">Target Uraian</td>
														<td align = "center">Pagu Anggaran</td>
														<td align = "center">Target Serapan</td>
														<td align = "center">Realisasi</td>
														<td align = "center">Hasil Capaian</td>
														<td align = "center">Persentase Perkiraan Capaian</td>
														<td align = "center">Hambatan Realisasi</td>
														<td align = "center">Solusi</td>
														<td align = "center">Indikator Kerja</td>
														<td align = "center">Keterangan</td>
														<td align = "center">Data Pendukung</td>
													</tr>
													<tr>
														<td>
															<select style="width: 100px" name="bulan"> 
																<option value="Januari">Januari</option>
																<option value="Februari">Februari</option>
																<option value="Maret">Maret</option>
																<option value="April">April</option>
																<option value="Mei">Mei</option>
																<option value="Juni">Juni</option>
																<option value="Juli">Juli</option>
																<option value="Agustus">Agustus</option>
																<option value="September">September</option>
																<option value="Oktober">Oktober</option>
																<option value="November">November</option>
																<option value="Desember">Desember</option>
															</select>
														</td>
														
														<td>
															<textarea style="width: 300px; height: 150px"  required="required"  name="prog_ker" class="form-control" size="12">
															</textarea>
														</td>
														
														<td>
															<textarea style="width: 300px; height: 150px"  required="required"  name="instan_kait" class="form-control" size="12">
															</textarea>
														</td>
														
														<td>
															<textarea style="width: 300px; height: 150px"  required="required"  name="pen_jwb" class="form-control" size="12">
															</textarea>
														</td>
														
														<td>
															<textarea style="width: 300px; height: 150px"  required="required"  name="rencana_aksi" class="form-control" size="12">
															</textarea>
														</td>
														
														<td>
															<textarea style="width: 300px; height: 150px"  required="required"  name="tind_aktiv" class="form-control" size="12">
															</textarea>
														</td>
														
														<td>
															<textarea style="width: 300px; height: 150px"  required="required"  name="tgt_sasar" class="form-control" size="12">
															</textarea>
														</td>
														
														<td>
															<input required="required" type="date" name="waktu_selesai" class="form-control">
															</input>
														</td>
														
														<!--
														<td>
															<button type="button" class="btn btn-warning btn-sm">
																<span class="fa fa-edit"></span> Edit
															</button>
															<button type="button" class="btn btn-danger btn-sm">
																<span class="glyphicon glyphicon-remove"></span> Hapus
															</button>
														</td>
														-->
														
														<td>
															<textarea style="width: 300px; height: 150px"  required="required"  name="urai_tgt" class="form-control" size="12">
															</textarea>
														</td>
														
														<td>
															<input style="width: 150px" required="required" type="number" name="pagu" class="form-control">
															</input>
														</td>
														
														<td>
															<input style="width: 150px" type="number"  required="required"  name="tgt_serapan" class="form-control" size="12">
															</input>
														</td>
														
														<td>
															<input style="width: 150px" type="number" required="required"  name="realisasi" class="form-control">
															</input>
														</td>
														
														<td>
															<textarea style="width: 300px; height: 150px"  required="required"  name="hasil_capai" class="form-control" size="12">
															</textarea>
														</td>
														
														<td>
															<input type="number" style="width: 150px"  required="required"  name="persen_capai" class="form-control">
															</input>
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
															<textarea style="width: 300px; height: 150px"  required="required"  name="indik_krj" class="form-control" size="12">
															</textarea>
														</td>
														
														<td>
															<textarea style="width: 300px; height: 150px"  required="required"  name="ket" class="form-control" size="12">
															</textarea>
														</td>
														
														<td>
															<input type="file" style="width: 200px" name="data_dukung" class="form-control">
															</input>
														</td>
                                                        <td>
                                                            <input type="hidden" name="id_direktorat" value="<?php 
                                                                $id_dir = $conn -> prepare("SELECT * FROM user where username ='$username'");
                                                                $id_dir -> execute();
                                                                $nama = $id_dir->fetch();
                                                                echo $nama['id_direktorat']; ?>" class="form-control">
                                                            </input>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="id_user" value="<?php 
                                                                $id_user = $conn -> prepare("SELECT id_user FROM user where username='$username'");
                                                                $id_user -> execute();
                                                                $data = $id_user->fetch();
                                                                echo $data['id_user']; ?>" class="form-control">
                                                            </input>
                                                        </td>
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

<script src="../Include/includeDataTable/js/jquery-1.11.2.min.js"></script>
<script src="../Include/includeDataTable/bootstrap/js/bootstrap.js"></script>
<script src="../Include/includeDataTable/datatables/jquery.dataTables.js"></script>
<script src="../Include/includeDataTable/datatables/dataTables.bootstrap.js"></script>
    
<script type="text/javascript">
//tabel lookup
    $(function () {
        $("#lookup").dataTable();
        });
</script>

<script src="../Include/hpInclude/js/jquery.plugins.js"></script>
<script src="../Include/hpInclude/js/custom.js"></script>

</body>
</html>