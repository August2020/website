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

<h1>Dodaj gwarancję</h1>

<form action='dodajGwarancje.php' method='POST'>

    <div class="row w-md-100 w-sm-75 mr-auto ml-auto">
        <div class="col col-md-4 col-sm-12 w-100">
            <input type="number" placeholder="Długość gwarancji w latach" name="lat"></input>
        </div>
        <div class="col col-md-4 col-sm-12">
            <select name="miejsce p-3">
                <option disabled selected>Wybierz miejsce gwarancji...</option>
                <option value="Sklep">Sklep</option>
                <option value="Serwis producenta">Serwis producenta</option>
            </select>
        </div>
    <div class="col col-md-4 col-sm-12">
<button type="submit" name="dodajGwarancje" class="btn btn-primary btn-block  mr-auto ml-auto m-0">Dodaj</button>
    </div>
    </div>


</form>
<div>


<?php
require "polaczenie.php";

$sql = "select concat(DlugoscGwarancji, ' Lat/a - ', MiejsceGwarancji) as gwarancja from gwarancja";
$query = mysqli_query($polaczenie, $sql);
echo '<table class="table row overflow-auto mt-2 mr-1 ml-1 w-sm-75" style="overflow: auto">
	<thead class="thead-dark">
	<tr>
	<th>Gwarancja</th>
	</tr>';
while($wynik = mysqli_fetch_assoc($query)){
	echo '<tr>
		<td>'.$wynik["gwarancja"].'</td>
		</tr>';
}
echo '</table>';


if(isset($_POST['dodajGwarancje'])){
	$miejsce = $_POST['miejsce'];
	$lat = $_POST['lat'];
	$dodajGwarancje = "insert into gwarancja(DlugoscGwarancji, MiejsceGwarancji) values ('$lat','$miejsce')";
	if(mysqli_query($polaczenie, $dodajGwarancje)){
		echo "<script type='text/javascript'>
		alert('Dodano do bazy');
		window.location= 'dodajGwarancje.php';
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