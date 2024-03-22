<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if ($_REQUEST["op"] == "agregar") {
        $tarea = $_POST["tarea"];
        $estado = $_POST["estado"];
        $descripcion = $_POST["descripcion"];

        if (!isset($_SESSION["tareas"])) {
            $_SESSION["tareas"] = array();
        }
        $_SESSION["tareas"][] = array(
            'tarea' => $tarea,
            'estado' => $estado,
            'descripcion' => $descripcion
        );
        echo crearTabla();
    }
    if ($_REQUEST["op"] == "eliminar") {
        $tareaEliminar = $_POST["tareaEliminar"];

        if (isset($_SESSION["tareas"])) {
            // Para eliminar
            foreach ($_SESSION["tareas"] as $key => $tarea) {
                if ($tarea["tarea"] == $tareaEliminar) {
                    unset($_SESSION["tareas"][$key]);
                    break;
                }
            }
        }
        echo crearTabla(); 
    }

    if ($_REQUEST["op"] == "get") {
        echo crearTabla(); 
    }
} else {
    header("location:Gestion.php");
}


function crearTabla()
{

    $tabla = '<table class="table table-dark" style="width:50%; margin:auto;">
    <thead>
        <tr>
            <th>Tarea</th><th>Estado</th><th>Descripción</th>
        </tr>
    </thead>
    <tbody>
    ';

    if (isset($_SESSION["tareas"])) {
        foreach ($_SESSION["tareas"] as $tarea) {
            $tabla .= '<tr>';
            $tabla .= '<td>' . $tarea["tarea"] . '</td>';
            $tabla .= '<td>' . $tarea["estado"] . '</td>';
            $tabla .= '<td>' . $tarea["descripcion"] . '</td>';
            $tabla .= '</tr>';
        }
    } else {
        $tabla .= "<tr><td colspan='3'>No hay tareas</td></tr>";
    }
    $tabla .= "</tbody></table>";
    return $tabla;
}
?>
