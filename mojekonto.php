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

$sql = "select * from klienci where Email = '".$_SESSION['username']."'";
$query = mysqli_query($conn, $sql);

while ($wynik = mysqli_fetch_assoc($query)){

echo '
<div class="container w-50">
<div class="card">
<article class="card-body">
<h4 class="card-title mb-4 mt-1">Zmiana danych konta</h4>
	 <form action="mojekonto.php" method="POST">
    <div class="form-group">
    	<label>Email</label>
        <input class="form-control" placeholder="Email" value="'.$wynik["Email"].'" type="email" name="username" required>
    </div> <!-- form-group// -->
    <div class="form-group">
    	<label>Imie</label>
        <input class="form-control" placeholder="Imie" value="'.$wynik["Imie"].'" type="text" name="imie" required>
    </div>
    <div class="form-group">
    	<label>Nazwisko</label>
        <input class="form-control" placeholder="Nazwisko" value="'.$wynik["Nazwisko"].'" type="text" name="nazwisko" required>
    </div>
	<div class="form-group">
    	<label>Adres</label>
        <input class="form-control" placeholder="Miasto, ul.Ulica nrLokalu" value="'.$wynik["Adres"].'" type="text" name="adres" required>
    </div>
	<div class="form-group">
    	<label>Kod pocztowy</label>
        <input class="form-control" placeholder="xx-xxx" value="'.$wynik["KodPocztowy"].'" pattern="[0-9]{2}-[0-9]{3}" type="text" name="kod" required>
    </div>
	<div class="form-group">
    	<label>Data urodzenia</label>
        <input class="form-control" type="date" value="'.$wynik["DataUrodzenia"].'" name="data" required>
    </div>
	<div class="form-group">
    	<label>Hasło:</label>
        <input class="form-control" placeholder="******" type="password"  name="password" required>
    </div>  
    <div class="form-group">
    <label>Potwierdź hasło:</label>
        <input class="form-control" placeholder="******" type="password"  name="password2" required>
    </div> 
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block w-75 mr-auto ml-auto" name="update"> Zaktualizuj  </button>
    </div> <!-- form-group// -->                                                           
</form>
</article>
</div>
</div>

';
}
	
if(isset($_POST["update"])){
	$username =  $_POST['username'];
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$kod = $_POST['kod'];
	$adres = $_POST['adres'];
	$data = $_POST['data'];
	$password = MD5($_POST['password']);
	$password2 = MD5($_POST['password2']);
	
	if($_SESSION['username'] != $username){
	
	$sql = "select * from klienci where Email = '$username'";
	$query = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($query) > 0){
		echo "<script type='text/javascript'>
			alert('Taki Email już istnieje!');
			window.location= 'mojekonto.php';
			</script>";
	}
	}
	else{
		$sql = "select * from klienci where Email = '".$_SESSION['username']."' and Haslo = '$password'";
		$query = mysqli_query($conn, $sql);
		if(mysqli_num_rows($query) > 0){
			var_dump($query);
		if($password2 == $password){
			$sql = "update klienci set Email = '$username', Imie='$imie', Nazwisko='$nazwisko', Adres='$adres', KodPocztowy='$kod', DataUrodzenia='$data' where Email = '".$_SESSION['username']."' and Haslo = '$password'";
			if(mysqli_query($conn, $sql)){
				echo "<script type='text/javascript'>
				alert('Zmieniono dane!');
				window.location= 'mojekonto.php';
				</script>";
				$_SESSION['username'] = $username;
			}
			else{
				echo "<script type='text/javascript'>
				alert('Wystąpił błąd!');
				window.location= 'mojekonto.php';
				</script>";
			}
		}
		else{
			echo "<script type='text/javascript'>
				alert('Hasła nie są takie same!');
				window.location= 'mojekonto.php';
				</script>";
		}
	}
	
	else{
		echo "<script type='text/javascript'>
			alert('Błędne hasło!');
			window.location= 'mojekonto.php';
			</script>";
	}
	}
}


mysqli_close($conn);



  include_once 'footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>