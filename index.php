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
                            <a class="nav-link" href="kits.php">Kits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="index.php">Lloguer</a>
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
    <section class="filters">
        <div class="col-12">
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
                <button type="button" class="btn btn-outline-secondary d-md-none filterBtn">Filtres</button>
            </div>
        </div>
    </section>
        
    <section class="main">
        <div class="container">
            <div class="row">
                <aside class="col-md-3 aside">
                    <div class="aside_block by_type">
                        <div class="aside_block-title">
                            <h3 class="title">Article</h3>
                        </div>
                        <div class="aside_block-content">
                            <ul>
                                <li>
                                    <label>
                                        Esquís
                                        <input type="checkbox" aria-label="Esquís" name="esquis">
                                    </label> 
                                </li>
                                <li>
                                    <label>
                                        Botes
                                        <input type="checkbox" aria-label="Botes" name="botes">
                                    </label> 
                                </li>
                                <li>
                                    <label>
                                        Pals
                                        <input type="checkbox" aria-label="Pals" name="pals">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        Kits
                                        <input type="checkbox" aria-label="Kits" name="kits">
                                    </label> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="aside_block by_brand">
                        <div class="aside_block-title">
                            <h3 class="title">Marca</h3>
                        </div>
                        <div class="aside_block-content">
                            <ul>
                                <li>
                                    <label>
                                        Atomic
                                        <input type="checkbox" aria-label="Atomic" name="Atomic">
                                    </label> 
                                </li>
                                <li>
                                    <label>
                                        Blizzar
                                        <input type="checkbox" aria-label="Blizzar" name="Blizzar">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        Nordica
                                        <input type="checkbox" aria-label="Nordica" name="Nordica">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        Lacroix
                                        <input type="checkbox" aria-label="Lacroix" name="Lacroix">
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="aside_block by_size size-esquis d-none">
                        <div class="aside_block-title">
                            <h3 class="title">Talla Esquís</h3>
                        </div>
                        <div class="aside_block-content">
                            <ul>
                                <li>
                                    <label>
                                        Adult
                                        <input type="checkbox" aria-label="Adult" name="adult">
                                    </label> 
                                </li>
                                <li>
                                    <label>
                                        Nen
                                        <input type="checkbox" aria-label="Nen" name="nen">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        Infant
                                        <input type="checkbox" aria-label="Infant" name="infant">
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="aside_block by_size size-botes d-none">
                        <div class="aside_block-title">
                            <h3 class="title">Talla Botes</h3>
                        </div>
                        <div class="aside_block-content">
                            <ul>
                                <li>
                                    <label>
                                        Adult
                                        <input type="checkbox" aria-label="Adult" name="adult">
                                    </label> 
                                </li>
                                <li>
                                    <label>
                                        Nen
                                        <input type="checkbox" aria-label="Nen" name="nen">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        Infant
                                        <input type="checkbox" aria-label="Infant" name="infant">
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="aside_block by_size size-pals d-none">
                        <div class="aside_block-title">
                            <h3 class="title">Talla Pals</h3>
                        </div>
                        <div class="aside_block-content">
                            <ul>
                                <li>
                                    <label>
                                        Adult
                                        <input type="checkbox" aria-label="24" name="adult">
                                    </label> 
                                </li>
                                <li>
                                    <label>
                                        Nen
                                        <input type="checkbox" aria-label="Nen" name="nen">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        Infant
                                        <input type="checkbox" aria-label="Infant" name="infant">
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="aside_block by_size size-kits d-none">
                        <div class="aside_block-title">
                            <h3 class="title">Talla Kits</h3>
                        </div>
                        <div class="aside_block-content">
                            <ul>
                                <li>
                                    <label>
                                        Adult
                                        <input type="checkbox" aria-label="24" name="adult">
                                    </label> 
                                </li>
                                <li>
                                    <label>
                                        Nen
                                        <input type="checkbox" aria-label="Nen" name="nen">
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        Infant
                                        <input type="checkbox" aria-label="Infant" name="infant">
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <div class="dark d-none"></div>
                <div class="col-md-9">
                    <div class="row product-row-grid">
                        <div class="col-6 col-md-4">
                            <div class="product-grid3">
                                <div class="product-image3">
                                    <a href="#">
                                        <img class="pic-1" src="src/img/products/1-1.jpg">                                        
                                    </a>
                                    <ul class="social">
                                        <li><a href="#" data-toggle="modal" class="show-product" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">15u.</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title" data-id="1">CC Esquís adult</h3>
                                    <p class="d-none description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus a modi! Quam beatae, repellendus unde eligendi tempora saepe? Eos quidem nobis minima accusamus veritatis error, illo aliquid corporis ipsum.</p>
                                    <p class="d-none brand">Nordica</p>
                                    <p class="d-none model">T-2000</p>
                                    <p class="d-none size">Adult</p>
                                    <div class="price">63.50€</div>
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
                                        <img class="pic-1" src="src/img/products/1-2.jpg">                                        
                                    </a>
                                    <ul class="social">
                                        <li><a href="#" data-toggle="modal" class="show-product" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">18u.</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title" data-id="2">BB Botes nen</h3>
                                    <p class="d-none description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus a modi! Quam beatae, repellendus unde eligendi tempora saepe? Eos quidem nobis minima accusamus veritatis error, illo aliquid corporis ipsum.</p>
                                    <p class="d-none brand">Atomic</p>
                                    <p class="d-none model">Aj-512</p>
                                    <p class="d-none size">Nen</p>
                                    <div class="price">15.50€</div>
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
                                    </a>
                                    <ul class="social">
                                        <li><a href="#" data-toggle="modal" class="show-product" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">3u.</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title" data-id="3">AA Esquís adult</h3>
                                    <p class="d-none description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus a modi! Quam beatae, repellendus unde eligendi tempora saepe? Eos quidem nobis minima accusamus veritatis error, illo aliquid corporis ipsum.</p>
                                    <p class="d-none brand">Blizzar</p>
                                    <p class="d-none model">BL Extremes</p>
                                    <p class="d-none size">Adult</p>
                                    <div class="price">33.50€</div>
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
                                        <!-- <img class="pic-2" src="src/img/products/1-2.jpg"> -->
                                    </a>
                                    <ul class="social">
                                        <li><a href="#" data-toggle="modal" class="show-product" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">8u.</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title" data-id="4">ZZ Esquís nena</h3>
                                    <p class="d-none description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus a modi! Quam beatae, repellendus unde eligendi tempora saepe? Eos quidem nobis minima accusamus veritatis error, illo aliquid corporis ipsum.</p>
                                    <p class="d-none brand">Lacroix</p>
                                    <p class="d-none model">Drible</p>
                                    <p class="d-none size">Nena</p>
                                    <div class="price">89.00€</div>
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
                                        <!-- <img class="pic-2" src="src/img/products/1-2.jpg"> -->
                                    </a>
                                    <ul class="social">
                                        <li><a href="#" data-toggle="modal" class="show-product" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">5u.</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title" data-id="4">Pals Adult</h3>
                                    <p class="d-none description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus a modi! Quam beatae, repellendus unde eligendi tempora saepe? Eos quidem nobis minima accusamus veritatis error, illo aliquid corporis ipsum.</p>
                                    <p class="d-none brand">Lacroix</p>
                                    <p class="d-none model">Drible</p>
                                    <p class="d-none size">Adult</p>
                                    <div class="price">89.00€</div>
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
                                        <!-- <img class="pic-2" src="src/img/products/1-2.jpg"> -->
                                    </a>
                                    <ul class="social">
                                        <li><a href="#" data-toggle="modal" class="show-product" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">5u.</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title" data-id="4">Pals Nena</h3>
                                    <p class="d-none description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus a modi! Quam beatae, repellendus unde eligendi tempora saepe? Eos quidem nobis minima accusamus veritatis error, illo aliquid corporis ipsum.</p>
                                    <p class="d-none brand">Lacroix</p>
                                    <p class="d-none model">Drible</p>
                                    <p class="d-none size">Nena</p>
                                    <div class="price">22.00€</div>
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
                                        <!-- <img class="pic-2" src="src/img/products/1-2.jpg"> -->
                                    </a>
                                    <ul class="social">
                                        <li><a href="#" data-toggle="modal" class="show-product" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">5u.</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title" data-id="4">Kits Adult</h3>
                                    <p class="d-none description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus a modi! Quam beatae, repellendus unde eligendi tempora saepe? Eos quidem nobis minima accusamus veritatis error, illo aliquid corporis ipsum.</p>
                                    <p class="d-none brand">Lacroix</p>
                                    <p class="d-none model">Drible</p>
                                    <p class="d-none size">Adult</p>
                                    <div class="price">35.00€</div>
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
                                        <!-- <img class="pic-2" src="src/img/products/1-2.jpg"> -->
                                    </a>
                                    <ul class="social">
                                        <li><a href="#" data-toggle="modal" class="show-product" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                    <span class="product-new-label">5u.</span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title" data-id="4">Kits Infant</h3>
                                    <p class="d-none description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus a modi! Quam beatae, repellendus unde eligendi tempora saepe? Eos quidem nobis minima accusamus veritatis error, illo aliquid corporis ipsum.</p>
                                    <p class="d-none brand">Lacroix</p>
                                    <p class="d-none model">Drible</p>
                                    <p class="d-none size">Infant</p>
                                    <div class="price">35.00€</div>
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
                    </div> <!-- End row product-grid -->
                </div>
            </div>
        </div>
    </section>

    <!-- Product modal -->

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <img src="" alt="" class="modal-product_img pic-1">
                        </div>
                        <div class="col-12 col-md-8">
                                <h2 class="modal-product_title title"></h2>
                                <p class="modal-product_description description"></p>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="modal-product_brand-title modal_scope-title"></th>
                                            <td class="modal-product_brand brand"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="modal-product_model-title modal_scope-title"></th>
                                            <td class="modal-product_model model"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="modal-product_size-title modal_scope-title"></th>
                                            <td class="modal-product_size size"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="modal-product_price price"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-add-to-cart">Afegir al carret</button>
                </div>
            </div>
        </div>
    </div>
    

    <script src="src/js/functions.js"></script>
    <script src="src/js/bootstrap-4.6.1/jquery3_6_0.slim.min.js"></script>
    <script src="src/js/bootstrap-4.6.1/bootstrap.min.js"></script>
</body>
</html>