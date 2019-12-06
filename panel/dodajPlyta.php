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

<h1>Dodaj płytę główną do bazy</h1>
    <div  class="row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto">
<form action="dodajPlyta.php" method="POST">
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
<select name="przeznaczenie">
<option selected disabled>Przeznaczenie</option>
<option value="AMD">AMD</option>
<option value="INTEL">INTEL</option>
</select><br>
<input type="text" name="chipset" placeholder="Chipset"></input><br>
<input type="text" name="gniazdo" placeholder="Gniazdo procesora"></input><br>
<input type="text" name="obspamiec" placeholder="Obsługiwana pamięć"></input><br>
<input type="number" name="ilegniazd" placeholder="Ilość gniazd pamięci"></input><br>
<input type="number" name="makspamiec" placeholder="Maksymalna pojemność pamięci"></input><br>
<input type="text" name="zlacza" placeholder="Złącza płyty głównej"></input><br>
<input type="text" name="zasilanie" placeholder="Zasilanie"></input><br>
<input type="text" name="standard" placeholder="Standard płyty głównej"></input><br>
<select name="kartasiec">
<option selected disabled>Zintegrowana karta sieciowa</option>
<option value="Tak">Tak</option>
<option value="Nie">Nie</option>
</select><br>
<select name="kartadzwiek">
<option selected disabled>Zintegrowana karta dźwiękowa</option>
<option value="Tak">Tak</option>
<option value="Nie">Nie</option>
</select><br>
<button type="submit" name="dodajPlyta" class="btn btn-primary btn-block  mr-auto ml-auto m-2">Dodaj</button>
</form>
    </div>
<?php

if(isset($_POST["dodajPlyta"])){
$producent = $_POST["producent"];
$zdjecie = $_POST["zdjecie"];
$gwarancja = $_POST["gwarancja"];
$nazwa = $_POST["nazwa"];
$opis = $_POST["opis"];
$cena = $_POST["cena"];
$przeznaczenie = $_POST["przeznaczenie"];
$chipset = $_POST["chipset"];
$gniazdo = $_POST["gniazdo"];
$obspamiec = $_POST["obspamiec"];
$ilegniazd = $_POST["ilegniazd"];
$makspamiec = $_POST["makspamiec"];
$zlacza = $_POST["zlacza"];
$zasilanie = $_POST["zasilanie"];
$standard = $_POST["standard"];
$kartasiec = $_POST["kartasiec"];
$kartadzwiek = $_POST["kartadzwiek"];

$dodaj = "insert into plytaglowna (Zdjecia_idZdjecia, Gwarancja_idGwarancja, Producent_idProducent, Nazwa, Opis, Cena, Przeznaczenie, Chipset, GniazdoProcesora, ObslugiwanaPamiec, IloscGniazdPamieci, MaksPojPamieci, Zlacza, Zasilanie, StandardPlyty, ZintKartaSiec, ZintKartaDzwiek) values ('$zdjecie', '$gwarancja', '$producent', '$nazwa', '$opis', '$cena', '$przeznaczenie', '$chipset', '$gniazdo', '$obspamiec', '$ilegniazd', '$makspamiec', '$zlacza', '$zasilanie', '$standard', '$kartasiec', '$kartadzwiek')";
if(mysqli_query($polaczenie, $dodaj)){
		echo "<script type='text/javascript'>
		alert('Dodano do bazy');
		window.location= 'dodajPlyta.php';
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