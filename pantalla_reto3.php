<?php
include "seguridad.php";
$numero_equipo = $_SESSION['numero_equipo'];
$nombre_equipo = $_SESSION['nombre_equipo'];
$retos = $_SESSION['retos']; // Obtiene todos los retos guardados en la sesión
$reto_index = $_SESSION['reto_index']; // Obtiene el índice actual del reto

// Determina el reto actual y el siguiente
$reto_actual = $retos[$reto_index]; // Reto actual
$reto_siguiente = isset($retos[$reto_index + 1]) ? $retos[$reto_index + 1] : "No hay más retos"; // Reto siguiente, si existe
// Mensaje dinámico de verificación
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : '';
unset($_SESSION['mensaje']); // Limpia el mensaje después de mostrarlo

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
  <a href="salir.php">salir</a>
  <div>
    <h2>El numero de equipo es: <?php echo $numero_equipo?></h2>
    <h2>El nombre del equipo es: <?php echo htmlspecialchars($nombre_equipo);?></h2>
  </div>
  <div class="cont_reto_actual">
    <h2>Reto Actual: <?php echo htmlspecialchars($reto_actual); ?></h2>
  </div>
  <div class="cont_registro_equipo">
  <!-- Muestra el mensaje si existe -->
  <?php if ($mensaje): ?>
    <div class="mensaje_error">
      <p><?php echo htmlspecialchars($mensaje); ?></p>
    </div>
  <?php endif; ?>
    <form action="verificar_reto.php" method="post">
      <label for="">Reto:</label>
      <br>
      <input type="text" name="reto" >
      <br>
      <label for="">Bandera:</label>
      <br>
      <input type="text" name="bandera">
      <br>
      <!-- campo en hidden que es en donde se va a enviar el tiempo -->
      <input type="hidden" name="tiempo_envio" id="tiempo_envio">
      <label for="">Fecha:</label>
      <br>
      <div id="fechaHora"></div>
      <br><br>
      <button type="submit" name="siguiente" class="btn_inicio" onclick="capturarTiempo()">Procesar</button> <!--este button es el que va a llevar a la confirmacion de el reto y bandera osea si coinciden para revisar que se correcto de lo contrario mandara un mensaje de incorrecto el reto y la bandera no coinciden-->
    </form>
    <script>
   // Captura el tiempo en la zona horaria del Centro de México
   const ahora = new Date();
    
    // Formatear la fecha y hora en la zona horaria de México (Centro)
    const opciones = { 
        timeZone: 'America/Mexico_City', 
        year: 'numeric', 
        month: '2-digit', 
        day: '2-digit', 
        hour: '2-digit', 
        minute: '2-digit', 
        second: '2-digit',
        hour12: false
    };
    
    const formatoFecha = new Intl.DateTimeFormat('es-MX', opciones).formatToParts(ahora);

    // Crear una fecha con las partes formateadas
    const fechaISO = `${formatoFecha[4].value}-${formatoFecha[2].value}-${formatoFecha[0].value}T${formatoFecha[6].value}:${formatoFecha[8].value}:${formatoFecha[10].value}`;

    // Asignar el tiempo capturado en el campo hidden
    document.getElementById('tiempo_envio').value = fechaISO;
    </script>
  </div>
  <br><br><br><br>
  <div class="cont_reto_siguiente">
    <h2>Reto Siguiente: <?php echo htmlspecialchars($reto_siguiente); ?></h2>
  </div>
  <br><br>
  <script>
        function mostrarFechaHora() {
            // Obtener la fecha y hora actuales
            const ahora = new Date();

            // Obtener las partes de la fecha
            const dia = String(ahora.getDate()).padStart(2, '0');
            const mes = String(ahora.getMonth() + 1).padStart(2, '0'); // Los meses empiezan desde 0
            const anio = ahora.getFullYear();

            // Obtener las partes de la hora
            const horas = String(ahora.getHours()).padStart(2, '0');
            const minutos = String(ahora.getMinutes()).padStart(2, '0');
            const segundos = String(ahora.getSeconds()).padStart(2, '0');

            // Formatear la fecha y la hora
            const fechaFormateada = `${dia}/${mes}/${anio}`;
            const horaFormateada = `${horas}:${minutos}:${segundos}`;

            // Mostrar la fecha y la hora en la página
            document.getElementById('fechaHora').textContent = `Fecha: ${fechaFormateada} - Hora: ${horaFormateada}`;
        }

        // Llamar a la función para mostrar la fecha y hora al cargar la página
        mostrarFechaHora();

        // Actualizar la fecha y hora cada segundo
        setInterval(mostrarFechaHora, 1000);
    </script> 
</body>
</html>