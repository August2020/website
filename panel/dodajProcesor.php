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
        <a href="panel.php?logout='1'" class="btn btn-outline-secondary btn-block">Wyloguj</a>

    </div>

<h1>Dodaj procesor do bazy</h1>
    <div  class="row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto">
<form action="dodajProcesor.php" method="POST">
<?php
require "producent.php";
echo "<br/>";
require "zdjecie.php";
echo "<br/>";
require "gwarancja.php";
echo "<br/>";

?>
<input type="text" name="nazwa" placeholder="Nazwa"></input><br>
<textarea name="opis" placeholder="Opis"></textarea><br>
<input type="number" name="cena" step="0.01" placeholder="Cena"></input><br>
<input type="number" name="rdzenie" placeholder="Ilość rdzeni"></input><br>
<input type="text" name="socket" placeholder="Socket procesora"></input><br>
<input type="number" name="taktowanie" placeholder="Taktowanie procesora"></input><br>
<input type="number" name="turbo" placeholder="Taktowanie Turbo"></input><br>
<button type="submit" name="dodajProcesor" class="btn btn-primary btn-block  mr-auto ml-auto m-2">Dodaj</button>
</form>
    </div>
<?php

if(isset($_POST["dodajProcesor"])){
$producent = $_POST["producent"];
$zdjecie = $_POST["zdjecie"];
$gwarancja = $_POST["gwarancja"];
$nazwa = $_POST["nazwa"];
$opis = $_POST["opis"];
$cena = $_POST["cena"];
$rdzenie = $_POST["rdzenie"];
$socket = $_POST["socket"];
$taktowanie = $_POST["taktowanie"];
$turbo = $_POST["turbo"];

$dodaj = "insert into procesor (Zdjecia_idZdjecia, Gwarancja_idGwarancja, Producent_idProducent, Nazwa, Opis, Cena, IloscRdzeni, Socket, Taktowanie, TaktowanieTurbo) values ('$zdjecie', '$gwarancja', '$producent', '$nazwa', '$opis', '$cena', '$rdzenie', '$socket', '$taktowanie', '$turbo')";
if(mysqli_query($polaczenie, $dodaj)){
		echo "<script type='text/javascript'>
		alert('Dodano do bazy');
		window.location= 'dodajProcesor.php';
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