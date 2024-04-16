<?php
include_once dirname(__DIR__) . '/config/coneccion.php';
include_once dirname(__DIR__) . '/controllers/cliente_controllador.php';
include_once dirname(__DIR__) . '/models/cliente.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];

    $cliente = new Cliente($id, $nombre, $direccion, $telefono, $email);
    update($dbconn, $cliente);
    header('Location: /cliente');
}
