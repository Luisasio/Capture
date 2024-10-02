<?php
require "conexion.php";
session_start();

$reto_index = $_SESSION['reto_index'];
$retos = $_SESSION['retos'];
$reto_actual = $retos[$reto_index]; // Obtiene el reto actual

$reto = $_POST['reto'];
$bandera = $_POST['bandera'];
$tiempo_envio = $_POST['tiempo_envio'];
$numero_equipo = $_SESSION['numero_equipo'];

// Consulta solo para validar el reto actual
$comparar_campos = "SELECT * FROM retos WHERE reto = '$reto' AND bandera = '$bandera' AND reto = '$reto_actual'";
$resultado = mysqli_query($conectar, $comparar_campos);

if (mysqli_num_rows($resultado) > 0) {
    // Inserta el tiempo en la tabla de tiempos
    $insertar_tiempo = "INSERT INTO tiempo (tiempo_fin, numero_equipo, reto) VALUES (?, ?, ?)";
    $stmt = $conectar->prepare($insertar_tiempo);
    $stmt->bind_param("sss", $tiempo_envio, $numero_equipo, $reto_actual);
    $stmt->execute();

    // Incrementa el índice del reto solo si hay más retos
    $_SESSION['reto_index'] += 1;

    // Verifica si el equipo ha completado todos los retos
    if ($_SESSION['reto_index'] >= count($retos)) {
        // Si ha completado el último reto, redirige a la página de resultados
        header("Location: pantalla_resultados.php");
        exit();
    } else {
        // Si no ha completado todos los retos, redirige a la siguiente pantalla de reto
        header("Location: pantalla_reto" . ($_SESSION['reto_index'] + 1) . ".php");
        exit();
    }
} else {
    // Si la respuesta es incorrecta, vuelve a la misma pantalla con un mensaje
    $_SESSION['mensaje'] = "Respuestas incorrectas"; // Almacena el mensaje
    header("Location: pantalla_reto" . ($_SESSION['reto_index'] + 1) . ".php");
    exit();
}
?>
