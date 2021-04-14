<?php 
	session_start();
	if (!$_SESSION['user']) {
		header('Location: index.php');
	};
	require_once 'include/connect.php';	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">

	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="left-part">
			<div class="profile-info">
				<div class="avatar">
					<img src="<?= $_SESSION['user']['avatar'] ?>"> <!-- аватарка -->
				</div>
				<h2><?= $_SESSION['user']['full_name'] ?></h2> <!-- переменная с именем -->
				<div class="mail">
					<img src="./img/mail-icon.svg">
					<a href="#"><?= $_SESSION['user']['email'] ?></a> <!-- почта -->
				</div>
				<div class="edit-exit-buttons">
					<div class="edit-but">
						<p>Изменить</p>
					</div>
					<div class="users-but">
						<a href="profile.php">Вернуться на главную</a>
					</div>
					<div class="exit-but">
						<a href="include/logout.php">Выход</a>
					</div>
				</div>	
				<div class="edit-avatar-window none">
					<form action="include/settings_page.php" method="post" enctype="multipart/form-data">
						<input type="file" name="avatar">
							<button>изменить</button>
					</form>
				</div>
			</div>
		</div>
		<div class="right-part">
			<? require_once 'question.php'; ?>
		</div>
	</div>
	<script src=js/mainpr.js></script>
</body>
</html>