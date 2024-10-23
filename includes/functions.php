<?php

require_once __DIR__ . '/../config/database.php';
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}
function formatDate($date) {
    return $date->toDateTime()->format('Y-m-d');
}
function crearTarea($codigo , $nombre, $descripcion, $cantidad,$precio ,$precios, $proveedor , $fecha_vencimiento) {
    global $tasksCollection;
    $resultado = $tasksCollection->insertOne([
        'codigo' => sanitizeInput($codigo),
        'nombre' => sanitizeInput($nombre),
        'descripcion' => sanitizeInput($descripcion),
        'cantidad' => sanitizeInput($cantidad),
        'precio' => sanitizeInput($precio),
        'precios' => sanitizeInput($precios),
        'proveedor' => sanitizeInput($proveedor),

        'fecha_vencimiento' => new MongoDB\BSON\UTCDateTime(strtotime($fecha_vencimiento) * 1000)
    ]);
    return $resultado->getInsertedId();
}
function obtenerTareas() {
    global $tasksCollection;
    return $tasksCollection->find();
}
function obtenerTareaPorId($id) {
    global $tasksCollection;
    return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}
function actualizarTarea($id, $codigo , $nombre, $descripcion ,$cantidad, $precio , $precios, $proveedor , $fecha_vencimiento) {
    global $tasksCollection;
    $resultado = $tasksCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'codigo' => sanitizeInput($codigo),
            'nombre' => sanitizeInput($nombre),
            'descripcion' => sanitizeInput($descripcion),
            'cantidad' => sanitizeInput($cantidad),
            'precio' => sanitizeInput($precio),
            'precios' => sanitizeInput($precios),
            'proveedor' => sanitizeInput($proveedor),

            'fecha_vencimiento' => new MongoDB\BSON\UTCDateTime(strtotime($fecha_vencimiento) * 1000)
        ]]
    );
    return $resultado->getModifiedCount();
}
function eliminarTarea($id) {
    global $tasksCollection;
    $resultado = $tasksCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}
