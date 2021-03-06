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

<h1>Dodaj pamięci RAM do bazy</h1>
    <div  class="row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto"> <div  class="row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto">
<form action="dodajRam.php" method="POST">
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
<input type="text" name="rodzaj" placeholder="Rodzaj pamięci"></input><br>
<input type="text" name="typ" placeholder="Typ pamięci"></input><br>
<input type="number" name="pojemnosc" placeholder="Pojemność pamięci"></input><br>
<input type="number" name="pojemnoscmodulu" placeholder="Pojemność jednego modułu"></input><br>
<input type="number" name="ilosc" placeholder="Ilość modułów"></input><br>
<input type="number" name="czestotliwosc" placeholder="Częstotliwość taktowania pamięci"></input><br>
<input type="number" name="napiecie" step=0.01 placeholder="Napięcie w voltach"></input><br>
<button type="submit" name="dodajRam" class="btn btn-primary btn-block  mr-auto ml-auto m-2">Dodaj</button>
</form>
        </div>
<?php

if(isset($_POST["dodajRam"])){
$producent = $_POST["producent"];
$zdjecie = $_POST["zdjecie"];
$gwarancja = $_POST["gwarancja"];
$nazwa = $_POST["nazwa"];
$opis = $_POST["opis"];
$cena = $_POST["cena"];
$rodzaj = $_POST["rodzaj"];
$typ = $_POST["typ"];
$pojemnosc = $_POST["pojemnosc"];
$pojemnoscmodulu = $_POST["pojemnoscmodulu"];
$ilosc = $_POST["ilosc"];
$czestotliwosc = $_POST["czestotliwosc"];
$napiecie = $_POST["napiecie"];

$dodaj = "insert into ram (Zdjecia_idZdjecia, Gwarancja_idGwarancja, Producent_idProducent, Nazwa, Opis, Cena, RodzajPamieci, Typ, Pojemnosc, PojemnoscModulu, IloscModulow, Czestotliwosc, Napiecie) values ('$zdjecie', '$gwarancja', '$producent', '$nazwa', '$opis', '$cena', '$rodzaj', '$typ', '$pojemnosc', '$pojemnoscmodulu', '$ilosc', '$czestotliwosc', '$napiecie')";
if(mysqli_query($polaczenie, $dodaj)){
		echo "<script type='text/javascript'>
		alert('Dodano do bazy');
		window.location= 'dodajRam.php';
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