<?php
require 'Conexion.php';

class Producto extends Conexion{
    public $producto_id;
    public $producto_nombre;
    public $producto_precio;
    public $producto_situacion;


    public function __construct($args = [] )
    {
        $this->producto_id = $args['producto_id'] ?? null;
        $this->producto_nombre = $args['producto_nombre'] ?? '';
        $this->producto_precio = $args['producto_precio'] ?? '';
        $this->producto_situacion = $args['producto_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO productos(producto_nombre, producto_precio) values('$this->producto_nombre','$this->producto_precio')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from productos where producto_situacion = 1 ";

        if($this->producto_nombre != ''){
            $sql .= " and producto_nombre like '%$this->producto_nombre%' ";
        }

        if($this->producto_precio != ''){
            $sql .= " and producto_precio = $this->producto_precio ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }
}