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
</head>
<body>
<div class="container mt-2 form-control p-3">

    <div class="row">
        <div class="col col-md-6 col-sm-12"> <a href="panel.php?logout='1'" class="btn btn-outline-secondary mb-3 btn-block w-md-75 w-sm-100 mr-auto ml-auto ">Wyloguj</a></div>
        <div class="col col-md-6 col-sm-12"><a href="panel.php" class="btn btn-primary btn-block w-md-75 mb-3 mr-auto ml-auto w-sm-100 ">Wróć</a></div>
    </div>

<h1>Dodaj produkt do bazy</h1>

<div class="row p-md-3 m-0">
<a href="dodajProducent.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj producenta</a>
<a href="dodajZdjecie.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj zdjęcie</a>
<a href="dodajGwarancje.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj gwarancję</a><br>
<a href="dodajDysk.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj dysk</a><br>
<a href="dodajKarta.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj kartę graficzną</a><br>
<a href="dodajObudowa.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj obudowę</a><br>
<a href="dodajPlyta.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj płytę główną</a><br>
<a href="dodajProcesor.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj procesor</a><br>
<a href="dodajRam.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj pamięć RAM</a><br>
<a href="dodajZasilacz.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj zasilacz</a><br>
<a href="dodajKomputer.php" class="col col-md-4 btn btn-outline-primary btn-block w-100 mr-auto ml-auto mt-2">Dodaj komputer</a><br>
</div>
</div>

</body>
</html>