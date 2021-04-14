<?php 
	

	//Устанавливаем доступы к базе данных:
	$host = 'localhost';//имя хоста, на локальном компьютере это localhost
	$user = 'mysql'; //имя пользователя, по умолчанию это root
	$password = 'mysql'; //пароль, по умолчанию пустой
	$db_name = 'phpauth'; //имя базы данных

	//Соединяемся с базой данных используя наши доступы:
	$link = mysqli_connect($host, $user, $password, $db_name);

	if (!$link) {
		die('Error connect to DB');
	}
	//Устанавливаем кодировку (не обязательно, но поможет избежать проблем):
	mysqli_query($link, "SET NAMES 'utf8'");
	
 	
 	

/* //Устанавливаем доступы к базе данных:
	$host = 'localhost';//имя хоста, на локальном компьютере это localhost
	$user = 'id15493243_ivanchenkohost'; //имя пользователя, по умолчанию это root
	$password = 'gdknlDtnнHRi7UG'; //пароль, по умолчанию пустой
	$db_name = 'id15493243_phpauth'; //имя базы данных

	//Соединяемся с базой данных используя наши доступы:
	$link = mysqli_connect($host, $user, $password, $db_name);

	if (!$link) {
	die('Error connect to DB');
	}
	//Устанавливаем кодировку (не обязательно, но поможет избежать проблем):
	mysqli_query($link, "SET NAMES 'utf8'");
*/
 ?>