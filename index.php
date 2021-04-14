<?php 
session_start();
if ($_SESSION['user']) {
	header('Location: profile.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/authoriz.css">
	<title>Document</title>
</head>
<body>
	<div class="authorize-form">
		<h1>АВТОРИЗАЦИЯ</h1>
		<!-- Форма авторизации -->
		<form class="lines-wrapper" action="include/signin.php" method="post">
			<p >Логин</p>
			<input type="text" name="login" required>
			<p >Пароль</p>
			<input type="password" name="password" required>
			<button type="submit">ВОЙТИ</button>
			<p class="under-button-text">У вас нет аккаунта?</p>
			<a href="registr.php">Зарегистрируйтесь!</a>
		</form> 
	</div>	
	
	
</body>
</html>



































