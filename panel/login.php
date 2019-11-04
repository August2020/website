<?php include('server.php') ?>
<!doctype html>
<html lang="pl">
<head>
<meta charset="utf-8">
<title>Panel</title>
</head>
<body>


<form action="login.php" method="POST">
<input type="text" placeholder="Login" name="username">
<input type="password" placeholder="Hasło" name="password">
<button type="submit" name="login">Zaloguj</button>
</form>
<a href="register.php">Załóż konto</a>



</body>
</html>