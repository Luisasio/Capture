<?php
require "conexion.php";
session_start();

$reto_index = $_SESSION['reto_index'];
$retos = $_SESSION['retos'];
$reto_actual = $retos[$reto_index]; // Obtiene el reto actual

$reto = $_POST['reto'];
$bandera = $_POST['bandera'];

// Consulta solo para validar el reto actual
$comparar_campos = "SELECT * FROM retos WHERE reto = '$reto' AND bandera = '$bandera' AND reto = '$reto_actual'";
$resultado = mysqli_query($conectar, $comparar_campos);

if (mysqli_num_rows($resultado) > 0) {
  $_SESSION['reto_index'] += 1;
  /*$_SESSION['mensaje'] = "Respuesta correcta"; // Almacena el mensaje*/
  header("Location: pantalla_reto" . ($_SESSION['reto_index'] + 1) . ".php");
  exit();
} else {
  $_SESSION['mensaje'] = "Respuestas incorrectas"; // Almacena el mensaje
  header("Location: pantalla_reto" . ($_SESSION['reto_index'] + 1) . ".php");
  exit();
}
?>
