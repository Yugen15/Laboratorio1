<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if ($_POST["op"] == "agregar") {
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

    if ($_POST["op"] == "eliminar") {
        $tareaEliminar = $_POST["tareaEliminar"];

        if (isset($_SESSION["tareas"])) {
            foreach ($_SESSION["tareas"] as $key => $tarea) {
                if ($tarea["tarea"] == $tareaEliminar) {
                    unset($_SESSION["tareas"][$key]);
                    break;
                }
            }
        }
        echo crearTabla(); 
    }

    if ($_POST["op"] == "get") {
        echo crearTabla(); 
    }
    if ($_POST["op"] == "editar") {
        $tareaEditar = $_POST["tareaEditar"];
        $estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
        $descripcion = $_POST["descripcion"];
    
        if (isset($_SESSION["tareas"])) {
            foreach ($_SESSION["tareas"] as $key => $tarea) {
                if ($tarea["tarea"] == $tareaEditar) {
                    $_SESSION["tareas"][$key]["estado"] = $estado;
                    $_SESSION["tareas"][$key]["descripcion"] = $descripcion;
                    break;
                }
            }
        }
        echo crearTabla(); 
    }
} else {
    header("location: Gestion.php"); 
    exit();
}

function crearTabla()
{
    $tabla = '<table class="table centered-table">';
    $tabla .= '<thead>
                <tr>
                    <th>Tarea</th>
                    <th>Estado</th>
                    <th>Descripción</th>
                </tr>
            </thead>';
    
    if (isset($_SESSION["tareas"])) {
        $tabla .= '<tbody>';
        foreach ($_SESSION["tareas"] as $tarea) {
            $tabla .= '<tr>';
            $tabla .= '<td>' . $tarea["tarea"] . '</td>';
            $tabla .= '<td>' . $tarea["estado"] . '</td>';
            $tabla .= '<td>' . $tarea["descripcion"] . '</td>';
            $tabla .= '</tr>';
        }
        $tabla .= '</tbody>';
    } else {
        $tabla .= '<tbody><tr><td colspan="3">No hay tareas</td></tr></tbody>';
    }
    
    $tabla .= '</table>';
    return $tabla;
}
?>