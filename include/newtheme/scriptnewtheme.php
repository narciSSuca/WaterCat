<?php 
	session_start();
	require_once '../connect.php';

	
	$author = $_SESSION['user']['full_name']; 
	$themename = htmlentities($_POST['themename'], ENT_QUOTES, 'UTF-8');
	$query = "INSERT INTO `theme`(`themename`, `author`) VALUES ( '$themename', '$author')";
	mysqli_query($link, $query);
	
	header('Location: ./../../profile.php');

	/*$author = $_SESSION['user']['full_name'];
	$themename = htmlentities($_POST['themename'], ENT_QUOTES, 'UTF-8');
	$query = "INSERT INTO `theme`(`themename`, `author`) VALUES ( '$themename', '$author')";
	mysqli_query($link, $query);
	
	header('Location: ./../../profile.php');*/
?>
