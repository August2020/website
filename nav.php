<head>
</head>
<body>
<?php $uri = basename($_SERVER['SCRIPT_NAME']); 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="row">
    <div class="col-md-12">
    <a class="navbar-brand" href="#">KRAS</a>
      <button type="button" class="btn btn-primary btn-sm p-2 mr-2">Logowanie</button>
      <button type="button" class="btn btn-secondary btn-sm p-2 mr-2">Rejestracja</button>
  </div>

  <div class="col-md-12">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php if ($uri == 'index.php') echo 'active';?>">
          <a class="nav-link" href="#">Strona Główna <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php if ($uri == 'kartyGraficzne.php') echo 'active';?>">
          <a class="nav-link" href="#">Karty Graficzne</a>
        </li>
        <li class="nav-item <?php if ($uri == 'ram.php') echo 'active';?>">
          <a class="nav-link" href="#">RAM</a>
        </li>
        <li class="nav-item <?php if ($uri == 'obudowy.php') echo 'active';?>">
          <a class="nav-link" href="#">odubowy</a>
        </li>
        <li class="nav-item <?php if ($uri == 'plytyGlowne.php') echo 'active';?>">
          <a class="nav-link" href="#">płyty główne</a>
        </li>
        <li class="nav-item <?php if ($uri == 'zasilacze.php') echo 'active';?>">
          <a class="nav-link" href="#">Zasilacze</a>
        </li>
        <li class="nav-item dropdown <?php if ($uri == 'procesory.php') echo 'active';?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Procesory
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Intel</a>
            <a class="dropdown-item" href="#">AMD</a>
          </div>
          </li>
          <li class="nav-item dropdown <?php if ($uri == 'dyski.php') echo 'active';?>">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dyski
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">SSD</a>
            <a class="dropdown-item" href="#">HDD</a>
          </div>
        </li>
        <li>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Napisz czego szukasz?" aria-label="Szukaj">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Szukaj</button>
          </form>
        </li>
      </ul>
      </div>
    </div>
  </div>
</nav>



</body>