<?php 
require "conexion.php";

$numero_equipo = addslashes($_POST['numero_equipo']);
$contrasena = addslashes($_POST['contrasena']);

$comparar = "SELECT * FROM equipos WHERE numero_equipo = '$numero_equipo' AND contrasena ='$contrasena'";

$resultado = mysqli_query($conectar, $comparar);

// Verifica si la consulta devolvió algún resultado
if (mysqli_num_rows($resultado) > 0) {
  // Extrae la fila de resultados
  $fila = mysqli_fetch_assoc($resultado);
  
  //segunda consulta para la tabla retos
  $consulta_todos_retos = "SELECT reto FROM retos ORDER BY id_reto";
  $resultado_todos_retos = mysqli_query($conectar, $consulta_todos_retos);

  $retos = []; //arreglo para almacenar los retos

  // Itera sobre los resultados y almacena cada reto en el array
  while ($fila_reto = mysqli_fetch_assoc($resultado_todos_retos)) {
    $retos[] = $fila_reto['reto']; // Añade cada reto al array
  }



  session_start();
  $_SESSION["autentificado"] = "SI";
  $_SESSION["numero_equipo"] = $fila['numero_equipo']; // Guarda el número del equipo desde la base de datos
  $_SESSION["nombre_equipo"] = $fila['nombre_equipo'];
  $_SESSION["retos"] = $retos;
  $_SESSION["reto_index"] = 0;
  //$_SESSION["reto_actual"] = 1;  // Inicializa el reto actual en 1
  header("Location:pantalla_reto1.php");
} else {
  echo '
  <script>
    alert("NO ESTÁS REGISTRADO");
    location.href = "login.php?errorusuario=SI";
  </script>
  ';
}
?>