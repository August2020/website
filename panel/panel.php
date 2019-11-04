<?php
session_start();

if(!isset($_SESSION['username'])){
	header("location: login.php");
}

if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}

?>

<!doctype html>
<html lang="pl">
<head>
<meta charset="utf-8">
<title>Panel</title>
</head>
<body>

<?php if(isset($_SESSION['username'])) :?>
<p>Witaj <?php echo $_SESSION['username']; ?></p>
<p>Zalogowałes się do panelu sklepu</p>
<p><a href="panel.php?logout='1'">Wyloguj</a></p>
<?php endif ?>

</body>
</html>