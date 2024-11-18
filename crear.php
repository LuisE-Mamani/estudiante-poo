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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Libro</title>
</head>
<body>
    <h1>Registrar Libro</h1>
    <form method="POST">
        <input type="text" name="titulo" placeholder="Titulo" required>
        <input type="text" name="autor" placeholder="Autor" required>
        <input type="text" name="editorial" placeholder="Editorial" required>
        <input type="number" name="año" placeholder="Año" required>
        <input type="text" name="genero" placeholder="Genero" required>
        <button type="submit">Registrar</button>
        <a href="index.php">volver</a>
    </form>
</body>
</html>