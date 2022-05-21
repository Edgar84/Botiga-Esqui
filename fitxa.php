<?php
 session_start();

 require ('functions.php');
 
//Mostrar errors php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
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
                            <a class="nav-link" href="index.php">Lloguer</a>
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
        <h1 class="page-title">Ficha personal</h1>
        <section class="fitxa-section">
            <div class="client-fitxa">
                <div class="row">
                    <div class="col-6 col-md-4 client-fitxa_imatge">
                        <img src="src/img/avatar.png" alt="" class="client-fitxa_img">
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="client-fitxa_dades">
                            <h2 class="client-fitxa_dades-title h4">Dades personals</h2>
                            <div class="client-fitxa_dades-name"><span>Nom:</span> <span>teste</span><ln class="separator"></ln></div>
                            <div class="client-fitxa_dades-lastname"><span>Cognom:</span> <span>teste</span><ln class="separator"></ln></div>
                            <div class="client-fitxa_dades-dni"><span>DNI:</span> <span>12304567U</span><ln class="separator"></ln></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="client-fitxa_dades">
                            <h2 class="client-fitxa_dades-title h4">Dades de contacte</h2>
                            <div class="client-fitxa_dades-tel"><span>Telèfon:</span> <span>645782696</span><ln class="separator"></ln></div>
                            <div class="client-fitxa_dades-mail"><span>Email:</span> <span>teste@teste.com</span><ln class="separator"></ln></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <h2 class="page-title">Histarial cursos</h1>
        <section class="fitxa-section">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Tipo</th>
                        <th>Curs</th>
                        <th>Preu</th>
                        <th>Descompte</th>
                        <th>Preu final</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $result = mostrarCuros(); foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row['data']?></td>
                        <td><?php echo $row['tipo']?></td>
                        <td><?php echo $row['nom']?></td>
                        <td><?php echo $row['preu'].'€'?></td>
                        <td><?php echo $row['descompte']?></td>
                        <td><?php echo $row['preu_final'].'€'?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
        <h2 class="page-title">Histarial lloguer</h1>
        <section class="fitxa-section">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Material</th>
                        <th>Marca</th>
                        <th>Model</th>
                        <th>Talla</th>
                        <th>Preu</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>14-02-2022</td>
                        <td>Botes</td>
                        <td>Atomic</td>
                        <td>at-556</td>
                        <td>39</td>
                        <td>24.99€</td>
                    </tr>
                    <tr>
                        <td>18-12-2021</td>
                        <td>Pals</td>
                        <td>Atomic</td>
                        <td>at-5</td>
                        <td>22m</td>
                        <td>82.99€</td>
                    </tr>
                    <tr>
                        <td>22-12-2021</td>
                        <td>esquís</td>
                        <td>Peltonen</td>
                        <td>pt-pipi3</td>
                        <td>153</td>
                        <td>34.99€</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>   
    
    <div class="container">
        <footer class="d-flex flex-wrap border-top pt-1 pb-3">
            <p class="align-items-center col-md-6 d-flex justify-content-center justify-content-md-start mb-0 text-muted">© 1<sup>er</sup> de DAM - Projecte 3</p>
            
            <p class="align-items-center col-md-6 d-flex justify-content-center justify-content-md-end mb-0 nav">
                <a href="https://github.com/Edgar84/" target="_blank" class="nav-link px-2 text-muted">Nazar</a> | 
                <a href="https://github.com/NazarDAM1/" target="_blank" class="nav-link px-2 text-muted">Edgar</a>
            </p>
        </footer>
    </div>

    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>