<?php include('server.php') ?>

<!doctype html>
<html lang="pl">
<head>
<meta charset="utf-8">
<title>Panel</title>
</head>
<body>



<form action="register.php" method="POST">
<input type="text" placeholder="Login" name="username">
<input type="password" placeholder="Hasło" name="password">
<button type="submit" name="register">Dodaj</button>
</form>
<a href="login.php">Zaloguj się</a>



</body>
</html>