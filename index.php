<?php
require_once('../estudiante/conexion.php');
require_once('../estudiante/clases/libro.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Lista de Libro</title>
</head>
<body>
    <h1>Libro</h1>
    <a href="crear.php">Registrar nuevo libro</a>
    <h2>Lista de Libro:</h2>
    <?php
    $sql = "SELECT * FROM `libro`";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "ID: " . $fila["id"] . " - Titulo: " . $fila["titulo"] . " - Autor: " . $fila["autor"] . " - Editorial: " . $fila["editorial"] ."- Año: " . $fila["año" ]. "- Genero: " . $fila["genero"];
            echo " <a href='editar.php?id=" . $fila['id'] . "'>Editar</a> | ";
            echo "<a href='eliminar.php?id=" . $fila['id'] . "' onclick=\"return confirm('¿Estás seguro de eliminar este estudiante?')\">Eliminar</a><br>";
        }
    } else {
        echo "0 resultados";
    }
    ?>
</body>
</html>