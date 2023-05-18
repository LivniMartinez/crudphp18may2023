<?php   

abstract class Conexion {
    public static $conexion = null;

    private static function conectar (){
        
        //CONEXION A LA BD DE INFORMIX EN DOCKER
        try {
            self::$conexion= new PDO ("informix:host=host.docker.internal; service=9088;database=mdn; server=informix; protocol=onsoctcp;EnableScrollableCursors=1", "informix","in4mix");
            // echo "conexion exitosa";
        } catch (PDOException $e){
        //IMPRIME EN PANTALLA EL ERROR 
            echo "error de conexion de base de datos";
            echo $e->getMessage();
            exit;
        }

        return self::$conexion;
    }

    public static function ejecutar ($sql){
        //CONECTANDOSE A LA BD CON EL METODO CONECTAR
        self::conectar();
        //PREPARAMOS LA SENTENCIA
        $sentencia = self::$conexion->prepare($sql);
        //EJECUTAMOS LA SENTENCIA
        $sentencia->execute();
        $resultados = $sentencia->fet
       //CERRAMOS LA CONEXION
       self::$conexion = null;
        //DEVOLVEMOS RESULTADOS
        return $resultado;
    }
}
?>