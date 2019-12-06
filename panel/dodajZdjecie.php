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
<div class="row m-3">

    <a href="dodaj.php" class="btn btn-primary btn-block"> Wróć</a>
    <a href="panel.php?logout='1'" class="btn btn-outline-secondary btn-block ">Wyloguj</a>

</div>

<h1>Dodaj zdjęcie</h1>

<form action='dodajZdjecie.php' method='POST'>
    <div class="col  col-md-12 m-0 p-0 mr-auto ml-auto">
<input type="text" placeholder="Ścieżka zdjęcia (images/kategoria/zdjecie)" name="zdjecie"  class="w-100 mr-auto ml-auto" value="images/"></input>
    </div>
    <div class="col  col-md-12 m-0 p-0 mr-auto ml-auto mt-2 mb-2">
<button type="submit" name="dodajZdjecie" class="btn btn-primary btn-block  mr-auto ml-auto m-0">Dodaj</button>
    </div>
    <br><h5 class="d-none d-sm-block">Np. images/kategoria/zdjecie.jpg</h5></br>
</form>
<div>


<?php
require "polaczenie.php";

$sql = "select SciezkaZdjecia from zdjecia order by SciezkaZdjecia ASC";
$query = mysqli_query($polaczenie, $sql);
echo '<table class="table row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto">
	<thead class="thead-dark">
	<tr>
	<th>Ścieżka zdjęcia</th>
	</tr>';
while ($wynik = mysqli_fetch_assoc($query)){
	echo '<tr>
		<td>'.$wynik["SciezkaZdjecia"].'</td>
		</tr>';
}
echo '</table>';


if(isset($_POST['dodajZdjecie'])){
	$nazwa = $_POST['zdjecie'];
	$dodajZdjecie = "insert into zdjecia(SciezkaZdjecia) values ('$nazwa')";
	if(mysqli_query($polaczenie, $dodajZdjecie)){
		echo "<script type='text/javascript'>
		alert('Dodano do bazy');
		window.location= 'dodajZdjecie.php';
		</script>";
	}
	else {
		echo "<script type='text/javascript'>
		alert('Wystąpił błąd');
		</script>";
	}
}
mysqli_close($polaczenie);
?>

</div>
</body>
</html>