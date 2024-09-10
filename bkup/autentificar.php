<?php 
require "conexion.php";

$numero_equipo = addslashes($_POST['numero_equipo']);
$contrasena = addslashes($_POST['contrasena']);

$comparar = "SELECT * FROM equipos WHERE numero_equipo = '$numero_equipo' AND contrasena ='$contrasena'";

$resultado = mysqli_query($conectar, $comparar);

if (mysqli_num_rows($resultado) > 0) {
  session_start();
  $_SESSION["autentificado"] = "SI";
  $_SESSION["numero_equipo"] = $numero_equipo;// Guarda el número del equipo
  $_SESSION["reto_actual"] = 1;  // Inicializa el reto actual en 1
  header("Location:pantalla_reto1.php");
} else {
  echo '
  <script>
    alert("NO ESTÁS REGISTRADO");
    location.href = "login.php";
  </script>
  ';
}
?>