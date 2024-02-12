
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registro de usuario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body background="bgr.png">

<div class="container">

  <?php
session_start();
?>

<?php

include 'conexion.php';

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM $tbl_name WHERE usuario = '$username'";


$result = $conexion->query($sql);


if ($result->num_rows > 0) {     }

  $row = $result->fetch_array(MYSQLI_ASSOC);
 // if (password_verify($password, $row['password'])) { 
  if ($password==$row['password']) { 

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (6 * 60);

    echo "<br><br><a href=glosario.php>Iniciar sesion</a>"; 
    header('Location: glosario.php');//redirecciona a la pagina del usuario

} else { 
    echo "Username o Password estan incorrectos.";
    echo "<br><button type=\"button\" class=\"btn btn-success text-white\" name=\"operar\"><a style=\"text-decoration:none; color:white;\" href='regiatrar.html'>Volver a Intentarlo</a></button>";
  }
mysqli_close($conexion); 
?>
  
</div>

</body>
</html>