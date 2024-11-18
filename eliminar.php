<?php
require_once('../estudiante/conexion.php');
require_once('../estudiante/clases/libro.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $libro = new Libro($conexion);
    $libro->eliminarLibro($id);

    header("Location: index.php"); 
}
?>