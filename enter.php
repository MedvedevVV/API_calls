<html>

<head>	
<?php
session_start();

if($_SESSION['admin']){
	header("Location: index.php");
	exit;
}

$admin = 'admin';
$pass = 'admin';

if($_POST['submit']){
	if($admin == $_POST['user'] AND $pass == ($_POST['pass'])){
		$_SESSION['admin'] = $admin;
		header("Location: index.php");
		exit;
	}else echo '<h1><center><p>Неверные логин/пароль</p></center></h1>';
}
?>

<link rel="stylesheet" href="style.css">
</head>
<body>
<hr />



<div class="login-page">
  <div class="form">
    <form method="post" class="login-form">
      <input type="text" name="user" placeholder="username"/>
      <input type="password" name="pass" placeholder="password"/>
      <input type="submit" name="submit" value="Войти" />
    </form>
  </div>
</div>
</body>
</html>
