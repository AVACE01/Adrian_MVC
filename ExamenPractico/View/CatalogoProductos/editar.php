<?php
include __DIR__ . "/../../Model/ProductosModel.php";
include __DIR__ . "/../../Model/TiposProductosModel.php";

$modelo = new ProductoModelo();
$tipoModelo = new TiposModel();

$id = $_GET['id'];
$datos = $modelo->buscar($id);
$fila = $datos->fetch_assoc();
$tipos = $tipoModelo->mostrar();
?>

<?php include __DIR__ . "/../Layout/header.php"; ?>
<link rel="stylesheet" href="../CSS/producto.css">

<div class="container">

    <div class="header-acciones">
        <h2>Editar Producto</h2>
        <a href="index.php" class="btn">← Volver</a>
    </div>

    <form action="../../Controller/ProductosController.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $fila['id_producto']; ?>">

        <p><strong>Nombre:</strong></p>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($fila['nombre']); ?>">

        <p><strong>Cantidad:</strong></p>
        <input type="number" name="cantidad" value="<?php echo htmlspecialchars($fila['cantidad']); ?>">

        <p><strong>Tipo:</strong></p>
        <select name="tipo">
            <?php while($tipo = $tipos->fetch_assoc()): ?>
                <option value="<?php echo $tipo['id_tipo']; ?>">
                    <?php echo htmlspecialchars($tipo['nombre_tipo']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <br><br>
        <input type="submit" name="actualizar" value="Actualizar" class="btn-actualizar">
    </form>

</div>

<div class="project-footer">
    Proyecto MVC PHP | Examen Práctico
</div>

<?php include __DIR__ . "/../Layout/footer.php"; ?>