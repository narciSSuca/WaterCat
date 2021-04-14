<?php
	session_start();
	require_once 'connect.php';

	$login = htmlentities($_POST['login'], ENT_QUOTES, 'UTF-8');
	$password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');
	$full_name = htmlentities($_POST['full_name'], ENT_QUOTES, 'UTF-8');
	$email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
	$password_confirm = htmlentities($_POST['password_confirm'], ENT_QUOTES, 'UTF-8');



	if(strlen($_POST['login']) < 6 or strlen($_POST['login']) > 30) {
		$err['strlen'] = 'Логин должен быть не меньше 6-х символов и не больше 30';
	}

	if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])) {
       $err['preg'] = 'Логин может состоять только из букв английского алфавита и цифр';
    }

    if ($password !== $password_confirm ) {
    	$err['pasconf'] = 'Пароли не совпадают';
    }

  $query = "SELECT * FROM `users` WHERE login = '$login'";
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	if (isset($user)) {
		$err['logconf'] = 'Пользователь с таким именем уже существует';
	}

    if (isset($err)) {
    	$_SESSION['message'] = [
	 		"0" => $err['strlen'],
	 		"1" => $err['preg'],
	 		"2" => $err['pasconf'],
	 		"3" => $err['logconf']
	 	];
	 	header('Location: ../registr.php'); //переадресация пользователя на страницу регистрации
	} else {
		$password = md5(md5($password));
	    	$query = "INSERT INTO `users` (`full_name`, `login`, `email`, `password`, `avatar`) VALUES ('$full_name', '$login', '$email', '$password', 'img/null.jpg')";
	    	mysqli_query($link, $query);
	    	$_SESSION['message'] = 'Регистрация прошла успешно'; //отрабатываем ошибки и выводим сообщение на форму регистрации
	    	header('Location: ../index.php');
	}

 ?>
