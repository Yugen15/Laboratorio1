<?php
include_once "Config.php";
include_once "Productos.php";

class DAO{
    private $con;

    private function conectar(){
        try{
            $this->con = new mysqli(HOST,USER,PASS,DB);
        }catch(Exception $ex){
            echo "<script>console.log(".$ex->getTraceAsString().")</script>";
        }
    }
    private function desconectar(){
        $this->con->close();
    }

    public function get(){

        $sql = "select from * productos";
        $this->conectar();
        $resultado = $this->con->query($sql);
        //Armar una tabla en HTML como resultado de este metodo

        $html = "<table id='tabla' class='table table-striped table-dark'>";
        $html .= "<thead><tr><th>ID P</th><th>ID C</th><th>NOMBRE</th><th>COSTO</th><th>PRECIO</th><th>STOCK</th><th>ACCIONES</th></tr></thead>";
        $html .= "<tbody>";
        while($fila=mysqli_fetch_assoc($resultado)){
            $html .= "<tr>";
            $html .= "<td>" . $fila['idproducto'] . "</td>";
            $html .= "<td>" . $fila['idcategoria'] . "</td>"; 
            $html .= "<td>" . $fila['nombre'] . "</td>";
            $html .= "<td>" . $fila['costo'] . "</td>";
            $html .= "<td>" . $fila['precio'] . "</td>";
            $html .= "<td>" . $fila['stock'] . "</td>";
            $html .= "<td> 
            <img src='img/modificar.png' style='width:25px; height:25px; cursor: pointer;' onclick='editar(" . $fila['idusuario'] . ")'>
                <a onclick=\"javascript:eliminar('" . $fila['idusuario'] . "')\" style='cursor:pointer;'>
                <img src='img/eliminar.png' style='width:25px; height:25px;'> </a> 
            </td>";
            $html .= "</tr>";
        }
        $html .= "</tbody></table>";
        $resultado->close();
        $this->con->close();
        return $html;
    
    }
}
