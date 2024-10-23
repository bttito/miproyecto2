<?php
require_once __DIR__ . '/includes/functions.php';
if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
    $count = eliminarTarea($_GET['id']);
    $mensaje = $count > 0 ? "Tarea eliminada con éxito." : "No se pudo eliminar la tarea.";
}
$tareas = obtenerTareas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas de Cursos</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="container">
    <h1>Gestión de inventarios </h1>

    <?php if (isset($mensaje)): ?>
        <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>

    <a href="agregar_tarea.php" class="button">Agregar Nuevo invetario</a>

    <h2>Lista de inventarios</h2>
    <!-- ... -->
    <table>
    <tr>
        <th>Código de producto</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Cantidad en stock</th>
        <th>Precio de compra</th>
        <th>Precio de Venta</th>
        <th>Proveedor</th>
        <th>Fecha de Ingreso</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($tareas as $tarea): ?>
    <tr>
        <td><?php echo htmlspecialchars($tarea['codigo']); ?></td>
        <td><?php echo htmlspecialchars($tarea['nombre']); ?></td>
        <td><?php echo htmlspecialchars($tarea['descripcion']); ?></td>
        <td><?php echo htmlspecialchars($tarea['cantidad']); ?></td>
        <td><?php echo htmlspecialchars($tarea['precio']); ?></td>
        <td><?php echo htmlspecialchars($tarea['precios']); ?></td>
        <td><?php echo htmlspecialchars($tarea['proveedor']); ?></td>

        <td><?php echo formatDate($tarea['fecha_vencimiento']); ?></td>
        <td class="actions">
            <a href="editar_tarea.php?id=<?php echo $tarea['_id']; ?>" class="button">Editar</a>
            <a href="index.php?accion=eliminar&id=<?php echo $tarea['_id']; ?>" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?');">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
</div>
</body>
</html>
