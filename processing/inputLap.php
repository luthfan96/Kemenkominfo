<?php
	
	$conn = new PDO('mysql:host=localhost;dbname=kominfo','root','');
	
    if(isset($_POST["input"]))
	{
		$nama_keg = $_POST['nama_keg'];
		$bulan = $_POST['bulan'];
		$prog_ker = $_POST['prog_ker'];
		
		$instan_kait = $_POST['instan_kait'];
		$pen_jwb = $_POST['pen_jwb'];
		$rencana_aksi = $_POST['rencana_aksi'];
				
		$tind_aktiv = $_POST['tind_aktiv'];
		$tgt_sasar = $_POST['tgt_sasar'];
		$waktu_selesai = $_POST['waktu_selesai'];
				
		$urai_tgt = $_POST['urai_tgt'];
		$pagu = $_POST['pagu'];
		$tgt_serapan = $_POST['tgt_serapan'];
				
		$realisasi = $_POST['realisasi'];
		$persen_pagu = (float)(($realisasi/$pagu) * 100);
		$hasil_capai = $_POST['hasil_capai'];
				
		$persen_capai = $_POST['persen_capai'];
		$hambat_real = $_POST['hambat_real'];
		$solusi = $_POST['solusi'];
		$indik_krj = $_POST['indik_krj'];
				
		$ket = $_POST['ket'];
		$id_direktorat = $_POST['id_direktorat'];
		$id_user = $_POST['id_user'];
		
		$filedata = addslashes(fread( fopen($_FILES['data_dukung']['tmp_name'], 'r'),
		$_FILES['data_dukung']['size']) );
		$tipe  = $_FILES['data_dukung']['type'];
		$ukuran = $_FILES['data_dukung']['size'];
		$nama_file = $_FILES['data_dukung']['name'];
		
		$inp = "INSERT into mtk_induk values('NULL','$nama_keg','$bulan','$prog_ker','$instan_kait','$pen_jwb','$rencana_aksi','$tind_aktiv','$tgt_sasar','$waktu_selesai','$urai_tgt','$pagu','$tgt_serapan','$realisasi','$persen_pagu','$hasil_capai','$persen_capai','$hambat_real','$solusi','$indik_krj','$ket','$id_direktorat','$id_user')";
		$data = $conn->query($inp);
				
		$inp2 = "INSERT into mtk_ksp values('NULL','$instan_kait','$pen_jwb','$rencana_aksi','$tgt_sasar','$urai_tgt','$hasil_capai','$persen_capai','$ket','$id_direktorat')";
		$data = $conn->query($inp2);
					
		$inp3 = "INSERT into mtk_pk_rpjmn values('NULL','$tgt_sasar','$urai_tgt','$pagu','$tgt_serapan','$realisasi','$persen_pagu','$hasil_capai','$persen_capai','$indik_krj','$id_direktorat')";
		$data = $conn->query($inp3);

		$inp4 = "INSERT into mtk_post values('NULL','$tind_aktiv','$tgt_sasar','$pagu','$realisasi','$hasil_capai','$hambat_real','$solusi','$id_direktorat')";
		$data = $conn->query($inp4);
				
		$inp5 = "INSERT into mtk_menteri values('NULL','$tgt_sasar','$pen_jwb','$indik_krj','$waktu_selesai','$urai_tgt','$hasil_capai','$id_direktorat')";
		$data = $conn->query($inp5);
		
		if(is_object($data))
		{
			$inp6 = "INSERT into upload2 values ('NULL','$id_direktorat','$tipe','$filedata','$nama_file','$ukuran')";
			$conn->query($inp6);
			echo'
				<script language=javascript>
					going=window.alert ("Data Anda Sudah berhasil Tersimpan");
					window.location = "../adminDit/inputLaporan.php";
				</script>
			';
		}
		else
		{
			echo '
				<script language=javascript>
					going=window.alert ("Proses upload Error, Mohon Untuk Melakukan Input Ulang!");
					window.location = "../adminDit/inputLaporan.php";
				</script>
			';
		}
	}
?>