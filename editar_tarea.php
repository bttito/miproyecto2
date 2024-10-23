<?php
require_once __DIR__ . '/includes/functions.php';
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$tarea = obtenerTareaPorId($_GET['id']);

if (!$tarea) {
    header("Location: index.php?mensaje=Tarea no encontrada");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarTarea($_GET['id'], $_POST['codigo'], $_POST['nombre'], $_POST['descripcion'],$_POST['cantidad'],$_POST['precio'],$_POST['precios'],$_POST['proveedor'],$_POST['fecha_vencimiento']);
    if ($count > 0) {
        header("Location: index.php?mensaje=Tarea actualizada con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar la tarea.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="css/editar.css">
</head>
<body>
    <div class="container">
        <h1>Editar Tarea</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
    <form method="POST">
        <label>Codigo: <input type="text" name="codigo" value="<?php echo htmlspecialchars($tarea['codigo']); ?>" required></label>
        <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($tarea['nombre']); ?>" required></label>
        <label>Descripción: <textarea name="descripcion" value="<?php echo htmlspecialchars($tarea['descripcion']); ?>" required></textarea></label>
        <label>Cantidad: <input type="number" name="cantidad" value="<?php echo htmlspecialchars($tarea['cantidad']); ?>" required></label>
        <label>Precio_Compra: <input type="number" name="precio" step="0.01" value="<?php echo htmlspecialchars($tarea['precio']); ?>" required></label>
        <label>Precio]_Venta: <input type="number" name="precios" step="0.01" value="<?php echo htmlspecialchars($tarea['precios']); ?>" required></label>
        <label>Proveedor: <input type="text" name="proveedor" value="<?php echo htmlspecialchars($tarea['proveedor']); ?>" required></label>

        <label>Fecha de vencimiento: <input type="date" name="fecha_vencimiento" value="<?php echo formatDate($tarea['fecha_vencimiento']); ?>" required></label>
        <input type="submit" value="Actualizar Tarea">
    </form>
    <a href="index.php" class="button">Volver a la lista de tareas</a>
    </div>
</body>
</html>
