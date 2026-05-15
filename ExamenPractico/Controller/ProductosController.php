<?php

include __DIR__ . "/../Model/ProductosModel.php";

$modelo = new ProductoModelo();

// GUARDAR
if(isset($_POST['guardar'])){

    $nombre = trim($_POST['nombre']);
    $cantidad = trim($_POST['cantidad']);
    $tipo = trim($_POST['tipo']);

    if(empty($nombre) || empty($cantidad) || empty($tipo)){

        echo "
        <script>
            alert('Todos los campos son obligatorios');
            window.history.back();
        </script>
        ";

        exit();
    }

    if(!is_numeric($cantidad)){

        echo "
        <script>
            alert('La cantidad debe ser numérica');
            window.history.back();
        </script>
        ";

        exit();
    }

    if($cantidad <= 0){

        echo "
        <script>
            alert('La cantidad debe ser mayor a 0');
            window.history.back();
        </script>
        ";

        exit();
    }

    $resultado = $modelo->insertar($nombre,$cantidad,$tipo);

    if($resultado){

        echo "
        <script>
            alert('Producto agregado correctamente');
            window.location='../View/CatalogoProductos/index.php';
        </script>
        ";

    }else{

        echo "
        <script>
            alert('Error al guardar');
            window.history.back();
        </script>
        ";
    }
}

// ELIMINAR
if(isset($_GET['eliminar'])){

    $id = $_GET['eliminar'];

    $resultado = $modelo->eliminar($id);

    if($resultado){

        echo "
        <script>
            alert('Producto eliminado correctamente');
            window.location='../View/CatalogoProductos/index.php';
        </script>
        ";

    }else{

        echo "
        <script>
            alert('Error al eliminar');
            window.location='../View/CatalogoProductos/index.php';
        </script>
        ";
    }
}

// ACTUALIZAR
if(isset($_POST['actualizar'])){

    $id = $_POST['id'];

    $nombre = trim($_POST['nombre']);
    $cantidad = trim($_POST['cantidad']);
    $tipo = trim($_POST['tipo']);

    if(empty($nombre) || empty($cantidad) || empty($tipo)){

        echo "
        <script>
            alert('Todos los campos son obligatorios');
            window.history.back();
        </script>
        ";

        exit();
    }

    $resultado = $modelo->actualizar($id,$nombre,$cantidad,$tipo);

    if($resultado){

        echo "
        <script>
            alert('Producto actualizado correctamente');
            window.location='../View/CatalogoProductos/index.php';
        </script>
        ";

    }else{

        echo "
        <script>
            alert('Error al actualizar');
            window.history.back();
        </script>
        ";
    }
}

?>