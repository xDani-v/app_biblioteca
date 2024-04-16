<?php

include_once  dirname(__DIR__) .  '/config/coneccion.php';
include_once  dirname(__DIR__) .  '/models/cliente.php';
include_once dirname(__DIR__) .  '/controllers/cliente_controllador.php';

$clientes = read($dbconn);

if (isset($_GET['id'])) {
    $cliente = readid($dbconn, $_GET['id']);
    $action = '../routes/update.php';
} else {
    $cliente = new Cliente(null, "", "", "", "");
    $action = '../routes/create.php';
}
?>

<body>
    <!-- Diálogo -->
    <dialog id="myDialog">
        <article>
            <h2>Datos del cliente</h2>
            <form id="form" action="<?php echo $action; ?>" method="post">

                <input type="hidden" id="id" name="id" value="<?php echo $cliente->id; ?>">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" value="<?php echo $cliente->nombre; ?>"><br>
                <label for="direccion">Dirección:</label><br>
                <input type="text" id="direccion" name="direccion" value="<?php echo $cliente->direccion; ?>"><br>
                <label for="telefono">Telefono:</label><br>
                <input type="text" id="telefono" name="telefono" value="<?php echo $cliente->telefono; ?>"><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?php echo $cliente->email; ?>"><br>
                <footer>

                    <input type="submit" value="Enviar">
                    <input id="cancelButton" type="button" value="Cancelar" class="secondary">
                </footer>
            </form>
        </article>
    </dialog>
    <div class="left-align">
        <button id="openDialog">Agrear nuevo cliente</button>
    </div>

    <div>
        <h1>Lista de clientes</h1>
    </div>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Telefono</th>
                <th>email</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($clientes as $cliente) { ?>
                <tr>
                    <td><?php echo $cliente['id']; ?></td>
                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['direccion']; ?></td>
                    <td><?php echo $cliente['telefono']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td>
                        <a href="/clientes" class="modifyButton" data-id="<?php echo $cliente['id']; ?>" data-nombre="<?php echo $cliente['nombre']; ?>" data-direccion="<?php echo $cliente['direccion']; ?>" data-telefono="<?php echo $cliente['telefono']; ?>" data-email="<?php echo $cliente['email']; ?>">
                            <button>Modificar</button>
                        </a>
                        <!-- Botón para eliminar -->
                        <form action="/routes/delete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <script>
        window.onload = function() {
            // Obtén el diálogo y los campos del formulario
            var form = document.getElementById('form');
            var dialog = document.getElementById('myDialog');
            var idField = document.getElementById('id');
            var nombreField = document.getElementById('nombre');
            var direccionField = document.getElementById('direccion');
            var telefonoField = document.getElementById('telefono');
            var emailField = document.getElementById('email');

            // Función para abrir el diálogo con los datos de un cliente
            function openDialog(cliente) {
                idField.value = cliente.id;
                nombreField.value = cliente.nombre;
                direccionField.value = cliente.direccion;
                telefonoField.value = cliente.telefono;
                emailField.value = cliente.email;
                form.action = '../routes/update.php';
                dialog.showModal();
            }
            // Función para cerrar el diálogo
            function closeDialog() {
                dialog.close();
            }

            // Agrega un evento click a cada botón de modificar
            var modifyButtons = document.getElementsByClassName('modifyButton');
            for (var i = 0; i < modifyButtons.length; i++) {
                modifyButtons[i].addEventListener('click', function(event) {
                    event.preventDefault();
                    var cliente = {
                        id: this.dataset.id,
                        nombre: this.dataset.nombre,
                        direccion: this.dataset.direccion,
                        telefono: this.dataset.telefono,
                        email: this.dataset.email
                    };
                    openDialog(cliente);
                });
            }

            // Agrega un evento click al botón de cancelar
            document.getElementById('cancelButton').addEventListener('click', closeDialog);

            // Función para abrir el diálogo con los campos vacíos
            function openNewDialog() {
                idField.value = '';
                nombreField.value = '';
                direccionField.value = '';
                telefonoField.value = '';
                emailField.value = '';
                form.action = '../routes/create.php';
                dialog.showModal();
            }

            // Agrega un evento click al botón de agregar nuevo cliente
            document.getElementById('openDialog').addEventListener('click', openNewDialog);
        }
    </script>
</body>


<style>
    div {

        justify-content: center;
        align-items: center;
        display: flex;
    }

    div.left-align {
        justify-content: flex-start;
        padding-left: 500px;
    }

    table {
        width: 500px;
    }
</style>