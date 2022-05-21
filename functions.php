<?php


// mostrarProductes();

function mostrarProductes()
{
    include("./connectBD.php");
    $query = " SELECT *,count(*) as quantitat,tipo  from( select material.id,material.marca,material.model,material.preu,botes.talla, 'botes' as tipo from material,botes where material.id = botes.id and disponible = 1 union select material.id,material.marca,material.model,material.preu,pals.talla, 'pals' as tipo from material,pals where material.id = pals.id and disponible = 1 union select material.id,material.marca,material.model,material.preu,esquis.talla, 'esquis' as tipo from material,esquis where material.id = esquis.id and disponible = 1)a group by marca,model,talla;";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach ($result as $row) {
?>

        <div class="col-6 col-md-4">
            <div class="product-grid3">
                <div class="product-image3">
                    <a href="#">
                        <img class="pic-1" src="src/img/products/<?php echo $row['id']; ?>.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="#" data-toggle="modal" class="show-product" data-target="#exampleModalCenter"><i class="fas fa-eye"></i></a></li>
                        <li><a href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label"><?php echo $row['quantitat']; ?>u.</span>
                </div>
                <div class="product-content">
                    <h3 class="title" data-id="<?php echo $row['id']; ?>"><span class="d-none"><?php echo $row['tipo']; ?></span> <?php echo $row['marca']; ?> <?php echo $row['model']; ?></h3>
                    <p class="d-none description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus possimus a modi! Quam beatae, repellendus unde eligendi tempora saepe? Eos quidem nobis minima accusamus veritatis error, illo aliquid corporis ipsum.</p>
                    <p class="d-none brand"><?php echo $row['marca']; ?></p>
                    <p class="d-none model"><?php echo $row['model']; ?></p>
                    <p class="d-none size"><?php echo $row['talla']; ?></p>
                    <div class="price"><?php echo $row['preu']; ?>€</div>
                    <div class="size">Talla: <?php echo $row['talla']; ?></div>
                </div>
            </div>
        </div>
<?php
    }
}

function mostrarCuros() {
    include("./connectBD.php");
    $dni = $_SESSION['dni'];
    $sql = "CALL mostrarCursos('".$dni."');";
    $statement = $connect->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
}