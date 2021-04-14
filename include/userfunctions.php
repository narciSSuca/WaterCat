<?php	 
	function searchid ($id) {
		//Устанавливаем доступы к базе данных:
		$host = 'localhost';//имя хоста, на локальном компьютере это localhost
		$user = 'mysql'; //имя пользователя, по умолчанию это root
		$password = 'mysql'; //пароль, по умолчанию пустой
		$db_name = 'phpauth'; //имя базы данных

		//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);

		$query = "SELECT * FROM `message` WHERE idtheme = $id"; 
        $result = mysqli_query($link, $query) or die( mysqli_error($link) );	
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        return count($data);
		}
?>