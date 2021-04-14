<?php
	session_start();
	if (!$_SESSION['user']) {
	    header('Location: index.php');
	};
	require_once 'connect.php';

	$idtheme = $_SESSION['idtheme'];
	$adres = 'Location: ../profilequestion.php?id='. $idtheme;
	
	if (empty($_POST['message'])) {
		header($adres);
		die();
	}

	$message = htmlentities($_POST['message'], ENT_QUOTES, 'UTF-8');
	$sender = $_SESSION['user']['full_name'];
	$date = date("m.d.y");
	$senderid = $_SESSION['user']['id'];
	
	$query = "INSERT INTO `message` (`idtheme`, `message`, `sender`, `date`, `senderid`) VALUES ('$idtheme','$message', '$sender' ,'$date','$senderid')";
	mysqli_query($link, $query);
	header($adres);