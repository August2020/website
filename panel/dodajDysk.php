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

<h1>Dodaj dysk do bazy</h1>
<div  class="row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto">


<form action="dodajDysk.php" method="POST">
<?php
echo '<div class="m-2">';
require "producent.php";
echo "<br/>";
echo '<div class="m-2">';
require "zdjecie.php";
echo "<br/>";
echo '<div class="m-2">';
require "gwarancja.php";
echo "<br/>";

?>
<input type="text" name="nazwa" placeholder="Nazwa" class="m-2" class="m-2"></input><br>
<textarea name="opis" placeholder="Opis" class="m-2"></textarea><br>
<input type="number" name="cena" step="0.01" placeholder="Cena" class="m-2" class="m-2"></input><br>
<select name="typ" class="m-2">
<option disabled selected>Wybierz typ..</option>
<option value="SSD">SSD</option>
<option value="HDD">HDD</option>
</select><br>
<input type="text" name="interfejs" placeholder="Interfejs" class="m-2"></input><br>
<input type="number" name="pojemnosc" placeholder="Pojemność w GB" class="m-2"></input><br>
<input type="number" name="zapis" placeholder="Szybkość zapisu w MB/s" class="m-2"></input><br>
<input type="number" name="odczyt" placeholder="Szybkość odczytu w MB/s" class="m-2"></input><br>
<input type="text" name="format" placeholder="Format dysku" class="m-2"></input><br>
<button type="submit" name="dodajDysk" class="btn btn-primary btn-block  mr-auto ml-auto m-0 m-2">Dodaj</button>
</form>
</div>
<?php

if(isset($_POST["dodajDysk"])){
$producent = $_POST["producent"];
$zdjecie = $_POST["zdjecie"];
$gwarancja = $_POST["gwarancja"];
$nazwa = $_POST["nazwa"];
$opis = $_POST["opis"];
$cena = $_POST["cena"];
$typ = $_POST["typ"];
$interfejs = $_POST["interfejs"];
$pojemnosc = $_POST["pojemnosc"];
$zapis = $_POST["zapis"];
$odczyt = $_POST["odczyt"];
$format = $_POST["format"];

$dodaj = "insert into dysk (Zdjecia_idZdjecia, Gwarancja_idGwarancja, Producent_idProducent, Nazwa, Opis, Cena, Typ, Interfejs, Pojemnosc, SzybkoscZapisu, SzybkoscOdczytu, Format) values ('$zdjecie', '$gwarancja', '$producent', '$nazwa', '$opis', '$cena', '$typ', '$interfejs', '$pojemnosc', '$zapis', '$odczyt', '$format')";
if(mysqli_query($polaczenie, $dodaj)){
		echo "<script type='text/javascript'>
		alert('Dodano do bazy');
		window.location= 'dodajDysk.php';
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