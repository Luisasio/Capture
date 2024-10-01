<?php
require "conexion.php";
session_start();

$reto_index = $_SESSION['reto_index'];
$retos = $_SESSION['retos'];
$reto_actual = $retos[$reto_index]; // Obtiene el reto actual

$reto = $_POST['reto'];
$bandera = $_POST['bandera'];
$tiempo_envio = $_POST['tiempo_envio'];
$numero_equipo = $_SESSION['numero_equipo'];

// Consulta solo para validar el reto actual
$comparar_campos = "SELECT * FROM retos WHERE reto = '$reto' AND bandera = '$bandera' AND reto = '$reto_actual'";
$resultado = mysqli_query($conectar, $comparar_campos);

if (mysqli_num_rows($resultado) > 0) {
  $insertar_tiempo = "INSERT INTO tiempo (tiempo_fin,numero_equipo, reto) VALUES (?,?,?)";
    $stmt = $conectar->prepare($insertar_tiempo);
    $stmt->bind_param("sss",$tiempo_envio, $numero_equipo, $reto_actual);
    $stmt->execute();
  //funciones de la redireccion
  $_SESSION['reto_index'] += 1;
  header("Location: pantalla_reto" . ($_SESSION['reto_index'] + 1) . ".php");
  exit();
} else {
  $_SESSION['mensaje'] = "Respuestas incorrectas"; // Almacena el mensaje
  header("Location: pantalla_reto" . ($_SESSION['reto_index'] + 1) . ".php");
  exit();
}
?>
