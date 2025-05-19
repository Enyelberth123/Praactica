<?php
namespace App\Controllers;

use App\Models\Producto;
use App\Models\Ropa;
use App\Models\Accesorio;
use App\Core\View;  // Usando el autoloader de Composer

class ProductoController
{
    public function index()
    {
        $productos = Producto::obtenerTodos();
        View::render('productos/index', ['productos' => $productos]);
    }
    
    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['tipo'];
            
            if ($tipo === 'ropa') {
                $producto = new Ropa(
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['precio'],
                    $_POST['color'],
                    $_POST['stock'],
                    $_POST['talla_ropa'],
                    $_POST['material_ropa']
                );
            } else {
                $producto = new Accesorio(
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['precio'],
                    $_POST['color'],
                    $_POST['stock'],
                    $_POST['talla_accesorio'],
                    $_POST['material_accesorio']
                );
            }
            
            $producto->guardar();
            header('Location: /bruz-deportes/public/productos');
            exit;
        }
        
        // Renderizar vista sin requires manuales
        View::render('productos/crear');
    }
    
    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoData = Producto::obtenerPorId($id);
            
            if ($productoData['tipo'] === 'ropa') {
                $producto = new Ropa(
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['precio'],
                    $_POST['color'],
                    $_POST['stock'],
                    $_POST['talla_ropa'],
                    $_POST['material_ropa']
                );
            } else {
                $producto = new Accesorio(
                    $_POST['nombre'],
                    $_POST['descripcion'],
                    $_POST['precio'],
                    $_POST['color'],
                    $_POST['stock'],
                    $_POST['talla_accesorio'],
                    $_POST['material_accesorio']
                );
            }
            
            $producto->guardar();
            header('Location: /bruz-deportes/public/productos');
            exit;
        }
        
        $producto = Producto::obtenerPorId($id);
        View::render('productos/editar', ['producto' => $producto]);
    }
    
    public function mostrar($id) {
        $producto = Producto::obtenerPorId($id);
        if (!$producto) {
            header('HTTP/1.0 404 Not Found');
            echo "Producto no encontrado";
            return;
        }
        View::render('productos/mostrar', ['producto' => $producto]);
    }

    public function eliminar($id) {
        Producto::eliminar($id);
        header('Location: /bruz-deportes/public/productos');
        exit;
    }
}