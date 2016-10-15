<?php
	
	$conn = new PDO('mysql:host=localhost;dbname=kominfo','root','');
	
    if(isset($_POST["input"])){
		$nama_keg = $_POST['nama_keg'];			
		$pen_jwb = $_POST['pen_jwb'];
		$pagu = $_POST['pagu'];

		$rencana_aksi = $_POST['rencana_aksi'];
		$tgt_sasar = $_POST['tgt_sasar'];
		$tanggal = $_POST['tanggal'];
			
		$hasil_capai = $_POST['hasil_capai'];
		$hambat_real = $_POST['hambat_real'];
		$solusi = $_POST['solusi'];

		$id_direktorat = $_POST['id_direktorat'];
		$id_user = $_POST['id_user'];
		
		$filedata = addslashes(fread(fopen($_FILES['data_dukung']['tmp_name'], 'r'),
		$_FILES['data_dukung']['size']));
		$tipe  = $_FILES['data_dukung']['type'];
		$ukuran = $_FILES['data_dukung']['size'];
		$nama_file = $_FILES['data_dukung']['name'];
		
		$inp = "INSERT into mtk_agenda values('NULL','$nama_keg','$pen_jwb','$pagu','$rencana_aksi','$tgt_sasar','$tanggal','$hasil_capai','$hambat_real','$solusi','$id_direktorat','$id_user')";
		$data = $conn->query($inp);
		
		if(is_object($data))
		{	
			$inp2 = "INSERT into upload values ('NULL','$id_direktorat','$tipe','$filedata','$nama_file','$ukuran')";
			$conn->query($inp2);
			echo'
				<script language=javascript>
					going=window.alert ("Data Anda Sudah berhasil Tersimpan");
					window.location = "../adminDit/inputAgenda.php";
				</script>
			';
		}
		else
		{
			echo '
				<script language=javascript>
					going=window.alert ("Proses upload Error, Mohon Untuk Melakukan Input Ulang!");
					window.location = "../adminDit/inputAgenda.php";
				</script>
			';
		}
	}
?>