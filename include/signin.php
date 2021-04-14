<?php
	session_start();
	require_once 'connect.php';

	$login = htmlentities($_POST['login'], ENT_QUOTES, 'UTF-8');
	$password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');

	$password = md5(md5($password));
	$query = "SELECT * FROM `users` WHERE login = '$login' AND password = '$password'";
	$check_user = mysqli_query($link, $query);
	if ( mysqli_num_rows($check_user) > 0	) {

		$user = mysqli_fetch_assoc($check_user);
		$_SESSION['user'] = [
	 		"id" => $user['id'],
	 		"full_name" => $user['full_name'],
	 		"avatar" => $user['avatar'],
	 		"email" => $user['email']
	 	];
		header('Location: ../index.php');
	} else {
		$_SESSION['message'] = 'неверный логин или пароль'; //отрабатываем ошибки и выводим сообщение на форму регистрации
	    	header('Location: ../index.php');
	}
 ?>
