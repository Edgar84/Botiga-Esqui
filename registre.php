<?php
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="src/css/reset.css" />
    <link rel="stylesheet" href="src/css/bootstrap-4.6.1/bootstrap.min.css" />
    <link rel="stylesheet" href="src/css/fontawesome/all.min.css" />
    <link rel="stylesheet" href="src/css/style.css" />
</head>

<body class="text-center d-flex align-items-center">
    <form class="form-signin" autocomplete="off" method="POST">
        <a class="logo-login" href="index.php">
            <span class="">Extreme </span>
            <img src="src/img/logo.png" alt="Extreme Snow">
            <span class=""> Snow</span>
        </a>

        <div class="row">
            <div class="col-12 col-md-6">
                <label for="inputNom" class="sr-only">Nom</label>
                <input type="text" id="inputNom" class="form-control" placeholder="Nom" name="nom" required="required">
            </div>
            <div class="col-12 col-md-6">
                <label for="inputCognom" class="sr-only">Cognom</label>
                <input type="text" id="inputCognom" class="form-control" placeholder="Cognom" name="cognom" required="required">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <label for="inputDni" class="sr-only">DNI</label>
                <input type="text" id="inputDni" class="form-control" placeholder="DNI" maxlength="9" name="dni" required="required">
            </div>
            <div class="col-12 col-md-6">
                <label for="inputTel" class="sr-only">Telefon</label>
                <input type="tel" id="inputTel" class="form-control" placeholder="Telèfon" maxlength="9" name="telefon" required="required">
            </div>
        </div>

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required="required">

        <hr class="text-info">

        <label for="inputUser" class="sr-only">User</label>
        <input type="text" id="inputUser" class="form-control" placeholder="Usuari" name="usuari" required="required">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="required">

        <button class="btn btn-lg btn-block" type="submit" name="register" value="register">Registre</button>
        <p>Ja estàs registrat? <a href="login.php" class="text-decoration-none text-success">Accedir!</a></p>
    </form>


    <?php
    session_start();
    include('connectBD.php');
    if (isset($_POST['register'])) {

        $nom = $_POST['nom'];
        $cognom = $_POST['cognom'];
        $dni = $_POST['dni'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $user = $_POST['usuari'];
        $password = $_POST['password'];
        $password_hash = md5($password);


        $mobileregex = "/^6[0-9]{8}$/";

        $comprovacioTelefon = True;


        if (preg_match($mobileregex, $telefon) == false) {
            echo '<p class="alert alert-danger ">Format telefon incorrecte</p>';
            $comprovacioTelefon = false;
        }

        $query = $connection->prepare("SELECT * FROM client WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="alert alert-danger">Hi ha un usuari amb aquet correu</p>';
        }
        $query2 = $connection->prepare("SELECT * FROM client WHERE dni=:dni");
        $query2->bindParam("dni", $dni, PDO::PARAM_STR);
        $query2->execute();
        if ($query2->rowCount() > 0) {
            echo '<p class="alert alert-danger">Hi ha un usuari amb aquet dni</p>';
        }
        $query3 = $connection->prepare("SELECT * FROM client WHERE usuari=:user");
        $query3->bindParam("user", $user, PDO::PARAM_STR);
        $query3->execute();
        if ($query3->rowCount() > 0) {
            echo '<p class="alert alert-danger ">Hi ha un usuari amb aquet login</p>';
        }



        if ($query->rowCount() == 0 and $query2->rowCount() == 0  and $query3->rowCount() == 0 and $comprovacioTelefon == true) {
            $query = $connection->prepare("INSERT INTO client(dni,nom,cognom,telefon,email,usuari,pass) VALUES (:dni,:nom,:cognom,:telefon,:email,:usuari,:password_hash)");

            $query->bindParam("dni", $dni, PDO::PARAM_STR);
            $query->bindParam("nom", $nom, PDO::PARAM_STR);
            $query->bindParam("cognom", $cognom, PDO::PARAM_STR);
            $query->bindParam("telefon", $telefon, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("usuari", $usuari, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);

            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Usuari registrat</p>';
            } else {
                echo '<p class="error">Dades Incorrectes</p>';
            }
        }
    }
    ?>



    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>

</html>