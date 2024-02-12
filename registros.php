
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conceptos básicos de Ciberseguridad</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 20px;
            background-color: #FFB6C1;
            width: 740px;
            margin: 4% auto;
        }

        h1 {
            text-align: center;
            color: midnightblue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid sandybrown;
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Conceptos básicos de Ciberseguridad</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Concepto</th>
                    <th>Definición</th>
                </tr>
            </thead>
            <tbody>
                <?php
//EN ESTA PAGINA MUESTRA LOS CONCEPTOS GUARDADOS EN LA BDD


                // Conexión a la base de datos
                $conexion = mysqli_connect("localhost", "root", "", "glosario");

                // Verificar conexión
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }

                // Consulta SQL para seleccionar todos los registros de la tabla 'registros'
                $sql = "SELECT concepto, definicion FROM registros";
                $result = mysqli_query($conexion, $sql);

                // Mostrar los datos en la tabla
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['concepto'] . "</td>";
                    echo "<td>" . $row['definicion'] . "</td>";
                    echo "</tr>";
                }

                // Liberar el resultado
                mysqli_free_result($result);

                // Cerrar conexión
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-secondary" onclick="redireccionar()">Regresar</button>
    <script>
        function redireccionar() {
        // Redirecciona a la página login.php
        window.location.href = 'glosario.php';
    }
   </script>
</body>

</html>
