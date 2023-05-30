<?php
require 'Conexion.php';

class Cliente extends Conexion{
    public $cliente_id;
    public $cliente_nombre;
    public $cliente_nit;
    public $producto_situacion;


    public function __construct($args = [] )
    {
        $this->cliente_id = $args['cliente_id'] ?? null;
        $this->cliente_nombre = $args['cliente_nombre'] ?? '';
        $this->cliente_nit = $args['cliente_nit'] ?? '';
        $this->cliente_situacion = $args['cliente_situacion'] ?? '';
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