
<?php
session_start();

if(isset($_REQUEST["btnBorrar"])){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="Logo" href="https://cdn-icons-png.flaticon.com/512/2098/2098402.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Style.css">
    <title>Gestion de tareas</title>
</head>
<body>
<div class="registration-form">
        <form id="FormOne" name="FormOne">
        <h3 class="text-center">Gestión de tareas</h3>
            <div class="form-group">
            <p class="text-start" id="text1">Tarea</p>
                <input type="text" class="form-control item" id="Homework" name="Homework" placeholder="Ingresa el nombre de tu tarea">
            </div>
            <div class="form-group">
         <p class="text-start" id="text1">Estado</p>
        <input class="form-check-input " type="radio" id="Statusoff" name="Statusoff" value="Iniciada">
        <label class="form-check-label" for="Iniciada" id="TextStatus">
        Iniciada
         </label>
        <input class="form-check-input" type="radio" id="Statuson" name="Statuson" value="No Iiniciada">
        <label class="form-check-label" for="No Iiniciada" id="TextStatus">
        No iniciado
         </label>
        </div>
        <p class="text-start" id="text1">Descripción</p>
            <div class="form-group">
            <textarea name="TxtArea" id="TxtArea"class="form-control" placeholder="Descripción"></textarea>
            </div>
            <div class="form-group">
            <input type="button" name="BtnAdd"id="BtnAdd" class="btn btn-success" value="Agregar">
            <input type="button" name="BtnDelete"id="BtnDelete" class="btn btn-danger" value="Eliminar">
            <input type="button" name="BtnEdit"id="BtnEdit"  class="btn btn-warning"value="Modificar">
            <!--
            <input type="submit" name="btnBorrar" id="btnBorrar" value="Borrar todo">
-->
            </div>
        </form>
    </div>
    <table class="table centered-table" id="TableHomework">
    <thead>
        <tr>
            <th>Tarea</th>
            <th>Estado</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <!-- Aquí se listarán las tareas -->
    </tbody>
</table>
</div>
<script>
    $(document).ready(function(){
        function cargarTabla(){
            $.ajax({
                url: 'Datos/Procesar.php',
                type: 'POST',
                data: { op: 'get' },
                success: function(tabla) {
                    $('#TableHomework').html(tabla);

                    $('#TableHomework tr').click(function(){
                        $(this).addClass('selected').siblings().removeClass('selected');
                    });
                },
                error: function() {
                    swal("Error", "Se produjo un error al cargar la tabla de tareas, pipipipi", "error");
                }
            });
        }

        $('#BtnAdd').click(function(){
        var tarea = $('#Homework').val();
        var estado = $('input[name="Statusoff"]:checked').val() || $('input[name="Statuson"]:checked').val();
        var descripcion = $('#TxtArea').val();
    
    // Deseleccionar todas las opciones de radio
        $('input[name="Statusoff"]').prop('checked', false);
        $('input[name="Statuson"]').prop('checked', false);

        $.ajax({
        url: 'Datos/Procesar.php',
        type: 'POST',
        data: {tarea: tarea, estado: estado, descripcion: descripcion, op: 'agregar'}
    }).done(function(){
        $('#Homework').val('');
        $('input[name=Status]').prop('checked', false);
        $('#TxtArea').val('');
        cargarTabla(); 
    }).fail(function(){
        swal("Error", "Error al agregar datos(No funco).", "error");
    });
});

        $('#BtnDelete').click(function(){
            var tareaEliminar = $('#TableHomework tr.selected td:first').text();
            if (tareaEliminar === '') {
                swal("Error", "Selecciona una tarea para eliminar, por favor.", "error");
            } else {
                $.ajax({
                    url: 'Datos/Procesar.php',
                    type: 'POST',
                    data: {tareaEliminar: tareaEliminar, op: 'eliminar'}
                }).done(function(){
                    cargarTabla();
                }).fail(function(){
                    swal("Error", "Error al eliminar tarea, no furula", "error");
                });
            }
        });

        $('#BtnEdit').click(function() {
    var tareaSeleccionada = $('#TableHomework tr.selected td:first').text();

    if (tareaSeleccionada === '') {
        swal("Error", "Por favor, seleccione una tarea para editar.", "error");
    } else {
        var estado = $('input[name="Statusoff"]:checked').val() || $('input[name="Statuson"]:checked').val();
        var descripcion = $('#TxtArea').val();

        $.ajax({
            url: 'Datos/Procesar.php',
            type: 'POST',
            data: { tareaEditar: tareaSeleccionada, estado: estado, descripcion: descripcion, op: 'editar' },
            success: function(response) {
                // Actualizar la tabla con la respuesta del servidor
                $('#TableHomework').html(response);
            },
            error: function() {
                swal("Error", "Error al editar tarea.", "error");
            }
        });
    }
});
    });
</script>
</body>
</html>