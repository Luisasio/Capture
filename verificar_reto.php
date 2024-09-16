<?php
require "conexion.php";
session_start();

$reto = $_POST['reto'];
$bandera = $_POST['bandera'];

//echo $reto . "<br>";
//echo $bandera . "<br>";

$comparar_campos = "SELECT * FROM retos WHERE reto = '$reto' AND bandera = '$bandera'";
$resultado = mysqli_query($conectar, $comparar_campos);

if (mysqli_num_rows($resultado) > 0) {
  // Incrementa el índice del reto cuando la respuesta es correcta
  $_SESSION['reto_index'] += 1;

  // Calcula la pantalla de reto siguiente
  $nueva_pantalla = "pantalla_reto" . ($_SESSION['reto_index'] + 1) . ".php";
  
  // Redirigir a la siguiente pantalla
  $reto_siguiente = "pantalla_reto" . ($_SESSION['reto_index'] + 1) . ".php";
  header("Location: $reto_siguiente");
  exit(); // Termina la ejecución del script
} else {
  // Si la respuesta es incorrecta, crea una variable de error
  $_SESSION['error'] = "Respuesta incorrecta. Inténtalo de nuevo.";
  
  // Redirige a la misma pantalla de reto actual
  $reto_actual = "pantalla_reto" . ($_SESSION['reto_index'] + 1) . ".php";
  header("Location: $reto_actual");
  exit(); // Termina la ejecución del script
}
?>



