<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
</head>

<body>
    <div>
        <nav>
            <ul>
                <li><strong><a href="/">Inicio</a></strong></li>
                <li><strong><a href="/cliente">Cliente</a></strong></li>
                <li><strong><a href="/cliente">Medidor</a></strong></li>
                <li><strong><a href="/cliente">Factura</a></strong></li>
                <!-- TODO: agregar más enlaces aquí -->
            </ul>
        </nav>
        <!-- El contenido de la vista se insertará aquí -->
    </div>
</body>

</html>
<style>
    div {
        display: flex;
        justify-content: center;
        align-items: center;

    }

    nav {
        color: white;
        padding: 20px;
    }

    a {
        display: inline;
        margin-right: 20px;
        color: white;
        font-style: inherit;
    }
</style>
<?php
// Obtén la ruta desde la URL
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Ruteo
switch ($request_uri[0]) {
        // Ruta de la página de inicio
    case '/':
        require 'views/home.php';
        break;
        // Ruta de la página about
    case '/cliente':
        require 'views/cliente_view.php';
        break;
        // TODO: agregar más rutas aquí
    default:
        header('HTTP/1.0 404 Not Found');
        require 'views/404.php';
        break;
}

?>