<?php
//CONEXION A BDD DE USUARIO Y CONTRSEÑA  Y VALIDA LOS CAMPOS PARA ACCEDER 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "glosario";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["usuario"];
    $password = $_POST["pass"];

    // Insertar usuario y contraseña en la tabla 'alumnos'
    $sql = "INSERT INTO alumnos (usuario, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso para el usuario: " . $username;
        echo "<br><br><a href=index.html>Panel de Control</a>";
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
        echo "<br><br><a href=registrar.php>Panel de Control</a>";
    }
}

$conn->close();
?>
