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

require "connection.php";

if(isset($_GET["id"])){
	$id = $_GET["id"];
	
	$sql = "select * from obudowy where ID = '$id'";
	$query = mysqli_query($conn, $sql);
	$wynik = mysqli_fetch_assoc($query);
	
	echo "<div class='col-md-12'>
          <h1 class='text-body p-3'>$wynik[Nazwa]</h1>
          </div>
         
          <div class='row w-100 mt-2 mb-2 mr-auto ml-auto m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$wynik[Zdjecie]' class='w-75 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0 h4 font-weight-normal'> $wynik[Opis]</p>
            
            
            </div>

            <div class='col-sm-3 m-0 p-3 w-100'>
            <h3 class='text-info text-center '>$wynik[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
			
			<div class='col-sm-12 pl-4 pr-0 text-center'>
          
            <p class='p-0 m-2 h4 font-weight-normal'><b>Producent:</b> $wynik[Producent]</p>
			
            <p class='p-0 m-2 h4 font-weight-normal'><b>Typ:</b> $wynik[Typ]</p>
            
            <p class='p-0 m-2 h4 font-weight-normal'><b>Standard:</b> $wynik[Standard]</p>
			
            <p class='p-0 m-2 h4 font-weight-normal'><b>Złącza panelu przedniego:</b> $wynik[ZlaczaPaneluPrzedniego]</p>
			
            <p class='p-0 m-2 h4 font-weight-normal'><b>Komponenty:</b> $wynik[Komponenty]</p>
			
            <p class='p-0 m-2 h4 font-weight-normal'><b>Podświetlenie RGB:</b> $wynik[RGB]</p>
			
            <p class='p-0 m-2 h4 font-weight-normal'><b>Długość gwarancji:</b> $wynik[DlugoscGwarancji]</p>
			
            <p class='p-0 m-2 h4 font-weight-normal'><b>Miejsce gwarancji:</b> $wynik[MiejsceGwarancji]</p>
            
            </div>
			
            </div>
          
          
         <br> ";
}
else{
echo "<div class='row mr-0 ml-0'>";

$sql = "select * from obudowy";
$query = mysqli_query($conn, $sql);
while($wynik = mysqli_fetch_assoc($query)){
	echo "<div class='col-md-12 col-sm-12 mr-0 ml-0'><a href='obudowy.php?id=".$wynik['ID']."' class='text-decoration-none row border text-dark border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$wynik[Nazwa]</h1>
          </div>
         
          <div class='row w-100 mt-2 mb-2 mr-auto ml-auto m-0 border-left'>
         
          <div class='col-sm-3 w-100 p-4'>
          <img src='$wynik[Zdjecie]' class='w-100'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Typ:</b> $wynik[Typ]</p>
            
            <p class='p-0 m-0'><b>Komponenty:</b> $wynik[Komponenty]</p>
            
			<p class='p-0 m-0'><b>Podświetlenie RGB:</b> $wynik[RGB]</p>
			
            </div>

            <div class='col-sm-3 m-0 p-3'>
            <h3 class='text-info text-center '>$wynik[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> </div>";
}
}




mysqli_close($conn);
?>

</div>

<?php
    include_once 'footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>