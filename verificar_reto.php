<?php
require "conexion.php";

$reto = $_POST['reto'];
$bandera = $_POST['bandera'];


echo $reto. "<br>";
echo $bandera. "<br>";

$comparar_campos = "SELECT * FROM retos WHERE reto = '$reto' AND bandera ='$bandera'";

$resultado = mysqli_query($conectar, $comparar_campos);

if (mysqli_num_rows($resultado) > 0) {
  echo '
  <script>
    alert("respuesta correcta");
    location.href = "pantalla_reto2.php";
  </script>
  ';
} else {
  echo '
  <script>
    alert("Respuestas incorrectas");
    location.href = "pantalla_reto1.php";
  </script>
  ';
}
?>



