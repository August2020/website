<!DOCTYPE html>
<html lang="pl">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <title>Strona główna</title>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="materialize/css/materialize.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


</head>

<body>
<ul id="Komputery" class="dropdown-content">
    <li><a href="#!">Komputery dla graczy</a></li>
    <li class="divider"></li>
    <li><a href="#!">Komputery do pracy</a></li>
    <li class="divider"></li>
    <li><a href="#!">Serwery</a></li>
</ul>

<ul id="Laptopy" class="dropdown-content">
    <li><a href="#!">Laptopy dla graczy</a></li>
    <li class="divider"></li>
    <li><a href="#!">Laptopy do pracy</a></li>
    <li class="divider"></li>
</ul>

<ul id="Sprzet" class="dropdown-content">
    <li><a href="#!">Monitory</a></li>
    <li class="divider"></li>
    <li><a href="#!">Klawiatury</a></li>
    <li class="divider"></li>
    <li><a href="#!">Myszki</a></li>
</ul>
<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a class="dropdown-trigger" href="#!" data-target="Komputery">Komputery<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="Laptopy">laptopy<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="Sprzet">Sprzęt Komputerowy<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><form><div class="input-field"><input id="search" type="search" required><label class="label-icon" for="search"><i class="material-icons">search</i></label><i class="material-icons">close</i></div></form></li>
        </ul>
        <ul class="sidenav" id="mobile-demo">
            <li><a class="dropdown-trigger" href="#!" data-target="Komputery">Komputery<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="Laptopy">laptopy<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a class="dropdown-trigger" href="#!" data-target="Sprzet">Sprzęt Komputerowy<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><form><div class="input-field"><input id="search" type="search" required><label class="label-icon" for="search"><i class="material-icons">search</i></label><i class="material-icons">close</i></div></form></li>
        </ul>
    </div>

</nav>

<?php

?>


<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script>$(document).ready(function(){
        $('.modal').modal();
        $('.dropdown-trigger').dropdown();
        $('.sidenav').sidenav();
    });</script>
</body>
</html>