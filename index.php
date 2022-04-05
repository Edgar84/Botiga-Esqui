<?php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extreme Snow</title>
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
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fen.opensuse.org%2Fimages%2F4%2F49%2FAmarok-logo-small.png&f=1&nofb=1" class="d-md-none" alt="Extreme Snow">
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
                            <a class="nav-link" href="#activitats">Kits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="competicions.xml">Lloguer</a>
                        </li>
                        <?php if (empty($_SESSION['usuari'])) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Entrar</a>
                        </li>
                        <?php } else {?>
                        <li class="nav-item">
                            <a class="nav-link" href="fitxa.php"><i class="fa fa-user" aria-hidden="true"></i><?php echo ' ' .$_SESSION['nom'] . ' ' . $_SESSION['cognom'] ?></a>
                        </li>
                        <?php }?>
                        
                        <?php if (!empty($_SESSION['usuari'])) {?>
                        <li class="nav-item">
                            <a class="nav-link" href="tancar.php">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>  
                        <?php }?>  
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i></a>
                        </li>        
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="filters">
        <div class="container">
                <div class="form-group">
                    <select class="form-control" id="order_by">
                        <option value="">Ordenar</option>
                        <option value="a-z">De A a Z</option>
                        <option value="z-a">De Z a A</option>
                        <option value="mes-preu">Més car primer</option>
                        <option value="menys-preu">Més barat primer</option>
                    </select>
                </div>
                <button type="button" class="btn btn-outline-secondary">Filtres</button>
                </div>
    </section>
    <section class="main">
        <div class="container">
            <div class="row">
                <aside class="col-md-3 aside">
                    <div class="aside_block">
                        <div class="aside_block-title">
                            <h3 class="title">Preu</h3>
                        </div>
                        <div class="aside_block-content">

                        </div>
                    </div>
                    <div class="aside_block">
                        <div class="aside_block-title">
                            <h3 class="title">Marca</h3>
                        </div>
                        <div class="aside_block-content">
                            <ul>
                                <li>Marca 1</li>
                                <li>Marca 2</li>
                                <li>Marca 3</li>
                                <li>Marca 4</li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="product-grid3">
                                <div class="product-image3">
                                    <a href="#">
                                        <img class="pic-1" src="src/img/products/1-1.jpg">
                                        <img class="pic-2" src="src/img/products/1-2.jpg">
                                    </a>
                                    <ul class="social">
                                        <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">Nou!</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="#">Esquís adult</a></h3>
                                    <div class="price">
                                        63.50€
                                        <span>75.00€</span>
                                    </div>
                                    <ul class="rating">
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star disable"></li>
                                        <li class="fa fa-star disable"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="product-grid3">
                                <div class="product-image3">
                                    <a href="#">
                                        <img class="pic-1" src="src/img/products/1-1.jpg">
                                        <img class="pic-2" src="src/img/products/1-2.jpg">
                                    </a>
                                    <ul class="social">
                                        <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="#">Esquís adult</a></h3>
                                    <div class="price">
                                        43.50€
                                    </div>
                                    <ul class="rating">
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="product-grid3">
                                <div class="product-image3">
                                    <a href="#">
                                        <img class="pic-1" src="src/img/products/1-1.jpg">
                                        <img class="pic-2" src="src/img/products/1-2.jpg">
                                    </a>
                                    <ul class="social">
                                        <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">Nou!</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="#">Esquís nen</a></h3>
                                    <div class="price">
                                        63.50€
                                        <span>75.00€</span>
                                    </div>
                                    <ul class="rating">
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star disable"></li>
                                        <li class="fa fa-star disable"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="product-grid3">
                                <div class="product-image3">
                                    <a href="#">
                                        <img class="pic-1" src="src/img/products/1-1.jpg">
                                        <img class="pic-2" src="src/img/products/1-2.jpg">
                                    </a>
                                    <ul class="social">
                                        <li><a href="#"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">Nou!</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="#">Esquís nena</a></h3>
                                    <div class="price">
                                        63.50€
                                        <span>75.00€</span>
                                    </div>
                                    <ul class="rating">
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star disable"></li>
                                        <li class="fa fa-star disable"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <script src="src/js/functions.js"></script>
    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>