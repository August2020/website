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

<h1>Dodaj komputer do bazy</h1>
    <div  class="row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto"> <div  class="row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto">
<form action="dodajKomputer.php" method="POST">
<input type="text" name="nazwa" placeholder="Nazwa komputera"></input><br>
<textarea name="opis" placeholder="Opis komputera"></textarea><br>
<?php
require "polaczenie.php";

echo '<select name="procesor">
	<option disabled selected>Wybierz procesor</option>';
$sql = "select ID, Nazwa, Cena from procesory";
$query = mysqli_query($polaczenie, $sql);
while($wynik = mysqli_fetch_assoc($query)){
	echo '<option value='.$wynik["ID"].'>'.$wynik["Nazwa"].' | '.$wynik["Cena"].' zł</option>';
}
echo '</select><br>';

echo '<select name="plytaglowna">
	<option disabled selected>Wybierz płytę główną</option>';
$sql = "select ID, Nazwa, Cena from plytyglowne";
$query = mysqli_query($polaczenie, $sql);
while($wynik = mysqli_fetch_assoc($query)){
	echo '<option value='.$wynik["ID"].'>'.$wynik["Nazwa"].' | '.$wynik["Cena"].' zł</option>';
}
echo '</select><br>';

echo '<select name="kartagraficzna">
	<option disabled selected>Wybierz kartę graficzną</option>';
$sql = "select ID, Nazwa, Cena from kartygraficzne";
$query = mysqli_query($polaczenie, $sql);
while($wynik = mysqli_fetch_assoc($query)){
	echo '<option value='.$wynik["ID"].'>'.$wynik["Nazwa"].' | '.$wynik["Cena"].' zł</option>';
}
echo '</select><br>';

echo '<select name="dysk">
	<option disabled selected>Wybierz dysk</option>';
$sql = "select ID, Nazwa, Cena from dyski";
$query = mysqli_query($polaczenie, $sql);
while($wynik = mysqli_fetch_assoc($query)){
	echo '<option value='.$wynik["ID"].'>'.$wynik["Nazwa"].' | '.$wynik["Cena"].' zł</option>';
}
echo '</select><br>';

echo '<select name="obudowa">
	<option disabled selected>Wybierz obudowę</option>';
$sql = "select ID, Nazwa, Cena from obudowy";
$query = mysqli_query($polaczenie, $sql);
while($wynik = mysqli_fetch_assoc($query)){
	echo '<option value='.$wynik["ID"].'>'.$wynik["Nazwa"].' | '.$wynik["Cena"].' zł</option>';
}
echo '</select><br>';

echo '<select name="ram">
	<option disabled selected>Wybierz pamięć RAM</option>';
$sql = "select ID, Nazwa, Cena from ramy";
$query = mysqli_query($polaczenie, $sql);
while($wynik = mysqli_fetch_assoc($query)){
	echo '<option value='.$wynik["ID"].'>'.$wynik["Nazwa"].' | '.$wynik["Cena"].' zł</option>';
}
echo '</select><br>';

echo '<select name="zasilacz">
	<option disabled selected>Wybierz zasilacz</option>';
$sql = "select ID, Nazwa, Cena from zasilacze";
$query = mysqli_query($polaczenie, $sql);
while($wynik = mysqli_fetch_assoc($query)){
	echo '<option value='.$wynik["ID"].'>'.$wynik["Nazwa"].' | '.$wynik["Cena"].' zł</option>';
}
echo '</select><br>';

echo '<input type="number" name="cena" placeholder="Cena" step=0.1></input>';
?>
<button type="submit" name="dodajKomputer"  class="btn btn-primary btn-block  mr-auto ml-auto m-2">Dodaj</button>
</form>
        </div>
<?php

if(isset($_POST["dodajKomputer"])){
	$nazwa = $_POST["nazwa"];
	$opis = $_POST["opis"];
	$procesor = $_POST["procesor"];
	$plytaglowna = $_POST["plytaglowna"];
	$kartagraficzna = $_POST["kartagraficzna"];
	$dysk = $_POST["dysk"];
	$obudowa = $_POST["obudowa"];
	$ram = $_POST["ram"];
	$zasilacz = $_POST["zasilacz"];
	$cena = $_POST ["cena"];

$dodaj = "insert into komputer(Nazwa, Opis, Cena, Procesor_idProcesor, PlytaGlowna_idPlytaGlowna, 	KartaGraficzna_idKartaGraficzna, Dysk_idDysk, Obudowa_idObudowa, RAM_idRAM, Zasilacz_idZasilacz) values ('$nazwa', '$opis', '$cena', '$procesor', '$plytaglowna', '$kartagraficzna', '$dysk', '$obudowa', '$ram', '$zasilacz')";
if(mysqli_query($polaczenie, $dodaj)){
		echo "<script type='text/javascript'>
		alert('Dodano do bazy');
		window.location= 'dodajKomputer.php';
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