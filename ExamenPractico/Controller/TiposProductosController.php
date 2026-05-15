<?php
include __DIR__ . "/../Model/TiposProductosModel.php";

$modelo = new TiposModel();

if(isset($_POST['guardar'])){

    $nombre = trim($_POST['nombre']);

    if(empty($nombre)){
        echo "El nombre es obligatorio";
        exit();
    }

    $modelo->insertar($nombre);

    header("Location: ../View/CatalogoTiposProductos/index.php");
}

if(isset($_GET['eliminar'])){

    $id = $_GET['eliminar'];

    $modelo->eliminar($id);

    header("Location: ../View/CatalogoTiposProductos/index.php");
}

if(isset($_POST['actualizar'])){

    $id = $_POST['id'];
    $nombre = trim($_POST['nombre']);

    $modelo->actualizar($id,$nombre);

    header("Location: ../View/CatalogoTiposProductos/index.php");
}
?>