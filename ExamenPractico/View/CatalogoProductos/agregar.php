<?php

include __DIR__ . "/../../Model/TiposProductosModel.php";

$tipos = new TiposModel();

$datosTipos = $tipos->mostrar();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Agregar</title>
    <link rel="stylesheet" href="../CSS/producto.css">

</head>

<body>

    <h1>Agregar Producto</h1>

    <form action="../../Controller/ProductosController.php" method="POST">

        <label>Nombre:</label>
        <input type="text" name="nombre">

        <br><br>

        <label>Cantidad:</label>
        <input type="number" name="cantidad">

        <br><br>

        <label>Tipo:</label>

        <select name="tipo">

            <?php while ($filaTipo = $datosTipos->fetch_assoc()) { ?>

                <option value="<?php echo $filaTipo['id_tipo']; ?>">

                    <?php echo $filaTipo['nombre_tipo']; ?>

                </option>

            <?php } ?>

        </select>

        <br><br>

        <input type="submit" name="guardar" value="Guardar">

    </form>

</body>

</html>