<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="css/estilo_principal.css">
</head>
<body>
  <div class="cont_registro_equipo">
    <form action="guardar_equipo.php" method="post">
      <label for="">Numero de equipo</label>
      <br><br>
      <div id="numeroEquipo"></div>
      <input type="hidden" id="numeroEquipoInput" name="numeroEquipo">
      <br>
      <label for="">Nombre del equipo:</label>
      <br>
      <input type="text" name="nombre_equipo" >
      <br>
      <label for="">Contraseña:</label>
      <br>
      <input type="text" name="contrasena" >
      <br>
      <label for="">Participantes:</label>
      <br><br>
      <label for="">Nombre del participante 1</label>
      <input type="text" name="participante1">
      <br>
      <label for="">Nombre del participante 2</label>
      <input type="text" name="participante2">
      <br>
      <label for="">Nombre del participante 3</label>
      <input type="text" name="participante3">
      <br>
      <label for="">Nombre del participante 4</label>
      <input type="text" name="participante4">
      <br><br>
      <button class="btn_loggin2">Registrarse</button>
    </form>
  </div>
  <br>
  <a href="pantalla_inicio.php" class="btn_regresar_rojo"> >>Regresar </a>
  <br><br><br>  
  <script>
        // Función para generar el número secuencial de 3 dígitos
        function generarNumeroEquipo() {
            // Obtener el número actual del almacenamiento local
            let numeroActual = localStorage.getItem('numeroEquipo');

            // Si no existe un número actual, inicializar en 1
            if (!numeroActual) {
                numeroActual = 1;
            } else {
                // Incrementar el número actual
                numeroActual = parseInt(numeroActual) + 1;

                // Si el número es mayor que 999, reiniciarlo a 1
                if (numeroActual > 999) {
                    numeroActual = 1;
                }
            }

            // Convertir el número a una cadena con formato de 3 dígitos
            const numeroFormateado = String(numeroActual).padStart(3, '0');

            // Guardar el nuevo número en el almacenamiento local
            localStorage.setItem('numeroEquipo', numeroActual);

            // Mostrar el número de equipo en la página
            document.getElementById('numeroEquipo').textContent = `Número de Equipo Asignado: ${numeroFormateado}`;

            // Asignar el número de equipo al campo oculto del formulario
            document.getElementById('numeroEquipoInput').value = numeroFormateado;
        }

        // Ejecutar la función al cargar la página
        window.onload = generarNumeroEquipo;
    </script>
</body>
</html>