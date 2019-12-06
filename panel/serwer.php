<?php
session_start();

require "polaczenie.php";

if(isset($_POST['login'])){
	$admin = $_POST["admin"];
	$password = MD5($_POST["password"]);
	
	$sql = "select * from administrator where Login='$admin' and Haslo='$password'";
	$query = mysqli_query($polaczenie, $sql);
	
	if(mysqli_num_rows($query) > 0){
		$_SESSION['admin'] = $admin;
		header('location: panel.php');
	}
	else{
		header('location: login.php');
	}
}

?>