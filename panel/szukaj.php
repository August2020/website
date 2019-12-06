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
<p>
<form action="szukaj.php" method="$_GET">
<input type="text" name="nazwa" placeholder="Wpisz nazwę" class="mr-auto ml-auto w-100"></input>
<button type="submit" name="szukaj" class="btn btn-primary btn-block  mr-auto ml-auto m-2">Szukaj</button>
</form>
</p>

<?php
require "polaczenie.php";

if(isset($_GET["szukaj"])){
	$nazwa = $_GET["nazwa"];
	
	echo '<table>
	<tr>
	<th>Nazwa</th>
	<th>Cena</th>
	</tr>';
	
	
	$sql = "SELECT concat(p.nazwa, ' ', kg.nazwa) as Nazwa, kg.cena as Cena FROM kartagraficzna kg inner join producent p on kg.Producent_idProducent=p.idProducent WHERE concat(p.nazwa, ' ', kg.nazwa) like '%$nazwa%'";
	if($query = mysqli_query($polaczenie, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo '<tr>
			<td>'.$wynik["Nazwa"].'</td>
			<td>'.$wynik["Cena"].'</td>
			</tr>';
	}}
	
	$sql = "SELECT concat(p.nazwa, ' ', r.nazwa, ' ', pojemnosc, 'GB [', r.IloscModulow,'x', r.PojemnoscModulu, 'GB ', r.Czestotliwosc, ' MHZ]') as Nazwa, r.cena as Cena FROM ram r inner join producent p on r.Producent_idProducent=p.idProducent WHERE concat(p.nazwa, ' ', r.nazwa, ' ', pojemnosc, 'GB [', r.IloscModulow,'x', r.PojemnoscModulu, ' ', r.Czestotliwosc, ' MHZ]') like '%$nazwa%'";
	if($query = mysqli_query($polaczenie, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo '<tr>
			<td>'.$wynik["Nazwa"].'</td>
			<td>'.$wynik["Cena"].'</td>
			</tr>';
	}}
	
	$sql = "SELECT concat(p.nazwa, ' ', o.nazwa) as Nazwa, o.cena as Cena FROM obudowa o inner join producent p on o.Producent_idProducent=p.idProducent WHERE concat(p.nazwa, ' ', o.nazwa) like '%$nazwa%'";
	if($query = mysqli_query($polaczenie, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo '<tr>
			<td>'.$wynik["Nazwa"].'</td>
			<td>'.$wynik["Cena"].'</td>
			</tr>';
	}}
	
	$sql = "SELECT concat(p.nazwa, ' ', z.nazwa, ' ', z.moc, 'W') as Nazwa, z.cena as Cena FROM zasilacz z inner join producent p on z.Producent_idProducent=p.idProducent WHERE concat(p.nazwa, ' ', z.nazwa, ' ', z.moc, 'W') like '%$nazwa%'";
	if($query = mysqli_query($polaczenie, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo '<tr>
			<td>'.$wynik["Nazwa"].'</td>
			<td>'.$wynik["Cena"].'</td>
			</tr>';
	}}
	
	$sql = "SELECT concat(p.nazwa, ' ', pr.nazwa) as Nazwa, pr.cena as Cena FROM procesor pr inner join producent p on pr.Producent_idProducent=p.idProducent WHERE concat(p.nazwa, ' ', pr.nazwa) like '%$nazwa%'";
	if($query = mysqli_query($polaczenie, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo '<tr>
			<td>'.$wynik["Nazwa"].'</td>
			<td>'.$wynik["Cena"].'</td>
			</tr>';
	}}
	
	$sql = "SELECT concat(p.nazwa, ' ', pg.nazwa) as Nazwa, pg.cena as Cena FROM plytaglowna pg inner join producent p on pg.Producent_idProducent=p.idProducent WHERE concat(p.nazwa, ' ', pg.nazwa) like '%$nazwa%'";
	if($query = mysqli_query($polaczenie, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo '<tr>
			<td>'.$wynik["Nazwa"].'</td>
			<td>'.$wynik["Cena"].'</td>
			</tr>';
	}}
	
	$sql = "SELECT concat(p.nazwa, ' ', d.nazwa, ' ', d.Pojemnosc,' GB') as Nazwa, d.cena as Cena FROM dysk d inner join producent p on d.Producent_idProducent=p.idProducent WHERE concat(p.nazwa, ' ', d.nazwa, ' ', d.Pojemnosc,' GB') like  '%$nazwa%'";
	if($query = mysqli_query($polaczenie, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo '<tr>
			<td>'.$wynik["Nazwa"].'</td>
			<td>'.$wynik["Cena"].'</td>
			</tr>';
	}}
	
	echo '</table>';
}
mysqli_close($polaczenie);
?>




</div>
</body>
</html>