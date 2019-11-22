<head>
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body class="p-0 m-0">
<?php 
SESSION_START();
echo ($_SESSION['username']);
var_dump($_SESSION['username']);
include 'nav.php';
?>


<!-- Karuzela Bootstrap -->
<div class="container mt-2">
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

<div class="container">
    <div class="row">
        <div href="#" class="col-sm-4"><a href="#"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Komputery</h3></a></div>
        <div href="#" class="col-sm-4"><a href="#"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Karty graficzne</h3></a></div>
        <div href="#" class="col-sm-4"><a href="#"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Procesory</h3></a></div>
        <div href="#" class="col-sm-4"><a href="#"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">RAM</h3></a></div>
        <div href="#" class="col-sm-4"><a href="#"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">SSD</h3></a></div>
        <div href="#" class="col-sm-4"><a href="#"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">HDD</h3></a></div> 
        <div href="#" class="col-sm-4"><a href="#"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Zasilacze</h3></a></div>
        <div href="#" class="col-sm-4"><a href="#"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Obudowy</h3></a></div>
        <div href="#" class="col-sm-4"><a href="#"><h3 class=" border border-info rounded text-center p-2 mt-2 w-100">Płyty główne</h3></a></div>
    </div>
</div>
<!-- Koniec kafelek -->

<!-- Nasze propozycje: -->
<!-- Koniec naszych propozycji -->
<div class="row m-0 p-0 text-center">
<h1 class="mr-auto ml-auto p-2">Nasze propozycje:</h1>
</div>

<?php
include_once 'connection.php';

$sql = "SELECT g.Nazwa, g.Cena, g.TaktowaniePamieci, g.Cena, g.TaktowaniePamieci, g.TypPamieci, g.WielkoscPamieci, g.TypZlacza, g.zdjecie FROM kartygraficzne g LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='#' class='text-decoration-none row border text-dark border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h2 class='text-body'>$row[Nazwa]</h2>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$row[Zdjecie]' class='w-75 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Typ złącza:</b> $row[TypZlacza]</p>
            
            <p class='p-0 m-0'><b>Typ pamięci:</b> $row[TypPamieci]</p>
            
            <p class='p-0 m-0'><b>Wielkość pamięci:</b> $row[WielkoscPamieci]</p>
            
            <p class='p-0 m-0'><b>Taktowanie:</b> $row[TaktowaniePamieci]</p>
            
            </div>

            <div class='col-sm-3 m-0 p-0'><h3 class='text-info'>$row[Cena] zł </h3></div>
            </div>
          
          
          </a> <br> ";
    }
}        
$sql = "SELECT `Nazwa`, `Cena`, `Standard`, `Moc`, `Zdjecie` FROM zasilacze z LIMIT 1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='#' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h2 class='text-body'>$row[Nazwa]</h2>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$row[Zdjecie]' class='w-75 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Typ:</b> $row[Standard]</p>
            
            <p class='p-0 m-0'><b>Moc:</b> $row[Moc]</p>
            
            
            
            </div>

            <div class='col-sm-3 m-0 p-0'><h3 class='text-info'>$row[Cena] zł </h3></div>
            </div>
          
          
          </a> <br> ";
    }
}  

$sql = "SELECT Nazwa, Cena, Socket, IloscRdzeni, Taktowanie, Zdjecie FROM procesory LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='#' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h2 class='text-body'>$row[Nazwa]</h2>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$row[Zdjecie]' class='w-75 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Socket:</b> $row[Socket]</p>
            
            <p class='p-0 m-0'><b>Ilość rdzeni:</b> $row[IloscRdzeni]</p>
            
            <p class='p-0 m-0'><b>Taktowanie:</b> $row[Taktowanie] MHz</p>
            
            </div>

            <div class='col-sm-3 m-0 p-0'><h3 class='text-info'>$row[Cena] zł </h3></div>
            </div>
          
          
          </a> <br> ";
    }
}

$sql = "SELECT Nazwa, Cena, Czestotliwosc, Typ, Pojemnosc, Zdjecie FROM ramy LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='#' class='text-decoration-none row border text-dark row border border-info shadow rounded mr-2 ml-2'>
         
         <div class='col-md-12'>
          <h2 class='text-body'>$row[Nazwa]</h2>
          </div>
         
          <div class='row mt-2 mb-2 m-0 border-left'>
         
          <div class='col-sm-3'>
          <img src='$row[Zdjecie]' class='w-75 m-3'>
          </div>
          
          <div class='col-sm-6 pl-4 pr-0'>
          
            <p class='p-0 m-0'><b>Typ:</b> $row[Typ]</p>
            
            <p class='p-0 m-0'><b>Pojemniść:</b> $row[Pojemnosc]</p>
            
            <p class='p-0 m-0'><b>Częstotliwość:</b> $row[Czestotliwosc] MHz</p>
            
            </div>

            <div class='col-sm-3 m-0 p-0'><h3 class='text-info'>$row[Cena] zł </h3></div>
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
