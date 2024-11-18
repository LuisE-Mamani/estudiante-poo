<?php
require_once('../estudiante/conexion.php');
require_once('../estudiante/clases/libro.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM libro WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $libroData = mysqli_fetch_assoc($resultado);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $año = $_POST['año'];
    $genero = $_POST['genero'];

    $libro = new Libro($conexion, $titulo, $autor, $editorial, $año, $genero);
    $libro->actualizarLibro($id);

    header("Location: index.php"); 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
</head>
<body>
    <h1>Editar Libro</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $libroData['id']; ?>">
        <input type="text" name="titulo" placeholder="Titulo"  value="<?php echo $libroData['titulo']; ?>" required>
        <input type="text" name="autor" placeholder="Autor" value="<?php echo $libroData['autor']; ?>" required>
        <input type="text" name="editorial" placeholder="Editorial" value="<?php echo $libroData['editorial']; ?>" required>
        <input type="number" name="año" placeholder="Año" value="<?php echo $libroData['año']; ?>" required>
        <input type="text" name="genero" placeholder="Genero" value="<?php echo $libroData['genero']; ?>" required>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
