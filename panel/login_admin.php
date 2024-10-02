<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
<h2 class="titulo">Bienvenido al panel administrativo</h2>
    <div class="cont_login">
        <form action="autentificar_admin.php" method="post" >
            <input type="text" name="usuario" required class="elemento_inp" placeholder="Usuario">
            <br>
            <input type="password" name= "contrasena"  class="elemento_inp" placeholder="Contraseña">
            <br><br>
            <button  class="btn_rojo">Iniciar sesión</button>
            <br>
        </form>
        <br>

    </div>
    <br><br><br>
</body>
</html>