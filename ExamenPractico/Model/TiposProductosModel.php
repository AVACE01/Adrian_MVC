<?php
include __DIR__ . "/../Config/conexion.php";

class TiposModel{

    public function mostrar(){

        global $conexion;

        $sql = "SELECT * FROM tipos_producto";

        return $conexion->query($sql);
    }

    public function insertar($nombre){

        global $conexion;

        $sql = "INSERT INTO tipos_producto(nombre_tipo)
                VALUES('$nombre')";

        return $conexion->query($sql);
    }

    public function eliminar($id){

        global $conexion;

        $sql = "DELETE FROM tipos_producto
                WHERE id_tipo='$id'";

        return $conexion->query($sql);
    }

    public function buscar($id){

        global $conexion;

        $sql = "SELECT * FROM tipos_producto
                WHERE id_tipo='$id'";

        return $conexion->query($sql);
    }

    public function actualizar($id,$nombre){

        global $conexion;

        $sql = "UPDATE tipos_producto
                SET nombre_tipo='$nombre'
                WHERE id_tipo='$id'";

        return $conexion->query($sql);
    }
}
?>