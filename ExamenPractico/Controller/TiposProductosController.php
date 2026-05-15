<?php
include __DIR__ . "/../Model/TiposProductosModel.php";

$modelo = new TiposModel();

if (isset($_POST['guardar'])) {

    $nombre = trim($_POST['nombre']);

    if (empty($nombre)) {
        echo "El nombre es obligatorio";
        exit();
    }

    $modelo->insertar($nombre);

    header("Location: ../View/CatalogoTiposProductos/index.php");
}

if (isset($_GET['eliminar'])) {

    $id = $_GET['eliminar'];

    $resultado = $modelo->eliminar($id);

    if ($resultado) {

        echo "
        <script>

            alert('Tipo de producto eliminado correctamente');

            window.location='../View/CatalogoTiposProductos/index.php';

        </script>
        ";
    } else {

        echo "
        <script>

            alert('No se puede eliminar porque existen productos relacionados con este tipo');

            window.location='../View/CatalogoTiposProductos/index.php';

        </script>
        ";
    }
}

if (isset($_POST['actualizar'])) {

    $id = $_POST['id'];
    $nombre = trim($_POST['nombre']);

    $modelo->actualizar($id, $nombre);

    header("Location: ../View/CatalogoTiposProductos/index.php");
}
