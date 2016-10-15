<!DOCTYPE html>
<?php
	session_start();
?>

<html>

<head>
<title>Login MONEV Kominfo APTIKA</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="Include/loginInclude/css/style.css" />

<script type="text/javascript" src="Include/loginInclude/js/jquery-1.11.0.js" ></script>
<script type="text/javascript" src="Include/loginInclude/js/script.js" ></script>
</head>

<body class="login">
<div class="wrapper login-wrapper">
  <div class="post">
    <div class="post-header">
      <h2>Sign in</h2>
    </div>
	
    <!-- Form Login Menu -->
    <form class='login-form clearfix' method='post' action='processing/signin.php'>
      <input required name='username' type='text' placeholder='Username' />
      <input required name='pwd' type='password' placeholder='Password' />
      
      <input type='submit' name='signin' value='Sign in' />
    </form>
	
    <!-- .login-form -->
    <div class='post-footer'>
      <p>Belum Terdaftar? <a href='sign_up.html'> Sign Up</a></p>
    </div>
	
    <!-- .post-footer -->
  </div>
  <!-- .post -->
</div>
<!-- .wrapper -->
</body>
</html>