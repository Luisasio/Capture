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
  
  echo '
  <script>
    alert("Respuesta correcta");
    location.href = "' . $nueva_pantalla . '";
  </script>
  ';
} else {
  // Calcula la pantalla de reto actual
  $pantalla_actual = "pantalla_reto" . ($_SESSION['reto_index'] + 1) . ".php";

  echo '
  <script>
    alert("Respuestas incorrectas");
    location.href = "' . $pantalla_actual . '";
  </script>
  ';
}
?>



