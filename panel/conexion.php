<?php 

$host = "localhost";
$usuario = "root";
$contrasena = "";
$bd = "capture";

$conectar = mysqli_connect($host, $usuario, $contrasena, $bd);

if(!$conectar){
  echo "Error en la conexion";
}









?>