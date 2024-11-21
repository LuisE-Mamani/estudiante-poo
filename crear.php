<?php
require_once('../estudiante/conexion.php');
require_once('../estudiante/clases/libro.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $año = $_POST['año'];
    $genero = $_POST['genero'];

    $libro = new libro($conexion, $titulo, $autor, $editorial, $año, $genero);
    $libro->registrarLibro();
}
?>
