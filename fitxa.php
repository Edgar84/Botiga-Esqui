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
                    <div class="col-12 col-md-4 client-fitxa_imatge mb-4 mb-md-0">
                        <img src="src/img/avatar.png" alt="" class="client-fitxa_img">
                    </div>
                    <div class="col-12 col-md-8">
                        <?php $result = agafarDadesClient(); foreach ($result as $row) { ?>
                        <div class="row mb-md-4">
                            <div class="col-12 col-md-6">
                                <div class="client-fitxa_dades mb-3 mb-md-0">
                                    <h2 class="client-fitxa_dades-title h4">Dades personals</h2>
                                    <div class="client-fitxa_dades-name"><span>Nom:</span> <span><?php echo $row['nom']?></span><ln class="separator"></ln></div>
                                    <div class="client-fitxa_dades-lastname"><span>Cognom:</span> <span><?php echo $row['cognom']?></span><ln class="separator"></ln></div>
                                    <div class="client-fitxa_dades-dni"><span>DNI:</span> <span><?php echo $row['dni']?></span><ln class="separator"></ln></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="client-fitxa_dades mb-3 mb-md-0">
                                    <h2 class="client-fitxa_dades-title h4">Dades de contacte</h2>
                                    <div class="client-fitxa_dades-tel"><span>Telèfon:</span> <span><?php echo $row['telefon']?></span><ln class="separator"></ln></div>
                                    <div class="client-fitxa_dades-mail"><span>Email:</span> <span><?php echo $row['email']?></span><ln class="separator"></ln></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="client-fitxa_dades mb-3 mb-md-0">
                                    <h3 class="client-fitxa_dades-title h4"><span>Federat</span></h3>
                                    <div class="client-fitxa_dades-tel"><span>Numero:</span> <span><?php echo $row['num_federacio'] != null ? $row['num_federacio'] : 'No federat' ?></span><ln class="separator"></ln></div>
                                    <div class="client-fitxa_dades-tel"><span>Nivell:</span> <span><?php echo $row['nivell'] != null ? $row['nivell'] : 'No federat' ?></span><ln class="separator"></ln></div>
                                    <div class="client-fitxa_dades-mail"><span>Data caducitat:</span> <span><?php echo $row['data_caducitat_fed'] != null ? $row['data_caducitat_fed'] : 'No federat' ?></span><ln class="separator"></ln></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="client-fitxa_dades mb-3 mb-md-0">
                                    <h3 class="client-fitxa_dades-title h4"><span>Família numbrosa</span></h3>
                                    <div class="client-fitxa_dades-tel"><span>Numero:</span> <span><?php echo $row['num_fam'] != null ? $row['num_fam'] : 'No família num.' ?></span><ln class="separator"></ln></div>
                                    <div class="client-fitxa_dades-mail"><span>Data caducitat:</span> <span><?php echo $row['data_caducitat_fam'] != null ? $row['data_caducitat_fam'] : 'No família num.' ?></span><ln class="separator"></ln></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <h2 class="page-title">Historial cursos</h1>
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
        <h2 class="page-title">Historial lloguer</h1>
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
                    <?php $result = mostrarMaterialLlogat(); foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row['data']?></td>
                        <td><?php echo $row['material']?></td>
                        <td><?php echo $row['marca']?></td>
                        <td><?php echo $row['model']?></td>
                        <td><?php echo $row['talla']?></td>
                        <td><?php echo $row['preu'].'€'?></td>
                    </tr>
                    <?php } ?>
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