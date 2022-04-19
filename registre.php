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
    <form class="form-signin" autocomplete="off">
        <a class="logo-login" href="index.php">
            <span class="">Extreme </span>
            <img src="src/img/logo.png" alt="Extreme Snow">
            <span class=""> Snow</span>
        </a>
        
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="inputNom" class="sr-only">Nom</label>
                <input type="text" id="inputNom" class="form-control" placeholder="Nom" required="required">
            </div>
            <div class="col-12 col-md-6">
            <label for="inputCognom" class="sr-only">Cognom</label>
                <input type="text" id="inputCognom" class="form-control" placeholder="Cognom" required="required">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="inputDni" class="sr-only">DNI</label>
                <input type="text" id="inputDni" class="form-control" placeholder="DNI" required="required" maxlength="9">
            </div>
            <div class="col-12 col-md-6">
            <label for="inputTel" class="sr-only">DNI</label>
                <input type="tel" id="inputTel" class="form-control" placeholder="Telèfon" required="required" maxlength="9">
            </div>
        </div>

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" required="required" >

        <hr class="text-info">

        <label for="inputUser" class="sr-only">User</label>
        <input type="text" id="inputUser" class="form-control" placeholder="Usuari" required="required">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">

        <button class="btn btn-lg btn-block" type="submit">Entrar</button>
        <p>Ja estàs registrat? <a href="login.php" class="text-decoration-none text-success">Accedir!</a></p>
    </form>



    
    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>