
//EJEMPLOOOOOOO DE PRUEBA
<?php
//PRUEBAAAA
// Conexión a la base de datos
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$database = "nombre_basedatos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos
$sql = "SELECT concepto, definicion FROM tabla_conceptos";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Conceptos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Glosario</h2>

    <table>
        <tr>
            <th>Concepto</th>
            <th>Definición</th>
            <th>Acciones</th>
        </tr>
        <?php
        // Iterar sobre los resultados y mostrar cada fila en la tabla
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["concepto"] . "</td>";
                echo "<td>" . $row["definicion"] . "</td>";
                echo "<td>Acciones</td>"; // Aquí puedes agregar botones de acciones si lo necesitas
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No se encontraron conceptos</td></tr>";
        }
        ?>
    </table>

</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>