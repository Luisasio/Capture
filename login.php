<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/estilo_principal.css">
</head>
<body>
<div class="log_1">
        <form action="autentificar.php" method="post">
            <label for="">Ingrese el numero del equipo Max. 3 digitos&#40Solo valores enteros&#41</label>
            <br>
            <input type="text" name="numero_equipo" id="numero" class="elemento_inp"pattern="\d{3}" maxlength="3" >
            <br>
            <label for="">Contraseña</label>
            <br>
            <input type="password" name="contrasena" class="elemento_inp">
            <br><br>
            <button class="btn_loggin2">Jugar</button>
        </form>
    </div>
</body>
</html>