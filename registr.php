<?php 
	session_start(); 
	if ($_SESSION['user']) {
		header('Location: profile.php');
	};

?>
<!-- тут была сессия -->
<!DOCTYPE html>
<html lang="en">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="./css/reg_page.css">
	<title>Document</title>
</head>
<body>
	<div class="reg-form">
		<h1>РЕГИСТРАЦИЯ</h1>
		<!-- Форма регистрации -->
		<form class="lines-wrapper" action="include/signup.php" method="post" enctype="multipart/form-data" >
			<p>Ваше имя</p>
			<input type="text" name="full_name" required>

			<p>Логин</p>
			<input type="text" name="login" required>


			<p>Почта</p>
			<input type="email" name="email" required>

			<p>Пароль</p>
			<input type="password" name="password" required>

			<p>Ещё раз</p>
			<input type="password" name="password_confirm" required>

			<button class="reg-but">ЗАРЕГЕСТРИРОВАТЬСЯ</button>
			<p class="under-button-text">Уже есть аккаунт?</p>
			<a href="index.php">Авторизируйтесь!</a>	
		</form>
	</div>

	<div class="black-screen">
		<div class="msg">
			<?php 
				echo '<p class="msg"> ' . $_SESSION['message']["0"] . ' </p>';
				echo '<p class="msg"> ' . $_SESSION['message']["1"] . ' </p>';
				echo '<p class="msg"> ' . $_SESSION['message']["2"] . ' </p>';
				echo '<p class="msg"> ' . $_SESSION['message']["3"] . ' </p>';				
			 ?>
			<button class="close-but">ВЕРНУТЬСЯ</button>
		</div>
	</div>

	<?php 
		if ($_SESSION['message']) {
			echo '<script src="./js/main.js"></script>';
		}
		unset($_SESSION['message']);
	?>
</body>
</html>

