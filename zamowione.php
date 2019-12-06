<head>
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="p-0 m-0">
<?php 
SESSION_START();
include 'nav.php';
if(!isset($_SESSION['username'])){
	header ("location: index.php");
}
require "connection.php";

if(!isset($_GET['id'])){
echo '
<div class="row m-0 p-0 text-center">
<h1 class="mr-auto ml-auto m-0 p-2">Zamówienia:</h1>
</div>';


$sql = "select idKlienci from klienci where Email = '".$_SESSION['username']."' LIMIT 1";
$query = mysqli_query($conn, $sql);
$idKlienta = mysqli_fetch_assoc($query);
$idKlienta = $idKlienta["idKlienci"];

$idZamowien = "select idZamowienia from zamowienia where Klienci_idKlienci = $idKlienta";
$idZamowienia = mysqli_query($conn, $idZamowien);
if(mysqli_num_rows($idZamowienia)>0){
	echo '<table>
	<tr>
		<th>Numer zamówienia</th>
		<th>Imię i nazwisko</th>
		<th>Data zamówienia</th>
		<th>Kwota zamówienia</th>
		<th>Status zamówienia</th>
	</tr>';
while ($wyn = mysqli_fetch_assoc($idZamowienia)){
$sql = "select * from zamowienie where ID = ".$wyn['idZamowienia']."";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) > 0){
	while($wynik = mysqli_fetch_assoc($query)){
		echo '<tr>
			<td><a href="zamowione.php?id='.$wynik["ID"].'">'.$wynik["ID"].'</a></td>
			<td>'.$wynik["Imie_Nazwisko"].'</td>
			<td>'.$wynik["Data_Zamowienia"].'</td>
			<td>'.$wynik["Kwota_Zamowienia"].'</td>
			<td>'.$wynik["Status_Zamowienia"].'</td>
			</tr>';
	}
}
}
echo '</table>';
}
else{
	echo 'Brak zamówień';
}
}
else{
	$id = $_GET['id'];
	echo '<div class="row m-0 p-0 text-center">
		<h2 class="mr-auto ml-auto m-0 p-2">Zamówienie numer: '.$id.'</h2>
		</div>';

$sql = "select * from zamowienie where ID='$id'";
$query = mysqli_query($conn, $sql);
$wynik = mysqli_fetch_assoc($query);
echo '<table>
	<tr>
	<th>Imię i nazwisko</th>
	<th>Adres dostawy</th>
	<th>Kod pocztowy</th>
	<th>Data zamówienia</th>
	<th>Przewidywana data dostawy</th>
	<th>Kwota zamówienia</th>
	<th>Rodzaj płatności</th>
	<th>Rodzaj dostawy</th>
	<th>Status zamówienia</th>
	</tr>
	<tr>
	<td>'.$wynik["Imie_Nazwisko"].'</td>
	<td>'.$wynik["Adres_Dostawy"].'</td>
	<td>'.$wynik["Kod_Pocztowy"].'</td>
	<td>'.$wynik["Data_Zamowienia"].'</td>
	<td>'.$wynik["Przewidywana_Data_Dostawy"].'</td>
	<td>'.$wynik["Kwota_Zamowienia"].'</td>
	<td>'.$wynik["Rodzaj_Platnosci"].'</td>
	<td>'.$wynik["Rodzaj_Dostawy"].'</td>
	<td>'.$wynik["Status_Zamowienia"].'</td>
	</tr>
	</table>
	';

echo '<table>
<tr>
<th>Nazwa</th>
<th>Cena</th>
</tr>';

$idKarty = "SELECT kartagraficzna_idKartaGraficzna as ID FROM kartagraficzna_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($conn, $idKarty);
while($wynik = mysqli_fetch_assoc($ids)){
$produkty = "SELECT concat(p.nazwa, ' ', kg.nazwa) as nazwa, kg.cena as cena FROM kartagraficzna kg inner join producent p on kg.Producent_idProducent=p.idProducent WHERE kg.idKartaGraficzna = '".$wynik['ID']."'";
$query = mysqli_query($conn, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td><a href="kartyGraficzne.php?id='.$wynik["ID"].'">'.$produkt["nazwa"].'</a></td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idRam = "SELECT ram_idRam as ID FROM ram_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($conn, $idRam);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', r.nazwa, ' ', pojemnosc, 'GB') as nazwa, r.cena as cena FROM ram r inner join producent p on r.Producent_idProducent=p.idProducent WHERE r.idRam = '".$wynik['ID']."'";
	$query = mysqli_query($conn, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td><a href="ramy.php?id='.$wynik["ID"].'">'.$produkt["nazwa"].'</a></td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idDysk = "SELECT dysk_idDysk as ID FROM dysk_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($conn, $idDysk);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', d.nazwa) as nazwa, d.cena as cena FROM dysk d inner join producent p on d.Producent_idProducent=p.idProducent WHERE d.idDysk = '".$wynik['ID']."'";
	$query = mysqli_query($conn, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td><a href="dyski.php?id='.$wynik["ID"].'">'.$produkt["nazwa"].'</a></td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idKomputer = "SELECT komputer_idKomputer as ID FROM komputer_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($conn, $idKomputer);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT nazwa, cena FROM komputer where idKomputer = '".$wynik['ID']."'";
	$query = mysqli_query($conn, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td><a href="komputery.php?id='.$wynik["ID"].'">'.$produkt["nazwa"].'</a></td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idObudowa = "SELECT obudowa_idObudowa as ID FROM obudowa_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($conn, $idObudowa);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', o.nazwa) as nazwa, o.cena as cena FROM obudowa o inner join producent p on o.Producent_idProducent=p.idProducent WHERE o.idObudowa = '".$wynik['ID']."'";
	$query = mysqli_query($conn, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td><a href="obudowy.php?id='.$wynik["ID"].'">'.$produkt["nazwa"].'</a></td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idPlyta = "SELECT plytaglowna_idPlytaGlowna as ID FROM plytaglowna_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($conn, $idPlyta);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', pg.nazwa) as nazwa, pg.cena as cena FROM plytaglowna pg inner join producent p on pg.Producent_idProducent=p.idProducent WHERE pg.idPlytaGlowna = '".$wynik['ID']."'";
	$query = mysqli_query($conn, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td><a href="plytyGlowne.php?id='.$wynik["ID"].'">'.$produkt["nazwa"].'</a></td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idProcesor = "SELECT procesor_idProcesor as ID FROM procesor_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($conn, $idProcesor);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', pr.nazwa) as nazwa, pr.cena as cena FROM procesor pr inner join producent p on pr.Producent_idProducent=p.idProducent WHERE pr.idProcesor = '".$wynik['ID']."'";
	$query = mysqli_query($conn, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td><a href="procesory.php?id='.$wynik["ID"].'">'.$produkt["nazwa"].'</a></td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}
$idZasilacz = "SELECT zasilacz_idZasilacz as ID FROM zasilacz_has_zamowienia WHERE zamowienia_idZamowienia = '$id'";
$ids = mysqli_query($conn, $idZasilacz);
while($wynik = mysqli_fetch_assoc($ids)){
	$produkty = "SELECT concat(p.nazwa, ' ', z.nazwa, ' ', z.moc, 'W') as nazwa, z.cena as cena FROM zasilacz z inner join producent p on z.Producent_idProducent=p.idProducent WHERE z.idZasilacz = '".$wynik['ID']."'";
	$query = mysqli_query($conn, $produkty);
while($produkt = mysqli_fetch_assoc($query)){
	echo '<tr>
	<td><a href="zasilacze.php?id='.$wynik["ID"].'">'.$produkt["nazwa"].'</a></td>
	<td>'.$produkt["cena"].'</td>
	</tr>';

}
}

echo '</table>';
	
}
mysqli_close($conn);

    include_once 'footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>