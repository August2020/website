<?php
session_start();

$connect = mysqli_connect('localhost','root','','sklep_komputerowy');

if(isset($_POST['register'])){
	$username =  $_POST['username'];
	$password = MD5($_POST['password']);
	$password2 = MD5($_POST['password2']);
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$kod = $_POST['kod'];
	$adres = $_POST['adres'];
	$data = $_POST['data'];
	$blad = 0;
	
	$sql = "select Email from klienci";
	$query = mysqli_query($connect, $sql);
	while ($wyn = mysqli_fetch_assoc($query)){
	if($wyn["Email"] == $username){
		$blad += 1;
	}
	else{
		$blad -= 1;
	}
	}
	if($blad == 0){
	
	if($password2 == $password){
		$sql = "insert into klienci (Imie, Nazwisko, Adres, KodPocztowy, Email, Haslo, DataUrodzenia) values ('$imie', '$nazwisko', '$adres', '$kod', '$username', '$password', '$data')";		
		if(mysqli_query($connect, $sql)){
			$_SESSION['username'] = $username;
			header('location: index.php');
		}
		else{
			echo "<script type='text/javascript'>
			alert('Wystąpił błąd');
			window.location= 'rejestracja.php';
			</script>";
		}
	}
	else{
		echo "<script type='text/javascript'>
		alert('Wystąpił błąd');
		window.location= 'rejestracja.php';
		</script>";
	}
	}
	else{
		echo "<script type='text/javascript'>
		alert('Taki Email już istnieje');
		window.location= 'rejestracja.php';
		</script>";
	}
}

if(isset($_POST['login'])){
	$username =  $_POST['username'];
	$password = MD5($_POST['password']);
	
	$sql = "select * from klienci where Email='$username' and Haslo='$password'";
	$query = mysqli_query($connect, $sql);
	$wyn = mysqli_fetch_assoc($sql);

	if(mysqli_num_rows($query) > 0){
		$_SESSION['username'] = $username;
		header('location: index.php');
	}
	else{
		echo "<script type='text/javascript'>
		alert('Nie udało się zalogować');
		window.location= 'logowanie.php';
		</script>";
	}
}

?>