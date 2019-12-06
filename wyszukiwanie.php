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
if(!isset($_GET['nazwa'])){
	header ("location: index.php");
}
?>
<div class="row m-0 p-0 text-center">
<h1 class="mr-auto ml-auto m-0 p-2">Znalezione:</h1>
</div>

<?php
if(isset($_GET['nazwa'])){
	$nazwa = $_GET["nazwa"];
	require "connection.php";
	
	$sql = "SELECT idKartaGraficzna as ID, concat(p.nazwa, ' ', kg.nazwa) as Nazwa, kg.cena as Cena, kg.TypZlacza, kg.TypPamieci, kg.WielkoscPamieci, kg.TaktowaniePamieci, z.SciezkaZdjecia FROM kartagraficzna kg inner join producent p on kg.Producent_idProducent=p.idProducent inner join zdjecia z on kg.Zdjecia_idZdjecia = z.idZdjecia WHERE concat(p.nazwa, ' ', kg.nazwa) like '%$nazwa%'";
	if($query = mysqli_query($conn, $sql)){
		while ($wynik = mysqli_fetch_assoc($query)){
			echo "<a href='kartyGraficzne.php?id=".$wynik['ID']."' class='text-decoration-none row border text-dark border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$wynik[Nazwa]</h1>
          </div>
         
          <div class='row w-100 mt-2 mb-2 mr-auto ml-auto m-0 border-left'>
         
          <div class='col-sm-3 w-100 p-4'>
          <img src='$wynik[SciezkaZdjecia]' class='w-100'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Typ złącza:</b> $wynik[TypZlacza]</p>
            
            <p class='p-0 m-0'><b>Typ pamięci:</b> $wynik[TypPamieci]</p>
            
            <p class='p-0 m-0'><b>Wielkość pamięci:</b> $wynik[WielkoscPamieci] MB</p>
            
            <p class='p-0 m-0'><b>Taktowanie:</b> $wynik[TaktowaniePamieci] Mhz</p>
            
            </div>

            <div class='col-sm-3 m-0 p-3'>
            <h3 class='text-info text-center '>$wynik[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> ";
		}
	}
	
	$sql = "SELECT idRam as ID, concat(p.nazwa, ' ', r.nazwa, ' ', pojemnosc, 'GB [', r.IloscModulow,'x', r.PojemnoscModulu, 'GB ', r.Czestotliwosc, ' MHZ]') as Nazwa, r.cena as Cena, r.Typ, r.Pojemnosc, r.Czestotliwosc, z.SciezkaZdjecia FROM ram r inner join producent p on r.Producent_idProducent=p.idProducent inner join zdjecia z on r.Zdjecia_idZdjecia = z.idZdjecia WHERE concat(p.nazwa, ' ', r.nazwa, ' ', pojemnosc, 'GB [', r.IloscModulow,'x', r.PojemnoscModulu, ' ', r.Czestotliwosc, ' MHZ]') like '%$nazwa%'";
	if($query = mysqli_query($conn, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo "<a href='ramy.php?id=".$wynik['ID']."' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$wynik[Nazwa]</h1>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$wynik[SciezkaZdjecia]' class='w-100 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Typ:</b> $wynik[Typ]</p>
            
            <p class='p-0 m-0'><b>Pojemność:</b> $wynik[Pojemnosc] GB</p>
            
            <p class='p-0 m-0'><b>Częstotliwość:</b> $wynik[Czestotliwosc] MHz</p>
            
            </div>

            <div class='col-sm-3 m-0 p-3'>
            <h3 class='text-info text-center '>$wynik[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> ";
	}}
	
	$sql = "SELECT idDysk as ID, concat(p.nazwa, ' ', d.nazwa, ' ', d.Pojemnosc,' GB') as Nazwa, d.cena as Cena, d.Typ, d.Pojemnosc, d.Interfejs, z.SciezkaZdjecia FROM dysk d inner join producent p on d.Producent_idProducent=p.idProducent inner join zdjecia z on d.Zdjecia_idZdjecia=z.idZdjecia WHERE concat(p.nazwa, ' ', d.nazwa, ' ', d.Pojemnosc,' GB') like  '%$nazwa%'";
	if($query = mysqli_query($conn, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo "<a href='dyski.php?id=".$wynik['ID']."' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$wynik[Nazwa]</h1>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$wynik[SciezkaZdjecia]' class='w-100 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Typ:</b> $wynik[Typ]</p>
            
            <p class='p-0 m-0'><b>Pojemność:</b> $wynik[Pojemnosc] GB</p>
            
            <p class='p-0 m-0'><b>Interfejs:</b> $wynik[Interfejs]</p>
            
            </div>

            <div class='col-sm-3 m-0 p-3'>
            <h3 class='text-info text-center '>$wynik[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> ";
	}}
	
	$sql = "SELECT idPlytaGlowna as ID, concat(p.nazwa, ' ', pg.nazwa) as Nazwa, pg.cena as Cena, pg.Chipset, pg.GniazdoProcesora, pg.StandardPlyty, z.SciezkaZdjecia FROM plytaglowna pg inner join producent p on pg.Producent_idProducent=p.idProducent inner join zdjecia z on pg.Zdjecia_idZdjecia=z.idZdjecia WHERE concat(p.nazwa, ' ', pg.nazwa) like '%$nazwa%'";
	if($query = mysqli_query($conn, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo "<a href='plytyGlowne.php?id=".$wynik['ID']."' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$wynik[Nazwa]</h1>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$wynik[SciezkaZdjecia]' class='w-100 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Chipset:</b> $wynik[Chipset]</p>
            
            <p class='p-0 m-0'><b>Gniazdo procesora:</b> $wynik[GniazdoProcesora]</p>
            
            <p class='p-0 m-0'><b>Standard:</b> $wynik[StandardPlyty]</p>
            
            </div>

            <div class='col-sm-3 m-0 p-3'>
            <h3 class='text-info text-center '>$wynik[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> ";
	}}
	
	$sql = "SELECT idObudowa as ID, concat(p.nazwa, ' ', o.nazwa) as Nazwa, o.cena as Cena, o.Typ, o.Komponenty, o.RGB, z.SciezkaZdjecia FROM obudowa o inner join producent p on o.Producent_idProducent=p.idProducent inner join zdjecia z on o.Zdjecia_idZdjecia=z.idZdjecia WHERE concat(p.nazwa, ' ', o.nazwa) like '%$nazwa%'";
	if($query = mysqli_query($conn, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo "<a href='obudowy.php?id=".$wynik['ID']."' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$wynik[Nazwa]</h1>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$wynik[SciezkaZdjecia]' class='w-100 m-3'>
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
          
          
          </a> <br> ";
	}}
	
	$sql = "SELECT pr.idProcesor as ID, concat(p.nazwa, ' ', pr.nazwa) as Nazwa, pr.cena as Cena, pr.Socket, pr.IloscRdzeni, pr.Taktowanie, z.SciezkaZdjecia FROM procesor pr inner join producent p on pr.Producent_idProducent=p.idProducent inner join zdjecia z on pr.Zdjecia_idZdjecia=z.idZdjecia  WHERE concat(p.nazwa, ' ', pr.nazwa) like '%$nazwa%'";
	if($query = mysqli_query($conn, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo "<a href='procesory.php?id=".$wynik['ID']."' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$wynik[Nazwa]</h1>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$wynik[SciezkaZdjecia]' class='w-100 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Socket:</b> $wynik[Socket]</p>
            
            <p class='p-0 m-0'><b>Ilość rdzeni:</b> $wynik[IloscRdzeni]</p>
            
            <p class='p-0 m-0'><b>Taktowanie:</b> $wynik[Taktowanie] MHz</p>
            
            </div>

            <div class='col-sm-3 m-0 p-3'>
            <h3 class='text-info text-center '>$wynik[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> ";
	}}
	
	$sql = "SELECT z.idZasilacz as ID, concat(p.nazwa, ' ', z.nazwa, ' ', z.moc, 'W') as Nazwa, z.cena as Cena, z.Moc, z.Standard, zd.SciezkaZdjecia FROM zasilacz z inner join producent p on z.Producent_idProducent=p.idProducent inner join zdjecia zd on z.Zdjecia_idZdjecia=zd.idZdjecia WHERE concat(p.nazwa, ' ', z.nazwa, ' ', z.moc, 'W') like '%$nazwa%'";
	if($query = mysqli_query($conn, $sql)){
	while ($wynik = mysqli_fetch_assoc($query)){
		echo "<a href='zasilacze.php?id=".$wynik['ID']."' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$wynik[Nazwa]</h1>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$wynik[SciezkaZdjecia]' class='w-100 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Moc:</b> $wynik[Moc]W</p>
            
            <p class='p-0 m-0'><b>Standard:</b> $wynik[Standard]</p>
            
            </div>

            <div class='col-sm-3 m-0 p-3'>
            <h3 class='text-info text-center '>$wynik[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> ";
	}}
	
}
mysqli_close($conn);
?>




<?php
    include_once 'footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>