<?php
include "seguridad.php";
$numero_equipo = $_SESSION['numero_equipo'];
$nombre_equipo = $_SESSION['nombre_equipo'];
$reto = $_SESSION['reto'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/estilo_principal.css">
</head>
<body>
  <h2>hoal</h2>
  <a href="salir.php">salir</a>
  <div>
    <h2>El nombre es: <?php echo htmlspecialchars($nombre_equipo); ?></h2>
    <h2>El reto es: <?php echo htmlspecialchars($reto); ?></h2>
    
  </div>
</body>
</html>