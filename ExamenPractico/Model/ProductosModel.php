<?php
include __DIR__ . "/../Config/conexion.php";

class ProductoModelo{

    public function mostrarProductos(){

        global $conexion;

        $sql = "SELECT p.id_producto,
                       p.nombre,
                       p.cantidad,
                       t.nombre_tipo
                FROM productos p
                INNER JOIN tipos_producto t
                ON p.id_tipo = t.id_tipo";

        $resultado = $conexion->query($sql);

        return $resultado;
    }

    public function insertar($nombre,$cantidad,$tipo){

        global $conexion;

        $sql = "INSERT INTO productos(nombre,cantidad,id_tipo)
                VALUES('$nombre','$cantidad','$tipo')";

        return $conexion->query($sql);
    }

    public function eliminar($id){

        global $conexion;

        $sql = "DELETE FROM productos
                WHERE id_producto = '$id'";

        return $conexion->query($sql);
    }

    public function buscar($id){

        global $conexion;

        $sql = "SELECT * FROM productos
                WHERE id_producto = '$id'";

        return $conexion->query($sql);
    }

    public function actualizar($id,$nombre,$cantidad,$tipo){

        global $conexion;

        $sql = "UPDATE productos
                SET nombre='$nombre',
                    cantidad='$cantidad',
                    id_tipo='$tipo'
                WHERE id_producto='$id'";

        return $conexion->query($sql);
    }
}
?>