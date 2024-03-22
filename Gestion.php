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
    <title>Gestion de tareas</title>
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
        <input class="form-check-input " type="radio" id="Statusoff" name="Statusoff" value="TaskStarted">
        <label class="form-check-label" for="TaskStarted" id="TextStatus">
        Iniciada
        </label>
        <input class="form-check-input" type="radio" id="Statuson" name="Statuson" value="TaskNotStarted">
        <label class="form-check-label" for="TaskNotStarted" id="TextStatus">
        No iniciado
        </label>
        </div>
        <p class="text-start" id="text1">Descripción</p>
            <div class="form-group">
            <textarea name="TxtArea" id="TxtArea"class="form-control" placeholder="Descripción"></textarea>
            </div>
            <div class="form-group">
            <button type="button" name="BtnAdd"id="BtnAdd" class="btn btn-success">Agregar</button>
            <button type="button" name="BtnDelete"id="BtnDelete" class="btn btn-danger">Eliminar</button>
            <button type="button" name="BtnEdit"id="BtnEdit"  class="btn btn-warning">Modificar</button>
            </div>
        </form>
    </div>
    <div class="form-group table"">
       <!--
       Está clase se la pondrás en el PHP a la hora de crear la Table 
       <table class="table centered-table">
        </table> -->
    </div>
</div>

</body>
</html>