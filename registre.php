<?php
session_start();
$errorDni = "";

include('connectBD.php');
// crear una fuccio en la mysql per verificar si es un usuari normal
if (isset($_POST['register'])) {

    $nom = $_POST['nom'];
    $cognom = $_POST['cognom'];
    $dni = $_POST['dni'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $user = $_POST['usuari'];
    $password = $_POST['password'];
    $password_hash = md5($password);

    // $nivell = $_POST['nivell'];
    // $data_caducitat = $_POST['data_caducitat'];
    // $num_federacio = $_POST['num_federacio'];

    // $num_familia_numerosa = $_POST['num_familia_numerosa'];
    // $data_caducitat_familia = $_POST['data_caducitat_familia'];





    $mobileregex = "/^6[0-9]{8}$/";

    $comprovacioTelefon = True;


    if (preg_match($mobileregex, $telefon) == false) {
        echo '<p class="alert alert-danger ">Format telefon incorrecte</p>';
        $comprovacioTelefon = false;
    }

    $query = $connect->prepare("SELECT * FROM client WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        $errorDni = ' <p class="alert alert-danger">Hi ha un usuari amb aquet correu</p>';
    }
    else{
        $errorDni="";
    }
    $query2 = $connect->prepare("SELECT * FROM client WHERE dni=:dni");
    $query2->bindParam("dni", $dni, PDO::PARAM_STR);
    $query2->execute();
    if ($query2->rowCount() > 0) {
        echo '<p class="alert alert-danger">Hi ha un usuari amb aquet dni</p>';
    }
    $query3 = $connect->prepare("SELECT * FROM client WHERE usuari=:user");
    $query3->bindParam("user", $user, PDO::PARAM_STR);
    $query3->execute();
    if ($query3->rowCount() > 0) {
        echo '<p class="alert alert-danger ">Hi ha un usuari amb aquet login</p>';
    }



    if ($query->rowCount() == 0 and $query2->rowCount() == 0  and $query3->rowCount() == 0 and $comprovacioTelefon == true) {
        $query = $connect->prepare("INSERT INTO client(dni,nom,cognom,telefon,email,usuari,pass) VALUES (:dni,:nom,:cognom,:telefon,:email,:usuari,:password_hash)");
        // crear functions familia numerosa federat una o altra
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
                <?php echo $errorDni ?>
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






        <!-- <div class="checkbox-card">
            <label for="">Ets federat?</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="checkme">Si
                </label>
            </div>
            <div class="passport-box">

                <input type="text" id="inputUser" class="form-control" placeholder="Nivell" name="nivell" required="required">
                <input type="text" id="inputUser" class="form-control" placeholder="Data Caducitat" name="data_caducitat" required="required">
                <input type="text" id="inputUser" class="form-control" placeholder="Num Federacio" name="num_federacio" required="required">
            </div>

        </div>
        <br>
        <div class="checkbox-card">
            <label for="">Ets familia numerosa</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="checkme">Si
                </label>
            </div>
            <div class="passport-box">
                <input type="text" id="inputUser" class="form-control" placeholder="Num Familia Numerosa" name="num_familia_numerosa" required="required">
                <input type="text" id="inputUser" class="form-control" placeholder="Data Caducitat Familia" name="data_caducitat_familia" required="required">

            </div>

        </div> -->


        <button class="btn btn-lg btn-block" type="submit" name="register" value="register">Registre</button>
        <p>Ja estàs registrat? <a href="login.php" class="text-decoration-none text-success">Accedir!</a></p>
    </form>



    <?php
    
    ?>








    <script src="src/js/jquery-latest.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
    <script>
        $(function() {
            $(".checkme").click(function(event) {
                var x = $(this).is(':checked');
                if (x == true) {
                    $(this).parents(".checkbox-card").find('.passport-box').show();

                } else {
                    $(this).parents(".checkbox-card").find('.passport-box').hide();

                }
            });
        })
    </script>



</body>

</html>