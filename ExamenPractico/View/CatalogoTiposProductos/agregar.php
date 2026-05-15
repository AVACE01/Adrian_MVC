<?php

include __DIR__ . "/../../Model/TiposProductosModel.php";

$model = new TiposModel();

$datosTipos = $model-> mostrar();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Agregar</title>
    <link rel="stylesheet" href="../CSS/tipos.css">

</head>

<body>

    <h1>Agregar Producto</h1>

    <form action="../../Controller/TiposProductosController.php" method="POST">

        <label>Nombre:</label>
        <input type="text" name="nombre">

        <br><br>

        <input type="submit" name="guardar" value="Guardar">

    </form>

</body>

</html>