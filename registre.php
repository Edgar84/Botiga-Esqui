<?php
session_start();
$errorTel = "";
$errorEmail = "";
$errorDni = "";
$errorUser = "";
$errorFederacio = "";
$isFederat = false;
$isFamNum = false;

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

    $nivell = $_POST['nivell'];
    $data_caducitat = $_POST['data_caducitat'];
    $num_federacio = $_POST['num_federacio'];

    $num_familia_numerosa = $_POST['num_familia_numerosa'];
    $data_caducitat_familia = $_POST['data_caducitat_familia'];

    $mobileregex = "/^6[0-9]{8}$/";
    $comprovacioTelefon = True;

    if (preg_match($mobileregex, $telefon) == false) {
        $errorTel =  '<p class="alert alert-danger ">Format telefon incorrecte</p>';
        $comprovacioTelefon = false;
    }else{
        $errorTel = "";
    }

    $query = $connect->prepare("SELECT * FROM client WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        $errorEmail = ' <p class="alert alert-danger">Aquest Email ja està registrat</p>';
    } else{
        $errorEmail = "";
    }

    $query2 = $connect->prepare("SELECT * FROM client WHERE dni=:dni");
    $query2->bindParam("dni", $dni, PDO::PARAM_STR);
    $query2->execute();
    if ($query2->rowCount() > 0) {
        $errorDni = '<p class="alert alert-danger">Hi ha un usuari amb aquet dni</p>';
    }else{
        $errorDni = "";
    }

    $query3 = $connect->prepare("SELECT * FROM client WHERE usuari=:user");
    $query3->bindParam("user", $user, PDO::PARAM_STR);
    $query3->execute();
    if ($query3->rowCount() > 0) {
        $errorUser = '<p class="alert alert-danger ">Aquest usuari ja existeix</p>';
    }else{
        $errorUser = "";
    }

    if ($num_federacio != ""){
        $query4 = $connect->prepare("SELECT * FROM federat WHERE num_federacio=:num_federacio");
        $query4->bindParam("num_federacio", $num_federacio, PDO::PARAM_STR);
        $query4->execute();
        if ($query4->rowCount() > 0) {
            $errorFederacio = '<p class="alert alert-danger ">Aquest numero de federacio ja existeix</p>';
            $isFederat = false;
        } else {
            $errorFederacio = "";
            $isFederat = true;
        }
    }

    if($num_familia_numerosa != ""){
        $isFamNum = true;
    }

    if ($query->rowCount() == 0 and $query2->rowCount() == 0  and $query3->rowCount() == 0 and $comprovacioTelefon) {

        $query = $connect->prepare("INSERT INTO client(dni,nom,cognom,telefon,email,usuari,pass) VALUES (:dni,:nom,:cognom,:telefon,:email,:usuari,:password_hash)");
        // crear functions familia numerosa federat una o altra
        $query->bindParam("dni", $dni, PDO::PARAM_STR);
        $query->bindParam("nom", $nom, PDO::PARAM_STR);
        $query->bindParam("cognom", $cognom, PDO::PARAM_STR);
        $query->bindParam("telefon", $telefon, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("usuari", $user, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        
        $result = $query->execute();
        
        if($isFederat){
            $query = $connect->prepare("INSERT INTO federat(dni,nivell,num_federacio,data_caducitat) VALUES (:dni,:nivell,:num_federacio,:data_caducitat)");
            $query->bindParam("dni", $dni, PDO::PARAM_STR);
            $query->bindParam("nivell", $nivell, PDO::PARAM_STR);
            $query->bindParam("num_federacio", $num_federacio, PDO::PARAM_STR);
            $query->bindParam("data_caducitat", $data_caducitat, PDO::PARAM_STR);
            
            $result = $query->execute();
        }

        if($isFamNum){
            $query = $connect->prepare("INSERT INTO fam_num(dni,num_fam,data_caducitat) VALUES (:dni,:num_fam,:data_caducitat)");
            $query->bindParam("dni", $dni, PDO::PARAM_STR);
            $query->bindParam("num_fam", $num_familia_numerosa, PDO::PARAM_STR);
            $query->bindParam("data_caducitat", $data_caducitat_familia, PDO::PARAM_STR);
            
            $result = $query->execute();
        }
        
        if ($result) {
            $loginSuccess = '<p class="alert alert-success">Usuari registrat</p>';
        } else {
            $loginSuccess = '<p class="alert alert-danger">Dades Incorrectes</p>';
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
                <input type="text" id="inputDni" class="form-control" placeholder="DNI" maxlength="9" name="dni" required="required" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))">
            </div>
            <div class="col-12 col-md-6">
                <label for="inputTel" class="sr-only">Telefon</label>
                <input type="tel" id="inputTel" class="form-control" placeholder="Telèfon" maxlength="9" name="telefon" required="required">
            </div>
        </div>
        <?php echo $errorDni ?>
        <?php echo $errorTel ?>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required="required">
        <?php echo $errorEmail ?>
        <hr class="text-info">

        <label for="inputUser" class="sr-only">User</label>
        <input type="text" id="inputUser" class="form-control" placeholder="Usuari" name="usuari" required="required">
        <?php echo $errorUser ?>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="required">

        <hr class="text-info">

        <div class="checkbox-card">
            <div class="checkbox">
                <label>Soc federat
                    <input type="checkbox" class="checkme checkme-fed">
                </label>
            </div>
            <div class="passport-box passport-box-fed">
                <input type="text" id="nivell" class="form-control" placeholder="Nivell" name="nivell">
                <input type="date" id="data_caducitat" class="form-control" placeholder="Data Caducitat" name="data_caducitat" value="">
                <input type="text" id="num_federacio" class="form-control" placeholder="Num Federacio" name="num_federacio">
            </div>
            <?php echo $errorFederacio ?>
        </div>

        <hr class="text-info">

        <div class="checkbox-card">
            <div class="checkbox">
                <label>Soc familia numerosa
                    <input type="checkbox" class="checkme checkme-fam">
                </label>
            </div>
            <div class="passport-box passport-box-fam">
                <input type="text" id="num_familia_numerosa" class="form-control" placeholder="Num Familia Numerosa" name="num_familia_numerosa" >
                <input type="date" id="data_caducitat_familia" class="form-control" placeholder="Data Caducitat Familia" name="data_caducitat_familia" value="">
            </div>
        </div> 

        <?php echo $loginSuccess ?>

        <hr class="text-info">

        <button class="btn btn-lg btn-block" type="submit" name="register" value="register">Registre</button>
        <p>Ja estàs registrat? <a href="login.php" class="text-decoration-none text-success">Accedir!</a></p>
        <button class="d-none no-alert">No alert</button>
    </form>

    <script src="src/js/jquery-latest.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
    
    <script>
        $(function() {
            $(".checkme").click(function(event) {
                var x = $(this).is(':checked');
                let inputs = event.target.closest('.checkbox-card').querySelectorAll('input');
                if (x == true) {
                    $(this).parents(".checkbox-card").find('.passport-box').show();
                    inputs.forEach((input) => { input.setAttribute('required','required')});
                } else {
                    $(this).parents(".checkbox-card").find('.passport-box').hide();
                    inputs.forEach((input) => { input.removeAttribute('required')});
                }
            });
        })

        const btn = document.querySelector('button[type="submit"]');
        
        document.addEventListener('DOMContentLoaded', (evet) => {
            const alerts = document.querySelectorAll('.alert');
            if(alerts.length > 0){
                removeElems();
            }
        });
       /* btn.addEventListener("click", function(){
            location.reload();
        });*/
        function removeElems() {
            const alerts = document.querySelectorAll('.alert');
            setTimeout(function() {
                for (const alert of alerts) {
                    alert.remove();
                }
            }, 3000);
        }

    </script>



</body>

</html>