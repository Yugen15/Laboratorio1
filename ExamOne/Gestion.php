<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/Style.css">
    <title>Gestión de tareas</title>
</head>
<body>
<div class="registration-form" style="width: 50%; margin:auto">
    <form id="FormOne" name="FormOne">
        <h3 class="text-center">Gestión de tareas</h3>
        <div class="form-group">
            <p class="text-start" id="text1">Tarea</p>
            <input type="text" class="form-control item" id="Homework" name="Homework" placeholder="Ingresa el nombre de tu tarea">
        </div>
        <div class="form-group">
            <p class="text-start" id="text1">Estado</p>
            <input class="form-check-input" type="radio" id="Statusoff" name="Status" value="Tarea Iniciada">
            <label class="form-check-label" for="TaskStarted" id="TextStatus" >
                Iniciada
            </label>
            <input class="form-check-input" type="radio" id="Statuson" name="Status" value="Tarea No Iniciada">
            <label class="form-check-label" for="TaskNotStarted" id="TextStatus">
                No iniciado
            </label>
        </div>
        <div class="form-group">
            <br>
            <p class="text-start" id="text1">Descripción</p>
            <textarea name="TxtArea" id="TxtArea" class="form-control" placeholder="Descripción"></textarea>
        </div>
        <div class="form-group">
            <br>
            <button type="button" name="BtnAdd" id="BtnAdd" class="btn btn-success">Agregar</button>
            <button type="button" name="BtnDelete" id="BtnDelete" class="btn btn-danger">Eliminar</button>
            <button type="button" name="BtnEdit" id="BtnEdit"  class="btn btn-warning">Modificar</button>
            <br>
        </div>
    </form>
</div>
<br>
<div id="tablaTareas" class="container">
    
</div>

<script>
    $(document).ready(function(){

        function cargarTabla(){
            $.ajax({
                url: 'Procesar.php',
                type: 'post',
                data: { op: 'get' },
                success: function(tabla) {
                    $('#tablaTareas').html(tabla);

                    $('#tablaTareas tr').click(function(){
                        $(this).addClass('selected').siblings().removeClass('selected');
                    });
                },
                error: function() {
                    alert('Error al cargar la tabla de tareas, pipipi');
                }
            });
        }

        $('#BtnAdd').click(function(){
            var tarea = $('#Homework').val();
            var estado = $('input[name=Status]:checked').val();
            var descripcion = $('#TxtArea').val();
            
            $.ajax({
                url: 'Procesar.php',
                type: 'post',
                data: {tarea: tarea, estado: estado, descripcion: descripcion, op: 'agregar'}
            }).done(function(){
                $('#Homework').val('');
                $('input[name=Status]').prop('checked', false);
                $('#TxtArea').val('');
                cargarTabla(); 
            }).fail(function(){
                alert('Error al agregar, no funca');
            });
        });

        $('#BtnDelete').click(function(){
            var tareaEliminar = $('#tablaTareas tr.selected td:first').text();
            if (tareaEliminar === '') {
                alert('selecciona una tarea para eliminar, por favor.');
            } else {
                $.ajax({
                    url: 'Procesar.php',
                    type: 'post',
                    data: {tareaEliminar: tareaEliminar, op: 'eliminar'}
                }).done(function(){
                    cargarTabla();
                }).fail(function(){
                    alert('Error al eliminar tarea, no furula');
                });
            }
        });

        // Evento click en el botón de ediar tarea
        $('#BtnEdit').click(function(){
            // Pon tu parte aquí, precioso
        });

        cargarTabla();
    });
</script>

</body>
</html>
