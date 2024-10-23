|<?php
require_once __DIR__ . '/includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = crearTarea($_POST['codigo'], $_POST['nombre'], $_POST['descripcion'],$_POST['cantidad'],$_POST['precio'],$_POST['precios'],$_POST['proveedor'],$_POST['fecha_vencimiento']);
    if ($id) {
        header("Location: index.php?mensaje=Tarea creada con éxito");
        exit;
    } else {
        $error = "No se pudo crear la tarea.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Tarea</title>
    <link rel="stylesheet" href="css/agregar.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Nueva Tarea</h1>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
    <form method="POST">
        <label>Codigo: <input type="text" name="codigo" required></label>
        <label>Nombre: <input type="text" name="nombre" required></label>
        <label>Descripción: <textarea name="descripcion" required></textarea></label>
        <label>Cantidad: <input type="number" name="cantidad" required></label>
        <label>Precio_Compra: <input type="number" name="precio" step="0.01" required></label>
        <label>Precio_Compra: <input type="number" name="precios" step="0.01" required></label>
        <label>Proveedor: <input type="text" name="proveedor" required></label>
        <label>Fecha de Entrega: <input type="date" name="fecha_vencimiento" required></label>
        <input type="submit" value="Crear Tarea">
    </form>
    <a href="index.php" class="button">Volver a la lista de tareas</a>
</div>
</body>
</html>
