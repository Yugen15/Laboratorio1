<?php
$encabezados=file_get_contents('headers.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio</title>
    <?=$encabezados?>
</head>
<div class="container-fluid overflow-hidden">
    <div class="row vh-100 overflow-auto">
        <!-- menu -->
        <?php
        include_once 'Menu.php';
        ?>
        <div class="col d-flex flex-column h-sm-100">
            <main class="row overflow-auto">
                <div class="col pt-4">
                    <h3>BIENVENIDOS</h3>
                    <p class="lead">PRODUCTOS</p>
                    <hr />
                    <h3>Más productos</h3>
                </div>
            </main>
            <footer class="row bg-light py-4 mt-auto">
                <div class="col">
                </div>
            </footer>
        </div>
    </div>
</div>
</body>
</html>

