<head>
    <link rel="stylesheet" hef="css/indexStyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<?php 
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
            <img src="images/procesor/intelCorei5-8600k.jpg" class="d-block w-25 mr-auto ml-auto" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/kartygraficzne/gigabyteGtx1660.jpg" class="d-block w-25 mr-auto ml-auto" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/ram/hyperxPredator16gb3200mhz.jpg" class="d-block w-25 mr-auto ml-auto" alt="...">
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
<!-- Koniec kafelek -->

<!-- Nasze propozycje: -->
<!-- Koniec naszych propozycji -->
<div class="row m-0 p-0">
<h1 class="text-center">Nasze propozycje:</h1>
</div>

<?php
include_once 'connection.php';

$sql = "SELECT g.Nazwa, g.Cena, o.SciezkaZdjecia FROM kartagraficzna g INNER JOIN zdjecia o ON g.Zdjecia_idZdjecia = o.idZdjecia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<b>Nazwa: </b>".$row["Nazwa"]." "."<b>Cena: </b>".$row["Cena"]." ". "<img src='$row[SciezkaZdjecia]' class='w-25 h-25 p-3'> <br>";
    }
}

$sql = "SELECT z.Nazwa, z.Cena, o.SciezkaZdjecia FROM zasilacz z INNER JOIN zdjecia o ON z.Zdjecia_idZdjecia = o.idZdjecia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<b>Nazwa: </b>".$row["Nazwa"]." "."<b>Cena: </b>".$row["Cena"]." ". "<img src='$row[SciezkaZdjecia]' class='w-25 h-25 p-3'> <br>";
    }
}

$sql = "SELECT p.Nazwa, p.Cena, o.SciezkaZdjecia FROM procesor p INNER JOIN zdjecia o ON p.Zdjecia_idZdjecia = o.idZdjecia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<b>Nazwa: </b>".$row["Nazwa"]." "."<b>Cena: </b>".$row["Cena"]." ". "<img src='$row[SciezkaZdjecia]' class='w-25 h-25 p-3'> <br>";
    }
}

$sql = "SELECT r.Nazwa, r.Cena, o.SciezkaZdjecia FROM ram r INNER JOIN zdjecia o ON r.Zdjecia_idZdjecia = o.idZdjecia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<b>Nazwa: </b>".$row["Nazwa"]." "."<b>Cena: </b>".$row["Cena"]." ". "<img src='$row[SciezkaZdjecia]' class='w-25 h-25 p-3'> <br>";
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