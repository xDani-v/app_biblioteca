<?php
include_once dirname(__DIR__) . '/config/coneccion.php';
include_once dirname(__DIR__) . '/controllers/cliente_controllador.php';
include_once dirname(__DIR__) . '/models/cliente.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $cliente = new Cliente($id, null, null, null, null);
    $result = delete($dbconn, $cliente->id); // Modifica esta línea
    echo json_encode($cliente); // Modifica esta línea
    if ($result) {
        header('Location: /cliente');
    } else {
        echo "Error al eliminar el cliente";
    }
}
