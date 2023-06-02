<?php
require_once 'Conexion.php';

class Detalle extends Conexion{
    public $detalle_id;
    public $detalle_venta;
    public $detalle_producto;
    public $detalle_cantidad;
    public $detalle_situacion;


    public function __construct($args = [] )
    {
        $this->detalle_id = $args['detalle_id'] ?? null;
        $this->detalle_venta = $args['detalle_venta'] ?? '';
        $this->detalle_producto = $args['detalle_producto'] ?? '';
        $this->detalle_cantidad = $args['detalle_cantidad'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO detalle_ventas(detalle_venta, detalle_producto, detalle_cantidad) values('$this->detalle_venta','$this->detalle_producto', '$this->detalle_cantidad')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}