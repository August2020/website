<?php
session_start();

$username = "";
$password = "";

$connect = mysqli_connect('localhost','root','','sklep_komputerowy');

if(isset($_POST['register'])){
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	
	$password = md5($password);
	$sql = "insert into administrator (Login, Haslo) values ('$username', '$password')";		
	mysqli_query($connect, $sql);
	
	$_SESSION['username'] = $username;		
	header('location: panel.php');
}

if(isset($_POST['login'])){
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);

	$password = md5($password);
	$sql = "select * from administrator where Login='$username' and Haslo='$password'";
	mysqli_query($connect, $sql);

	$_SESSION['username'] = $username;
	header('location: panel.php');
}

?>