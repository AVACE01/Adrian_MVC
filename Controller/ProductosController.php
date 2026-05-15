<?php

include __DIR__ . "/../Model/ProductosModel.php";

$modelo = new ProductoModelo();

if(isset($_POST['guardar'])){
    $nombre = trim($_POST['nombre']);
    $cantidad = trim($_POST['cantidad']);
    $tipo = trim($_POST['tipo']);

    // VALIDACIONES

    if(empty($nombre) || empty($cantidad) || empty($tipo)){

        echo "Todos los campos son obligatorios";
        exit();
    }

    if(!is_numeric($cantidad)){

        echo "La cantidad debe ser numerica";
        exit();
    }

    if($cantidad <= 0){

        echo "La cantidad debe ser mayor a 0";
        exit();
    }

    $modelo->insertar($nombre,$cantidad,$tipo);

    header("Location: ../View/CatalogoProductos/index.php");
}

if(isset($_GET['eliminar'])){

    $id = $_GET['eliminar'];

    $modelo->eliminar($id);

    header("Location: ../View/CatalogoProductos/index.php");
}

if(isset($_POST['actualizar'])){

    $id = $_POST['id'];
    $nombre = trim($_POST['nombre']);
    $cantidad = trim($_POST['cantidad']);
    $tipo = trim($_POST['tipo']);

    if(empty($nombre) || empty($cantidad) || empty($tipo)){

        echo "Todos los campos son obligatorios";
        exit();
    }

    $modelo->actualizar($id,$nombre,$cantidad,$tipo);

    header("Location: ../View/CatalogoProductos/index.php");
}

?>