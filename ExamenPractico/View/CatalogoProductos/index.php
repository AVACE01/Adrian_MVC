<?php
include __DIR__ . "/../../Model/ProductosModel.php";

$modelo = new ProductoModelo();
$datos = $modelo->mostrarProductos();
?>

<?php include __DIR__ . "/../Layout/header.php"; ?>

<link rel="stylesheet" href="../CSS/estilo.css">
<script src="../JS/filtro.js"></script>

<div class="container">

    <div class="header-acciones">
        <a href="../indexGeneral.php" class="btn">← Volver</a>

        <h2> Productos</h2>
        <a href="agregar.php" class="btn">
            + Agregar Producto
        </a>
    </div>

    <table class="tabla" id="tablaProductos">
        <thead>
            <tr>
                <th>
                    Nombre
                    <input type="text" id="filtroNombre" placeholder="Buscar nombre..." class="filtro-input">
                </th>
                <th>
                    Cantidad
                    <input type="text" id="filtroCantidad" placeholder="Buscar cantidad..." class="filtro-input">
                </th>
                <th>
                    Tipo
                    <input type="text" id="filtroTipo" placeholder="Buscar tipo..." class="filtro-input">
                </th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaBody">
            <?php while ($fila = $datos->fetch_assoc()) { ?>
            <tr data-nombre="<?php echo strtolower(htmlspecialchars($fila['nombre'])); ?>"
                data-cantidad="<?php echo strtolower(htmlspecialchars($fila['cantidad'])); ?>"
                data-tipo="<?php echo strtolower(htmlspecialchars($fila['nombre_tipo'])); ?>">
                <td><?php echo htmlspecialchars($fila['nombre']); ?></td>
                <td><?php echo htmlspecialchars($fila['cantidad']); ?></td>
                <td><?php echo htmlspecialchars($fila['nombre_tipo']); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $fila['id_producto']; ?>">Editar</a>
                    <a href="../../Controller/ProductosController.php?eliminar=<?php echo $fila['id_producto']; ?>"
                        onclick="return confirm('¿Deseas eliminar este producto?')">Eliminar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<div class="project-footer">
    Proyecto MVC PHP | Examen Práctico
</div>

<?php include __DIR__ . "/../Layout/footer.php"; ?>