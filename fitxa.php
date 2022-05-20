<?php
 session_start();

 include ('./functions.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitxa</title>
    <link rel="stylesheet" href="src/css/reset.css"/>
    <link rel="stylesheet" href="src/css/bootstrap-4.6.1/bootstrap.min.css"/>
    <link rel="stylesheet" href="src/css/fontawesome/all.min.css"/>
    <link rel="stylesheet" href="src/css/style.css"/>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-sm">
                <!-- logo -->
                <a class="logo" href="index.php">
                    <img src="src/img/logo.png" class="d-md-none" alt="Extreme Snow">
                    <span class="d-none d-md-inline-block">Extreme Snow</span>
                </a>
                <!-- burguer button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#burguerMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- nav -->
                <div class="collapse navbar-collapse justify-content-sm-end" id="burguerMenu">   
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link disabled" href="index.php">Lloguer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ubicació</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="temps.php">Temps</a>
                        </li>
                        <?php if (empty($_SESSION['usuari'])) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Entrar</a>
                        </li>
                        <?php } else {?>
                        <li class="nav-item">
                            <a class="nav-link" href="fitxa.php"><i class="fa fa-user" aria-hidden="true"></i><?php echo ' ' .$_SESSION['usuari'] ?></a>
                        </li>
                        <?php }?>
                        
                        <?php if (!empty($_SESSION['usuari'])) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="tancar.php">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>  
                        <?php }?>  
                        <li class="nav-item nav-item-cart-block">
                            <a class="nav-link" href="#" class="menu-cart-link"><i class="fa fa-shopping-cart"></i></a>
                            <div class="submenu">
                                <ul class="menu-cart-list">
                                    
                                </ul>
                                <div class="footer-menu-cart">
                                    <button class="btn clear-cart">Buidar carret</button>
                                </div>
                            </div>
                        </li>        
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <section>
            <div class="client-fitxa">
                <div class="row">
                    <div class="col-6 col-md-4">
                        <img src="src/img/avatar.png" alt="" class="client-fitxa_img">
                    </div>
                    <div class="col-6 col-md-8">
                        <div class="client-fitxa_dades">
                            <div class="name"><span>Nom: </span>teste</div>
                            <div class="lastname"><span>Cognom: </span>teste</div>
                            <div class="dni"><span>DNI: </span>12304567U</div>
                            <div class="tel"><span>Telèfon: </span>645782696</div>
                            <div class="mail"><span>Email: </span>teste@teste.com</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>                        

    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>