<?php
session_start();
	if(isset($_POST ['signin']))
	{
		if(isset($_POST['username']) && isset($_POST['pwd']))
		{
			$us = mysql_real_escape_string($_POST['username']);
			$pwd = mysql_real_escape_string($_POST['pwd']);
			
			$us = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);	
			$us = htmlspecialchars($us);
			$us = htmlentities($us);
			$us = strip_tags($us);
			
			$pwd = filter_input(INPUT_POST,'pwd',FILTER_SANITIZE_STRING);
			$pwd = htmlspecialchars($pwd);
			$pwd = htmlentities($pwd);
			$pwd = strip_tags($pwd);
			
			$username = "root";
			$password = "";
			$conn = new PDO('mysql:host=localhost;dbname=kominfo',$username,$password);
			$stmt = $conn -> prepare("SELECT username,pwd,nama,salt,id_direktorat
			FROM user WHERE username = '$us' LIMIT 1");
			$stmt -> execute();
			$row = $stmt->fetch();
			
			$pass_salt = $pwd . $row["salt"];
			$hash = md5($pass_salt);
			$conn = null;
				
			if(strcmp ($row["pwd"],$hash) == 0)
			{
				if($row["id_direktorat"]=="1") $_SESSION["username"] = $row["username"];
				if($row["id_direktorat"]=="1")
				{
					echo '
						<script language=javascript>
							going=window.alert ("Selamat Datang di Aplikasi E-Monev APTIKA");
							window.location = "../adminDit/index.php";
						</script>
						';
					die();
				}
				
				if($row["id_direktorat"]=="2") $_SESSION["username"] = $row["username"];
				if($row["id_direktorat"]=="2")
				{
					echo '
						<script language=javascript>
							going=window.alert ("Selamat Datang di Aplikasi E-Monev APTIKA");
							window.location = "../adminDit/index.php";
						</script>
						';
					die();
				}
				
				if($row["id_direktorat"]=="3") $_SESSION["username"] = $row["username"];
				if($row["id_direktorat"]=="3")
				{
					echo '
						<script language=javascript>
							going=window.alert ("Selamat Datang di Aplikasi E-Monev APTIKA");
							window.location = "../adminDit/index.php";
						</script>
						';
					die();
				}
				
				if($row["id_direktorat"]=="4") $_SESSION["username"] = $row["username"];
				if($row["id_direktorat"]=="4")
				{
					echo '
						<script language=javascript>
							going=window.alert ("Selamat Datang di Aplikasi E-Monev APTIKA");
							window.location = "../adminDit/index.php";
						</script>
						';
					die();
				}
				
				if($row["id_direktorat"]=="5") $_SESSION["username"] = $row["username"];
				if($row["id_direktorat"]=="5")
				{
					echo '
						<script language=javascript>
							going=window.alert ("Selamat Datang di Aplikasi E-Monev APTIKA");
							window.location = "../adminDit/index.php";
						</script>
						';
					die();
				}
				
				if($row["id_direktorat"]=="6") $_SESSION["username"] = $row["username"];
				if($row["id_direktorat"]=="6")
				{
					echo '
						<script language=javascript>
							going=window.alert ("Selamat Datang di Aplikasi E-Monev APTIKA");
							window.location = "../adminDit/index.php";
						</script>
						';
					die();
				}
				
				if($row["id_direktorat"]=="7") $_SESSION["username"] = $row["username"];
				if($row["id_direktorat"]=="7")
				{
					echo '
						<script language=javascript>
							going=window.alert ("Selamat Datang di Aplikasi E-Monev APTIKA");
							window.location = "../SA/index.php";
						</script>
						';
					die();
				}
			}
			else
			{
				echo '
				<script language=javascript>
					going=window.alert ("Maaf Username atau Password Anda Salah!");
					window.location = "../login.php";
				</script>
				';
				die();
			}
		}
	}
?>