<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glosario</title>
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

        th,  td {
            border: 1px solid sandybrown;
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #f8f9fa;
        }

        button {
            padding: 8px;
            margin-right: 5px;
        }

        form {
            margin-bottom: 20px;
        }

        textarea {
            resize: none;
        }

        .modal-dialog {
            max-width: 400px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="mt-4 mb-4">Glosario</h1>



        <form id="formulario-concepto" action="guardar_registro.php" method="post">

            <div class="form-group">
                <label for="concepto">Concepto:</label>
                <input type="text" class="form-control" id="concepto" name="concepto" required>
            </div>
            <div class="form-group">
                <label for="definicion">Definición:</label>
                <input type="text" class="form-control" id="definicion" name="definicion" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <button type="button" class="btn btn-secondary" onclick="limpiarFormulario()">Cancelar</button>
            <button type="button" class="btn btn-secondary" onclick="redireccionar()">Salir</button>
            <button type="button" class="btn btn-secondary" onclick="concep()">Ver Conceptos</button>

        </form>
    </div>

    <!-- Modal de confirmación de eliminación -->
    <div class="modal fade" id="eliminarConceptoModal" tabindex="-1" role="dialog"
        aria-labelledby="eliminarConceptoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarConceptoModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea eliminar este concepto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger"
                        onclick="eliminarConceptoConfirmado()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
          function concep() {
        // Redirecciona a la página login.php
        window.location.href = 'registros.php';
    }
        function redireccionar() {
        // Redirecciona a la página login.php
        window.location.href = 'index.html';
    }
        var conceptoSeleccionado;
// Obtiene los valores de los campos de entrada para el concepto y la definición
//verifica si ambos campos están completos y luego agrega una nueva fila a la tabla 
//con los valores ingresados. Finalmente, limpia el formulario.
        function agregarConcepto() {
            //variables q almacenan la informacion ingresada en los campos
            var concepto = document.getElementById('concepto').value;
            var definicion = document.getElementById('definicion').value;

            if (!concepto || !definicion) {
                alert("Por favor, complete ambos campos.");
                return;
            }
//crea la tabla pero solo la muestra si hay campos
            var table = document.getElementById('conceptos-lista');
            var newRow = table.insertRow(table.rows.length);

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
//llena la tabla con la informacion ingresada
            cell1.innerHTML = concepto;
            cell2.innerHTML = definicion;
            //muestra los botones editar y eliminar para cada campo
            cell3.innerHTML = '<button class="btn btn-sm btn-primary" onclick="editarConcepto(this)">Editar</button>' +
                '<button class="btn btn-sm btn-danger" onclick="confirmarEliminarConcepto(this)">Eliminar</button>';

            limpiarFormulario();
        }

        function limpiarFormulario() {
            document.getElementById('concepto').value = '';
            document.getElementById('definicion').value = '';
        }

        function editarConcepto(button) {
            //obtiene la informacio  del campo seleccionado 
            var row = button.parentNode.parentNode;
            var concepto = row.cells[0].innerHTML;
            var definicion = row.cells[1].innerHTML;
//almacena la nueva informacion a mostrar 
            document.getElementById('concepto').value = concepto;
            document.getElementById('definicion').value = definicion;

            conceptoSeleccionado = row;
//realiza la actualizzacion de la informacion 
            row.parentNode.removeChild(row);
        }
//funciones qe recargan la misma pagina sin mostrar el campo eliminado 
        function confirmarEliminarConcepto(button) {
            conceptoSeleccionado = button.parentNode.parentNode;
            $('#eliminarConceptoModal').modal('show');
        }

        function eliminarConceptoConfirmado() {
            conceptoSeleccionado.parentNode.removeChild(conceptoSeleccionado);
            $('#eliminarConceptoModal').modal('hide');
        }
    </script>

</body>

</html>
