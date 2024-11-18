<?php

require_once('../estudiante/conexion.php');

class libro{
    public $titulo, $autor, $editorial, $año, $genero;
    public $conexion;

    public function __construct($conexion, $titulo = null, $autor = null, $editorial = null, $año = null, $genero = null)

    {
        $this->conexion = $conexion;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->año = $año;
        $this->genero = $genero;
    }
    public function registrarLibro()
    {
        $sql = "INSERT INTO `libro`(`titulo`, `autor`, `editorial`, `año`, `genero`) VALUES ('$this->titulo','$this->autor','$this->editorial','$this->año','$this->genero')";
        if (mysqli_query($this->conexion, $sql)) {
            echo "libro registrado correctamente";
        } else {
            echo "Error al registrar el libro: " . mysqli_error($this->conexion);
        }
    }  
    public static function mostrarLibro($conexion)
    {
        $sql = "SELECT * FROM `libro` ";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "ID: " . $fila["id"] . " - titulo: " . $fila["titulo"] . " - autor: " . $fila["autor"] . " - editorial: " . $fila["editorial"] . "<br>";
            }
        } else {
            echo "0 resultados";
        }
    }
    public function actualizarLibro($id)
    {
        $sql = "UPDATE libro SET titulo='$this->titulo', autor='$this->autor', editorial='$this->editorial', año='$this->año', genero='$this->genero' WHERE id=$id";
        if (mysqli_query($this->conexion, $sql)) {
            echo "Libro actualizado correctamente";
        } else {
            echo "Error al actualizar el libro: " . mysqli_error($this->conexion);
        }
    }
    public function eliminarlibro($id)
    {
        $sql = "DELETE FROM libro WHERE id=$id";
        if (mysqli_query($this->conexion, $sql)) {
            echo "libro eliminado correctamente";
        } else {
            echo "Error al eliminar el libro: " . mysqli_error($this->conexion);
        }
    }
}
?>
    
