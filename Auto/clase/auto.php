<?php
 class Auto {
    public $marca, $modelo, $año;
    public $conexion;

    public function __construct($conexion, $marca, $modelo,$año) {
        $this->conexion = $conexion; 
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->año = $año;
    }
    public function registrar_auto() {
        $sql = "INSERT INTO `autos`(`id`, `marca`, `modelo`, `año`) VALUES ('$this->marca','$this->modelo','$this->año','[value-4]')";
        if (mysqli_query($this->conexion, $sql)) {
            echo "El auto fue registrado <hr>";
        } else {
            echo "Error al registrar el auto: " . mysqli_error($this->conexion);
        }
    }
    public function MostrarAlumno()
    {
        $sql = "SELECT * FROM 'alumno'";
        $resultado = mysqli_query($this->conexion, $sql);

        if( $resultado){
        if(mysqli_num_rows($resultado) > 0 ){
         while($fila = mysqli_fetch_assoc($resultado)){
            echo "MARCA: ". $fila['marca'] . "<br>";
            echo "MODELO: ". $fila['modelo'] . "<br>";
            echo "AÑO: ". $fila['año'] . "<br>";
            echo "<hr>";
    }
          }else{
            echo "no hay auto registrados";
           }
        }else{
           echo "error en la consulta: " . mysqli_error(($this->conexion));
        }
    }
 }
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['marca'];
    $nombre = $_POST['modelo'];
    $apellidos = $_POST['aaño'];
    
    $auto = new Auto($conexion, $marca, $modelo,$año);

    $alumnito->registrarAuto();
    $alumnito->MostrarAuto();
}