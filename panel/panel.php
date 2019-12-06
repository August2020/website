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

<?php if(isset($_SESSION['admin'])) :?>
    <h3 class="text-center">Witaj <?php echo $_SESSION['admin']; ?> </h3>
    <p class="w-50 mr-auto ml-auto text-center">Zalogowałeś się do panelu sklepu</p>
        <a href="register.php" class="btn btn-outline-primary btn-block w-50 mr-auto ml-auto ">Dodaj administratora</a>
    <br>
        <a href="zamowienia.php" class="btn btn-outline-primary btn-block w-50 mr-auto ml-auto ">Zamowienia</a>
    <br>
    <a href="dodaj.php" class="btn btn-outline-primary btn-block w-50 mr-auto ml-auto "> Dodaj produkty</a>
    <br>
    <a href="szukaj.php" class="btn btn-outline-primary btn-block w-50 mr-auto ml-auto "> Wyszukaj produkt</a>

    <div class="row m-3">

        <a href="../index.php" class="btn btn-primary btn-block w-25 mr-2 ml-auto m-1">Strona główna</a>
        <a href="panel.php?logout='1'" class="btn btn-outline-secondary btn-block w-25 mr-auto ml-2 m-1"> Wyloguj</a>

    </div>


</div>
<?php endif ?>
</body>
</html>