<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';

use App\Controllers\ProductoController;

$controller = new ProductoController();

// Obtener la ruta limpia
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$script_name = $_SERVER['SCRIPT_NAME'];

// Eliminar el base path de la URI
$base_path = dirname($script_name);
$path = trim(str_replace($base_path, '', $request_uri), '/');

// Sistema de enrutamiento mejorado
switch ($path) {
    case '':
        echo "Bienvenido a Bruz-Deportes";
        break;
    case 'productos':
        $controller->index();
        break;
    case 'productos/crear':
        $controller->crear();
        break;
    default:
        // Manejar rutas con parámetros
        if (preg_match('/^productos\/editar\/(\d+)$/', $path, $matches)) {
            $controller->editar($matches[1]);
        } elseif (preg_match('/^productos\/eliminar\/(\d+)$/', $path, $matches)) {
            $controller->eliminar($matches[1]);
        } elseif (preg_match('/^productos\/mostrar\/(\d+)$/', $path, $matches)) {
            $controller->mostrar($matches[1]);
        } else {
            http_response_code(404);
            echo "Página no encontrada";
        }
        break;
}