<?php
session_start();

if(!isset($_SESSION['admin'])){
	header("location: login.php");
}

if(isset($_GET['logout'])){
	session_unset();
	unset($_SESSION['admin']);
	header("location: login.php");
}

?>
<!doctype html>
<html lang="pl">
<head>
<meta charset="utf-8">
<title>Panel</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<div class="container mt-2 form-control p-3">
<h2 class="text-center">Dodaj administratora</h2>
<form action="register.php" method="POST" class="text-center">
<input type="text" placeholder="Login" class="w-50 mr-auto ml-auto mt-3 m-0 p-0" name="admin"><br><input type="password" placeholder="Hasło" class="w-50 mr-auto ml-auto mt-3 m-0 p-0" name="password">

<button type="submit" name="register" class="btn btn-primary btn-block w-50 mt-3 mr-auto ml-auto">Dodaj</button>
</form>
<a href="panel.php" class="btn btn-outline-primary btn-block w-50 mt-3 mr-auto ml-auto">Wróć</a>
</div>
<?php 
require "polaczenie.php";

if(isset($_POST['register'])){
	$admin = $_POST["admin"];
	$password = MD5($_POST["password"]);
	
	$sql = "insert into administrator (Login, Haslo) values ('$admin', '$password')";
	
	if(mysqli_query($polaczenie, $sql)){
		echo "<script type='text/javascript'>
		alert('Dodano administratora');
		window.location= 'panel.php';
		</script>";
	}
	else {
		echo "<script type='text/javascript'>
		alert('Wystąpił błąd');
		</script>";
	}
}
?>


</body>
</html>