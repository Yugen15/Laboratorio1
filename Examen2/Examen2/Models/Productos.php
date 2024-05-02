<?php

class Productos{
    private $idproducto;
    private $nombre;
    private $costo;
    private $precio;
    private $stock;
    private $idcategoria;

    public function __construct(){

    }

    //Métodos get
    public function getIdProducto(){
        return $this->idproducto;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getStock(){
        return $this->stock;
    }
    public function getIdCatego(){
        return $this->idcategoria;
    }

    //Métodos set
    public function setIdProducto($idP){
        $this->idproducto=$idP;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setCosto($costo){
        $this->costo=$costo;
    }
    public function setPrecio($precio){
        $this->precio=$precio;
    }
    public function setStock($stock){
        $this->stock=$stock;
    }
    public function setIdCategoria($idCa){
        $this->idcategoria=$idCa;
    }
}