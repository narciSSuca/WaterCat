<?php
	session_start();
	require_once 'connect.php';

	if (empty($_FILES['avatar']['name'])) {
		header('Location: ../profile.php');
		die();
	}
	//проверяем тип изображение
	$id_user = $_SESSION['user']['id'];
	$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
	$detectedType = exif_imagetype($_FILES['avatar']['tmp_name']);
	$error = in_array($detectedType, $allowedTypes);
	if (empty($error)) {
		$_SESSION['message'] = 'неверный формат файла'; //отрабатываем ошибки и выводим сообщение на форму регистрации
	    header('Location: ../profile.php');

	} else {
		$path = 'uploads/' . time() . $_FILES['avatar']['name'];
    	move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path);

		$query = "UPDATE users SET avatar ='$path' WHERE id='$id_user'";
	    $result = mysqli_query($link, $query);


	    $query = "SELECT * FROM `users` WHERE id = '$id_user'";
	    $check_user = mysqli_query($link, $query);
	    $user = mysqli_fetch_assoc($check_user);

	    $_SESSION['user'] = [
	 		"id" => $user['id'],
	 		"full_name" => $user['full_name'],
	 		"avatar" => $user['avatar'],
	 		"email" => $user['email']
	 	];
	}
	header('Location: ./../profile.php');
	// var_dump($_FILES['avatar']);
?>
