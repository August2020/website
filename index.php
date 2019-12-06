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
?>


<!-- Karuzela Bootstrap -->
<div class="row sm-w-100 w-100 mr-auto ml-auto m-0 p-0">
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/slider/slide_ram.png" class="d-block w-100 mr-auto ml-auto" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/slider/slide2_karta.png" class="d-block w-100 mr-auto ml-auto" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/slider/slide3_procesor.png" class="d-block w-100 mr-auto ml-auto" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
</div>
<!-- Koniec Karuzeli -->
<!-- Tu będąkafelki z ikonkami -->

    <div class="row w-75 mr-auto ml-auto">
        <div href="#" class="col-sm-4"><a href="komputery.php"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Komputery</h3></a></div>
        <div href="#" class="col-sm-4"><a href="kartyGraficzne.php"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Karty graficzne</h3></a></div>
        <div href="#" class="col-sm-4"><a href="procesory.php"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Procesory</h3></a></div>
        <div href="#" class="col-sm-4"><a href="ramy.php"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">RAM</h3></a></div>
        <div href="#" class="col-sm-4"><a href="dyski.php?typ=SSD"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Dyski SSD</h3></a></div>
        <div href="#" class="col-sm-4"><a href="dyski.php?typ=HDD"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Dyski HDD</h3></a></div> 
        <div href="#" class="col-sm-4"><a href="zasilacze.php"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Zasilacze</h3></a></div>
        <div href="#" class="col-sm-4"><a href="obudowy.php"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Obudowy</h3></a></div>
        <div href="#" class="col-sm-4"><a href="plytyGlowne.php"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Płyty główne</h3></a></div>
    </div>

<!-- Koniec kafelek -->

<!-- Nasze propozycje: -->
<!-- Koniec naszych propozycji -->
<div class="row m-0 p-0 text-center">
<h1 class="mr-auto ml-auto m-0 p-2">Nasze propozycje:</h1>
</div>

<?php
include_once 'connection.php';

$sql = "SELECT ID, Nazwa, Cena, TaktowaniePamieci, Cena, TaktowaniePamieci, TypPamieci, WielkoscPamieci, TypZlacza, zdjecie FROM kartygraficzne  LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='kartyGraficzne.php?id=".$row['ID']."' class='text-decoration-none row border text-dark border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$row[Nazwa]</h1>
          </div>
         
          <div class='row w-100 mt-2 mb-2 mr-auto ml-auto m-0 border-left'>
         
          <div class='col-sm-3 w-100 p-4'>
          <img src='$row[Zdjecie]' class='w-100'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Typ złącza:</b> $row[TypZlacza]</p>
            
            <p class='p-0 m-0'><b>Typ pamięci:</b> $row[TypPamieci]</p>
            
            <p class='p-0 m-0'><b>Wielkość pamięci:</b> $row[WielkoscPamieci]</p>
            
            <p class='p-0 m-0'><b>Taktowanie:</b> $row[TaktowaniePamieci]</p>
            
            </div>

            <div class='col-sm-3 m-0 p-3'>
            <h3 class='text-info text-center '>$row[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> ";
    }
}        
$sql = "SELECT ID, Nazwa, Cena, Standard, Moc, Zdjecie FROM zasilacze z LIMIT 1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='zasilacze.php?id=".$row['ID']."' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$row[Nazwa]</h1>
          </div>
         
          <div class='row w-100 mt-2 mb-2 mr-auto ml-auto m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$row[Zdjecie]' class='w-100 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Typ:</b> $row[Standard]</p>
            
            <p class='p-0 m-0'><b>Moc:</b> $row[Moc]</p>
            
            
            
            </div>

            <div class='col-sm-3 m-0 p-3 w-100'>
            <h3 class='text-info text-center '>$row[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> ";
    }
}  

$sql = "SELECT ID, Nazwa, Cena, Socket, IloscRdzeni, Taktowanie, Zdjecie FROM procesory LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='procesory.php?id=".$row['ID']."' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$row[Nazwa]</h1>
          </div>
         
          <div class='row w-100 mt-2 mb-2 mr-auto ml-auto m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$row[Zdjecie]' class='w-100 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Socket:</b> $row[Socket]</p>
            
            <p class='p-0 m-0'><b>Ilość rdzeni:</b> $row[IloscRdzeni]</p>
            
            <p class='p-0 m-0'><b>Taktowanie:</b> $row[Taktowanie]</p>
            
            </div>

            <div class='col-sm-3 m-0 p-3 w-100'>
            <h3 class='text-info text-center '>$row[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> ";
    }
}

$sql = "SELECT ID, Nazwa, Cena, Czestotliwosc, Typ, Pojemnosc, Zdjecie FROM ramy LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='ramy.php?id=".$row['ID']."' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h1 class='text-body p-3'>$row[Nazwa]</h1>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$row[Zdjecie]' class='w-100 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Typ:</b> $row[Typ]</p>
            
            <p class='p-0 m-0'><b>Pojemność:</b> $row[Pojemnosc]</p>
            
            <p class='p-0 m-0'><b>Częstotliwość:</b> $row[Czestotliwosc]</p>
            
            </div>

            <div class='col-sm-3 m-0 p-3'>
            <h3 class='text-info text-center '>$row[Cena] zł </h3>
            <button name='addProduct' class='btn btn-primary btn-lg w-100 m-3 mr-auto ml-auto'><i class='fa fa-cart-plus pr-2'></i><b>Do koszyka</b></dutton>
            </div>
            </div>
          
          
          </a> <br> ";
    }
}


$conn->close();
?>

<!-- Stopka -->
<?php
    include_once 'footer.php';
?>
<!-- Koniec stopki -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
