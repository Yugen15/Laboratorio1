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

        $sql = "select * productos";
        $this->conectar();
        $resultado = $this->con->query($sql);
        //Armar una tabla en HTML como resultado de este metodo

        $html = "<table id='tabla' class='table table-striped table-dark'>";
        $html .= "<thead><tr><th>ID</th><th>USUARIO</th><th>CONTRASEÑA</th><th>NIVEL</th><th>ACCIONES</th></tr></thead>";
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

    public function agregar(Productos $prod){
        $this->conectar();
        //para consultas preparadas, el primer paso es crear el statement (consulta preparada)
        $statement = 
        $this->con->prepare("INSERT into usuarios(nombre, costo, precio, stock, idcategoria) values(?,?,?,?)");
       
        //el 2° paso es establecer parametros (los valores de los simbolos ?)
        $nombre = $prod->getNombre();
        $costo = $prod->getCosto();
        $precio = $prod->getPrecio();
        $stock = $prod->getStock();
        $idCa = $prod->getIdCatego();
        //establezco parametros
        $statement->bind_param("sddii",$nombre,$costo,$precio,$stock,$idCa);

        if($statement->execute()){
            $statement->close();
            $this->desconectar();
            return true;
        }else{
            $statement->close();
            $this->desconectar();
            return false;
        }

    }
}
