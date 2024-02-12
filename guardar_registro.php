<?php
// Verifica si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si los campos concepto y definicion están definidos
    if (isset($_POST["concepto"]) && isset($_POST["definicion"])) {
        // Recupera los datos del formulario
        $concepto = $_POST["concepto"];
        $definicion = $_POST["definicion"];

        // Conecta a la base de datos (reemplaza los valores con tus propios datos de conexión)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "glosario";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica si la conexión fue exitosa
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Prepara la consulta SQL para insertar los datos en la tabla registros
        $sql = "INSERT INTO registros (concepto, definicion) VALUES ('$concepto', '$definicion')";

        // Ejecuta la consulta SQL
        if ($conn->query($sql) === TRUE) {
            echo "Registro insertado correctamente";
            echo "<br><br><a href=glosario.php>Insertar otro Concepto</a>";
        } else {
            echo "Error al insertar registro: " . $conn->error;
        }

        // Cierra la conexión a la base de datos
        $conn->close();
    } else {
        echo "Por favor, complete todos los campos del formulario.";
    }
}
?>
