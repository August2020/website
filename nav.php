<head>
</head>
<body>
<?php
$uri = basename($_SERVER['SCRIPT_NAME']); 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="row">
    <div class="col-md-12">
    <a class="navbar-brand" href="index.php">KRAS</a>
      <?php
      if(!isset($_SESSION['username'])){
        echo '
        <button type="button" class="btn btn-primary btn-sm p-2 mr-2"><a href="logowanie.php" class=" text-white text-decoration-none">Logowanie</a></button>
        <button type="button" class="btn btn-secondary btn-sm p-2 mr-2"><a href="rejestracja.php" class="text-white text-decoration-none"> Rejestracja</a></button>';
      }
      else if(isset($_SESSION['username'])){
        echo $_SESSION['username'];
        echo '<a href="index.php?wyloguj=1"> wyloguj</a>
			<a href="zamowione.php">Moje zamówienia</a>
			<a href="mojekonto.php">Moje konto</a>';
      }
      if(isset($_GET['wyloguj'])){
        SESSION_UNSET();
        unset($_SESSION['username']);
        header('Location: index.php');
      }
      ?>
      
  </div>

  <div class="col-md-12">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if ($uri == 'index.php') echo 'active';?>">
          <a class="nav-link" href="index.php">Strona Główna <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php if ($uri == 'kartyGraficzne.php') echo 'active';?>">
          <a class="nav-link" href="kartyGraficzne.php">Karty Graficzne</a>
        </li>
        <li class="nav-item <?php if ($uri == 'ramy.php') echo 'active';?>">
          <a class="nav-link" href="ramy.php">RAM</a>
        </li>
        <li class="nav-item <?php if ($uri == 'obudowy.php') echo 'active';?>">
          <a class="nav-link" href="obudowy.php">Obudowy</a>
        </li>
        <li class="nav-item <?php if ($uri == 'plytyGlowne.php') echo 'active';?>">
          <a class="nav-link" href="plytyGlowne.php">Płyty główne</a>
        </li>
        <li class="nav-item <?php if ($uri == 'zasilacze.php') echo 'active';?>">
          <a class="nav-link" href="zasilacze.php">Zasilacze</a>
        </li>
        <li class="nav-item dropdown <?php if ($uri == 'procesory.php') echo 'active';?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Procesory
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="procesory.php?producent=INTEL">Intel</a>
            <a class="dropdown-item" href="procesory.php?producent=AMD">AMD</a>
          </div>
          </li>
          <li class="nav-item dropdown <?php if ($uri == 'dyski.php') echo 'active';?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dyski
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="dyski.php?typ=SSD">SSD</a>
            <a class="dropdown-item" href="dyski.php?typ=HDD">HDD</a>
          </div>
        </li>
		<li class="nav-item <?php if ($uri == 'komputery.php') echo 'active';?>">
          <a class="nav-link" href="komputery.php">Komputery</a>
        </li>
        <li>
          <form class="form-inline my-2 my-lg-0" action="wyszukiwanie.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Napisz czego szukasz?" name="nazwa" aria-label="Szukaj">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Szukaj</button>
          <!--<button href="zamowienia.php" class="btn btn-primary btn-lg m-2"><i class="<i class="fa fa-cart-arrow-down"></i>"></i></dutton>-->
          </form>
		  <button class="btn btn-primary btn-lg m-2"><i class="fa fa-shopping-cart"></i></button>
        </li>
      </ul>
      </div>
    </div>
  </div>
</nav>



</body>