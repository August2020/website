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
    <h2 class="text-center">Zamówienia</h2>
<div class="row">
    <div class="col col-md-6 col-sm-12"> <a href="panel.php?logout='1'" class="btn btn-outline-secondary mb-3 btn-block w-md-75 w-sm-100 mr-auto ml-auto ">Wyloguj</a></div>
    <div class="col col-md-6 col-sm-12"><a href="panel.php" class="btn btn-primary btn-block w-md-75 mb-3 mr-auto ml-auto w-sm-100 ">Wróć</a></div>
</div>



<div class="row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto">
<?php
require "polaczenie.php";

if(isset($_GET['page'])){
	$page = $_GET['page'];
} else{
	$page = 1;
}

$rekord_na_strone = 5;
$offset = ($page-1)*$rekord_na_strone;

$wszystkie_strony = "select count(*) from zamowienie";
$wyn = mysqli_query($polaczenie, $wszystkie_strony);
$rows = mysqli_fetch_array($wyn)[0];
$ile_stron = ceil($rows / $rekord_na_strone);

$zapytanie = "select * from zamowienie limit $rekord_na_strone offset $offset";
$wynik = mysqli_query($polaczenie, $zapytanie);

echo '<table class="table w-md-75 mr-auto ml-auto">
<thead class="thead-dark">
	<tr>
		<th scope="col">ID</th>
		<th scope="col">Imię i nazwisko</th>
		<th scope="col">Data zamówienia</th>
		<th scope="col">Kwota zamówienia</th>
		<th scope="col">Status zamówienia</th>
	</tr></thead>';
while ($rekord = mysqli_fetch_assoc($wynik)){
	echo '<tbody><tr>
		<td scope="row"><a href="szczegoly.php?id='.$rekord["ID"].'">'.$rekord["ID"].'</a></td>
		<td>'.$rekord["Imie_Nazwisko"].'</td>
		<td>'.$rekord["Data_Zamowienia"].'</td>
		<td>'.$rekord["Kwota_Zamowienia"].'</td>
		<td>'.$rekord["Status_Zamowienia"].'</td>
		</tr></tbody>';
}
echo '</table>';
mysqli_close($polaczenie)
?>

<br />
<div class="row w-100 ">
<?php
for($i=1; $i<=$ile_stron;$i++){
	echo '<a class="btn btn-primary mr-auto ml-auto rounded-circle" href="?page='.$i.'"> '.$i.'</a>';
}
?>
</div>
</div>
</div>






</body>
</html>