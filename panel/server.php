<?php
session_start();

require "polaczenie.php";

if(isset($_POST['register'])){
	
	
	$username = $_POST["username"];
	$password = MD5($_POST["password"]);
	
	$sql = "insert into administrator (Login, Haslo) values ('$username', '$password')";		
	mysqli_query($polaczenie, $sql);
	
	$_SESSION['username'] = $username;		
	header('location: panel.php');
}

if(isset($_POST['login'])){
	
	
	$username = $_POST["username"];
	$password = MD5($_POST["password"]);
	
	$sql = "select * from administrator where Login='$username' and Haslo='$password'";
	mysqli_query($polaczenie, $sql);

	$_SESSION['username'] = $username;
	header('location: panel.php');
}

?>