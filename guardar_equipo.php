<?php
require "conexion.php";

$numero_equipo = $_POST['numeroEquipo'];
$nombre_equipo = $_POST['nombre_equipo'];
$contrasena = $_POST['contrasena'];
$participante1 = $_POST['participante1'];
$participante2 = $_POST['participante2'];
$participante3 = $_POST['participante3'];
$participante4 = $_POST['participante4'];

$insertar = "INSERT INTO equipos (numero_equipo, nombre_equipo ,contrasena, participante1,participante2, participante3,participante4) VALUES ('$numero_equipo','$nombre_equipo', '$contrasena','$participante1','$participante2','$participante3','$participante4')";

$query = mysqli_query($conectar, $insertar);


if ($query){
  echo '
    <script>
      alert("se guardo correctamente tu numero de equipo es: ");
      location.href="registrar_equipo.php";

    </script>
  
  ';
}


?>