<?php include('server.php'); ?>
<head>
<link rel="stylesheet" type="text/css" href="css/logowanieStyle.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container w-50">
<div class="card">
<article class="card-body">
<a href="logowanie.php" class="float-right btn btn-outline-primary">Logowanie</a>
<h4 class="card-title mb-4 mt-1">Zarejestruj się</h4>
	 <form action="rejestracja.php" method="POST">
    <div class="form-group">
    	<label>Email</label>
        <input class="form-control" placeholder="Email" type="email" name="username" required>
    </div> <!-- form-group// -->
    <div class="form-group">
    	<label>Imie</label>
        <input class="form-control" placeholder="Imie" type="text" name="imie" required>
    </div>
    <div class="form-group">
    	<label>Nazwisko</label>
        <input class="form-control" placeholder="Nazwisko" type="text" name="nazwisko" required>
    </div>
	<div class="form-group">
    	<label>Adres</label>
        <input class="form-control" placeholder="Miasto, ul.Ulica nrLokalu	" type="text" name="adres" required>
    </div>
	<div class="form-group">
    	<label>Kod pocztowy</label>
        <input class="form-control" placeholder="xx-xxx" pattern="[0-9]{2}-[0-9]{3}" type="text" name="kod" required>
    </div>
	<div class="form-group">
    	<label>Data urodzenia</label>
        <input class="form-control" type="date" name="data" required>
    </div>
    <div class="form-group">
    	<label>Hasło:</label>
        <input class="form-control" placeholder="******" type="password"  name="password" required>
    </div> <!-- form-group// --> 
    <div class="form-group">
    <label>Potwierdź hasło:</label>
        <input class="form-control" placeholder="******" type="password"  name="password2" required>
    </div> 
    </div> <!-- form-group// -->  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block w-75 mr-auto ml-auto" name="register"> Zarejestruj  </button>
    </div> <!-- form-group// -->                                                           
</form>
</article>
</div>
</div>
</body> 