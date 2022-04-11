<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="src/css/reset.css"/>
    <link rel="stylesheet" href="src/css/bootstrap-4.6.1/bootstrap.min.css"/>
    <link rel="stylesheet" href="src/css/fontawesome/all.min.css"/>
    <link rel="stylesheet" href="src/css/style.css"/>
</head>
<body class="text-center d-flex align-items-center">
    <form class="form-signin">
        <a class="logo-login" href="index.php">
            <span class="">Extreme </span>
            <img src="src/img/logo.png" alt="Extreme Snow">
            <span class=""> Snow</span>
        </a>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        <button class="btn btn-lg btn-block" type="submit">Entrar</button>
    </form>



    <script src="src/js/functions.js"></script>
    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>