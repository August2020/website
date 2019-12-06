<?php include('serwer.php') ?>
<!doctype html>
<html lang="pl">
<head>
<meta charset="utf-8">
<title>Panel</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<h2 class="text-center p-3 ">Zaloguj się do panelu</h2>
<div class="container mt-2 form-control p-3">
<form action="login.php" method="POST">
<input type="text" class="form-control m-3 w-75 mr-auto ml-auto " placeholder="Login" name="admin">
<input type="password" class="form-control m-3 w-75 mr-auto ml-auto" placeholder="Hasło" name="password">
<button type="submit" class="btn btn-primary btn-block w-50 mr-auto ml-auto m-3" name="login">Zaloguj</button>
</form>
    <button class="btn btn-secondary btn-block w-50 mr-auto ml-auto m-3k"><a href="../index.php" class="text-white text-decoration-none btn-link" >Strona główna</a> </button>
</div>


</body>
</html>