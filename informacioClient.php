<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extreme Snow</title>
    <link rel="stylesheet" href="src/css/reset.css" />
    <link rel="stylesheet" href="src/css/bootstrap-4.6.1/bootstrap.min.css" />
    <link rel="stylesheet" href="src/css/fontawesome/all.min.css" />
    <link rel="stylesheet" href="src/css/style.css" />
</head>

<body>


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
                        <a class="nav-link" href="temps.php">Ubicacio Monitor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="temps.php">Temps</a>
                    </li>
                    <?php if (empty($_SESSION['nom'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Entrar</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="fitxa.php"><i class="fa fa-user" aria-hidden="true"></i><?php echo ' ' . $_SESSION['nom'] . ' ' . $_SESSION['cognom'] ?></a>
                        </li>
                    <?php } ?>

                    <?php if (!empty($_SESSION['nom'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="tancar.php">
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                    <?php } ?>
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




    <h2>Responsive Table</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Header 1</th>
                    <th>Header 2</th>
                    <th>Header 3</th>
                    <th>Header 4</th>
                    <th>Header 5</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1 Content 1Content 1Content 1Content 1Content 1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content1Content 1Content 1Content 1Content 1Content 1</td>
                </tr>
                <tr>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                </tr>
                <tr>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                </tr>
                <tr>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                </tr>
                <tr>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                </tr>
                <tr>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                </tr>
                <tr>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                </tr>
                <tr>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                </tr>
                <tr>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                </tr>
                <tr>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                </tr>
            <tbody>
        </table>
    </div>




</body>

</html>