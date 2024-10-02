<?php 
  require "conexion.php";



  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];


  //echo $nombreusuario. "<br>";
  //echo $contrasena;



  $comparar = "SELECT * FROM admins WHERE usuario = '$usuario' AND contrasena ='$contrasena'";

  $resultado = mysqli_query($conectar, $comparar);


  if (mysqli_num_rows($resultado)>0){
    session_start();
    $_SESSION["autentificado"] = "SI";
    header("Location:principal.php");
  }else{
    echo '
    <script>
      alert("NO ESTAS REGISTRADO");
      location.href = "login_admin.php";
    </script>
    ';
  }
  /* cambiar al de arriba si esta mal lo que pense 
  <script>
  alert("NO ESTAS REGISTRADO POR FAVOR REGISTRATE");
  location.href = "pagina_alta_usuarios.php";
  </script>*/









?>