<?php
session_start();
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik
if(isset($_POST['id_direktorat'])){
	
	//inlcude atau memasukkan file koneksi ke database
	$username = "root";
	$password = "";
	$conn = new PDO('mysql:host=localhost;dbname=kominfo',$username,$password);
	//include('db.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id_pesan	= $_POST['id_pesan'];
	$nama		= $_POST['nama'];	//membuat variabel $nis dan datanya dari inputan NIS
	$subjek		= $_POST['subjek'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$id_direktorat	= $_POST['id_direktorat'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$isi_pesan	= $_POST['isi_pesan'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = $conn -> query("INSERT INTO pesan VALUES('$id_pesan', '$nama', '$subjek', '$id_direktorat', '$isi_pesan')");
	
	//jika query input sukses
	if($input){
		
		echo 'Pesan berhasil di kirim! ';		//Pesan jika proses tambah sukses
		echo '<a href="../adminDit/contacts.php"> Kembali </a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="../adminDit/contacts.php"> Kembali </a>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>