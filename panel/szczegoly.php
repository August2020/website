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

<div class="container w-100 mt-2 mr-auto ml-auto p-md-3">
    <div class="row">
        <div class="col col-md-6 col-sm-12"> <a href="panel.php?logout='1'" class="btn btn-outline-secondary mb-3 btn-block w-md-75 w-sm-100 mr-auto ml-auto ">Wyloguj</a></div>
        <div class="col col-md-6 col-sm-12"><a href="zamowienia.php" class="btn btn-primary btn-block w-md-75 mb-3 mr-auto ml-auto w-sm-100 ">Wróć</a></div>
    </div>

<?php
require "polaczenie.php";

if(isset($_GET['id'])){
	$id = $_GET['id'];
} else{
	header ("location: zamowienia.php");
}

$zapytanie = "select * from zamowienie where ID='$id'";
$wynik = mysqli_query($polaczenie, $zapytanie);
$zamow = mysqli_fetch_assoc($wynik);

echo '<h2>Zamówienie nr. '.$zamow["ID"].'</h2>';

echo '<table class="table row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto">
	<thead class="thead-dark">
	<tr>
		<th>Numer zamówienia</th>
		<th>Imię i nazwisko</th>
		<th>Adres dostawy</th>
		<th>Kod pocztowy</th>
		<th>Data zamówienia</th>
		<th>Przewidywana data dostawy</th>
		<th>Kwota zamówienia</th>
		<th>Rodzaj płatności</th>
		<th>Rodzaj dostawy</th>
		<th>Status</th>
	</tr>
	</thead>
	<tr>
		<td>'.$zamow["ID"].'</td>
		<td>'.$zamow["Imie_Nazwisko"].'</td>
		<td>'.$zamow["Adres_Dostawy"].'</td>
		<td>'.$zamow["Kod_Pocztowy"].'</td>
		<td>'.$zamow["Data_Zamowienia"].'</td>
		<td>'.$zamow["Przewidywana_Data_Dostawy"].'</td>
		<td>'.$zamow["Kwota_Zamowienia"].'</td>
		<td>'.$zamow["Rodzaj_Platnosci"].'</td>
		<td>'.$zamow["Rodzaj_Dostawy"].'</td>
		<td><form action="szczegoly.php?id='.$id.'" method=POST>
			<select name="status">
			<option selected value='.$zamow["Status_Zamowienia"].'>'.$zamow["Status_Zamowienia"].'</option>';
		if($zamow["Status_Zamowienia"] == "Zakończono"){
			echo '<option value="W trakcie">W trakcie</option>';
		}
		else{
			echo '<option value="Zakończono">Zakończono</option>';
		}
echo '</select>
	</td>
	</tr>
	</table>
	<button type="submit" name="aktualizuj" class="btn btn-primary btn-block w-md-50 w-sm-100 m-md-3">Aktualizuj</button></form>';
	
if(isset($_POST["aktualizuj"])){
	$status = $_POST["status"];
	
	$update = "update zamowienia set StatusZamowienia = '$status' where idZamowienia = '$id'";
	if(mysqli_query($polaczenie, $update)){
		echo '<script type="text/javascript">
		alert("Zaktualizowano status zamówienia");
		window.location= "szczegoly.php?id='.$id.'";
		</script>';
	}
	else{
		echo '<script type="text/javascript">
		alert("Wystąpił błąd");
		</script>';
	}
}

echo '<h2>Zamówione przedmioty</h2>';

echo '
<table class="table row overflow-auto mt-2 mr-md-auto ml-md-auto mr-sm-1 ml-sm-1 w-sm-75" style="overflow: auto">
	<thead class="thead-dark">
<tr>
<th>Nazwa</th>
<th>Cena</th>
</tr>';

$idKarty = "SELECT kartagraficzna_idKartaGraficzna as ID FROM kartagraficzna_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($polaczenie, $idKarty);
while($wynik = mysqli_fetch_assoc($ids)){
$produkty = "SELECT concat(p.nazwa, ' ', kg.nazwa) as nazwa, kg.cena as cena FROM kartagraficzna kg inner join producent p on kg.Producent_idProducent=p.idProducent WHERE kg.idKartaGraficzna = '".$wynik['ID']."'";
$query = mysqli_query($polaczenie, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td>'.$produkt["nazwa"].'</td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idRam = "SELECT ram_idRam as ID FROM ram_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($polaczenie, $idRam);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', r.nazwa, ' ', pojemnosc, 'GB') as nazwa, r.cena as cena FROM ram r inner join producent p on r.Producent_idProducent=p.idProducent WHERE r.idRam = '".$wynik['ID']."'";
	$query = mysqli_query($polaczenie, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td>'.$produkt["nazwa"].'</td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idDysk = "SELECT dysk_idDysk as ID FROM dysk_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($polaczenie, $idDysk);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', d.nazwa) as nazwa, d.cena as cena FROM dysk d inner join producent p on d.Producent_idProducent=p.idProducent WHERE d.idDysk = '".$wynik['ID']."'";
	$query = mysqli_query($polaczenie, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td>'.$produkt["nazwa"].'</td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idKomputer = "SELECT komputer_idKomputer as ID FROM komputer_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($polaczenie, $idKomputer);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT nazwa, cena FROM komputer where idKomputer = '".$wynik['ID']."'";
	$query = mysqli_query($polaczenie, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td>'.$produkt["nazwa"].'</td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idObudowa = "SELECT obudowa_idObudowa as ID FROM obudowa_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($polaczenie, $idObudowa);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', o.nazwa) as nazwa, o.cena as cena FROM obudowa o inner join producent p on o.Producent_idProducent=p.idProducent WHERE o.idObudowa = '".$wynik['ID']."'";
	$query = mysqli_query($polaczenie, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td>'.$produkt["nazwa"].'</td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idPlyta = "SELECT plytaglowna_idPlytaGlowna as ID FROM plytaglowna_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($polaczenie, $idPlyta);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', pg.nazwa) as nazwa, pg.cena as cena FROM plytaglowna pg inner join producent p on pg.Producent_idProducent=p.idProducent WHERE pg.idPlytaGlowna = '".$wynik['ID']."'";
	$query = mysqli_query($polaczenie, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td>'.$produkt["nazwa"].'</td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idProcesor = "SELECT procesor_idProcesor as ID FROM procesor_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($polaczenie, $idProcesor);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', pr.nazwa) as nazwa, pr.cena as cena FROM procesor pr inner join producent p on pr.Producent_idProducent=p.idProducent WHERE pr.idProcesor = '".$wynik['ID']."'";
	$query = mysqli_query($polaczenie, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td>'.$produkt["nazwa"].'</td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idZasilacz = "SELECT zasilacz_idZasilacz as ID FROM zasilacz_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($polaczenie, $idZasilacz);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', z.nazwa, ' ', z.moc, 'W') as nazwa, z.cena as cena FROM zasilacz z inner join producent p on z.Producent_idProducent=p.idProducent WHERE z.idZasilacz = '".$wynik['ID']."'";
	$query = mysqli_query($polaczenie, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td>'.$produkt["nazwa"].'</td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}

echo '</table>';
mysqli_close($polaczenie);
?>
</div>
</body>
</html>