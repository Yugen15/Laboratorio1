<?php
$encabezados=file_get_contents('headers.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
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
                    <h3>Agregas a listado de productos</h3>
                    <hr />
                    <input type="button" id="btnNuevo" value="Nuevo Registro"
                           class="btn btn-success" data-bs-toggle="modal"
                           data-bs-target="#modelProducts">
                    <hr>
                    <h4>Productos</h4>
                    <div id="tablaHtml">
                    </div>
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

<div class="modal fade" id="modelProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="FrmProducts">
                    <input type="text" id="TxtName" name="TxtName"
                           class="form-control" placeholder="Nombre del producto">
                    <br>
                    <input type="text" id="TxtStock" name="TxtStock"
                           class="form-control" placeholder="Cuál es el stock del producto:">
                    <br>
                    <input type="text" id="TxtCosto" name="TxtCosto"
                           class="form-control" placeholder="Ingrese el costo del prodcutos:">
                    <br>
                    <input type="text" id="TxtPrecio" name="TxtPrecio"
                           class="form-control" placeholder="Ingrese el precio del producto:">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
                <button type="button" id="btnModificar" class="btn btn-warning">Modificar</button>
            </div>
        </div>
    </div>
</div>


