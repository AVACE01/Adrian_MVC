<?php
include __DIR__ . "/../../Model/TiposProductosModel.php";

$modelo = new TiposModel();

$id = $_GET['id'];
$datos = $modelo->buscar($id);
$fila = $datos->fetch_assoc();
?>

<?php include __DIR__ . "/../Layout/header.php"; ?>
<link rel="stylesheet" href="../CSS/tipos.css">

<div class="container">

    <div class="header-acciones">
        <h2>Editar Tipo de Producto</h2>
        <a href="index.php" class="btn">← Volver</a>
    </div>

    <form action="../../Controller/TiposProductosController.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($fila['id_tipo']); ?>">

        <p><strong>Nombre del Tipo:</strong></p>
        <input type="text" name="nombre" value="<?php echo htmlspecialchars($fila['nombre_tipo']); ?>" required>

        <br><br>
        <input type="submit" name="actualizar" value="Actualizar" class="btn-actualizar">
    </form>

</div>

<div class="project-footer">
    Proyecto MVC PHP | Examen Práctico
</div>

<?php include __DIR__ . "/../Layout/footer.php"; ?>