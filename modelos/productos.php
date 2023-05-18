<?php
require 'Conexion.php';

class Producto extends Conexion {

    public $prod_id;
    public $prod_nombre;
    public $produ_precio;
    public $prod_situacion;


    public function __construct ($argumentos = [])
    {
        $this->producto_id = $argumentos ['producto_id'] ?? null;
        $this->producto_nombre = $argumentos ['producto_nombre'] ?? '';
        $this->producto_precio = $argumentos ['producto_precio'] ?? '';
        $this->producto_situacion = $argumentos ['producto_situacion'] ?? '';

    }

    public function guardar (){
        $sql = "INSERT INTO productos(producto_nombre, producto_precio) values ('$this->producto_precio')";
        $resultado = self::ejecutar($sql);
    }   
}