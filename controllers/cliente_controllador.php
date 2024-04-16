<?php
include_once dirname(__DIR__) . '/config/coneccion.php';
include_once dirname(__DIR__) . '/models/cliente.php';

function create($dbconn, $cliente)
{
    $query = "INSERT INTO public.clientes (nombre, direccion, telefono, email) VALUES ('$cliente->nombre', '$cliente->direccion', '$cliente->telefono', '$cliente->email')";
    return pg_query($dbconn, $query);
}

function read($dbconn)
{
    $query = "SELECT * FROM public.clientes ORDER BY id";
    $result = pg_query($dbconn, $query);
    return pg_fetch_all($result);
}
function readid($dbconn, $id)
{
    $query = "SELECT * FROM public.clientes WHERE id = $id";
    $result = pg_query($dbconn, $query);
    $row = pg_fetch_assoc($result);

    return new Cliente($row['id'], $row['nombre'], $row['direccion'], $row['telefono'], $row['email']);
}

// Actualizar
function update($dbconn, $cliente)
{
    $query = "UPDATE public.clientes SET nombre = '$cliente->nombre', direccion = '$cliente->direccion', telefono = '$cliente->telefono', email='$cliente->email' WHERE id = '$cliente->id'";
    return pg_query($dbconn, $query);
}

// Eliminar
function delete($dbconn, $id)
{
    $query = "DELETE FROM public.clientes WHERE id = $id";
    $result = pg_query($dbconn, $query);
    if (!$result) {
        echo "Error en la operación de eliminación: " . pg_last_error($dbconn);
    }
    return $result;
}
