<?php
session_start();

$connect = mysqli_connect('localhost','root','','sklep_komputerowy');

if(isset($_POST['register'])){
	$username =  $_POST['username'];
	$password = MD5($_POST['password']);
	
	$sql = "insert into klienci (Email, Haslo) values ('$username', '$password')";		
	mysqli_query($connect, $sql);
	
	$_SESSION['username'] = $username;		
	header('location: index.php');
}

if(isset($_POST['login'])){
	$username =  $_POST['username'];
	$password = MD5($_POST['password']);
	
	$sql = "select * from klienci where Email='$username' and Haslo='$password'";
	mysqli_query($connect, $sql);

	$_SESSION['username'] = $username;
	header('location: index.php');
}

?>