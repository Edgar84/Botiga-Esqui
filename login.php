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
    <form class="form-signin" method="POST">
        <a class="logo-login" href="index.php">
            <span class="">Extreme </span>
            <img src="src/img/logo.png" alt="Extreme Snow">
            <span class=""> Snow</span>
        </a>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="" name="email">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
        <button class="btn btn-lg btn-block" type="submit" name="login" value="login">Entrar</button>
        <p class="text-muted">No tens compte? <a href="registre.php" class="text-decoration-none text-success">Registra't!</a></p>
    </form>


    <?php
    session_start();
    include('connectBD.php');
    if (isset($_POST['login'])) {
        
    
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = md5($password);


        $query = $connect->prepare("SELECT * FROM client WHERE email=:email and pass=:password");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("password", $password_hash, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            
           $row=$query->fetch();
           $_SESSION["usuari"] = $row["usuari"];
         

           header( 'Location: index.php' );

        }else{
            echo '<p class="alert alert-danger">No hi ha cap</p>';
        }
    }
?>


    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>

</body>
</html>