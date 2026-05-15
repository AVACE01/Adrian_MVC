<?php
include __DIR__ . "/../../Model/TiposProductosModel.php";

$tipo = new TiposModel();
$datos = $tipo->mostrar();
?>

<?php include __DIR__ . "/../Layout/header.php"; ?>
<link rel="stylesheet" href="../CSS/estilo2.css">

<div class="container">

    <div class="header-acciones">
        <a href="../indexGeneral.php" class="btn">← Volver</a>

        <h2>Tipos de Productos</h2>

        <a href="agregar.php" class="btn">
            + Agregar Tipo de Producto
        </a>
    </div>

    <table class="tabla">
        <thead>
            <tr>
                <th>Nombre del Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($datos && $datos->num_rows > 0): ?>
            <?php while ($fila = $datos->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($fila['nombre_tipo']); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $fila['id_tipo']; ?>">
                        Editar
                    </a>
                    <a href="../../Controller/TiposProductosController.php?eliminar=<?php echo $fila['id_tipo']; ?>"
                        onclick="return confirm('¿Deseas eliminar este tipo de producto?')">
                        Eliminar
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
            <?php else: ?>
            <tr class="fila-vacia">
                <td colspan="2">No hay tipos de productos registrados</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<div class="project-footer">
    Proyecto MVC PHP | Examen Práctico
</div>

<?php include __DIR__ . "/../Layout/footer.php"; ?>