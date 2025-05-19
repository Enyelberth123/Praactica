<?php
namespace App\Core;

class View
{
    public static function render($viewPath, $data = [])
    {
        // Extraer variables para que estén disponibles en la vista
        extract($data);
        
        // Construir rutas absolutas
        $viewsDir = __DIR__ . '/../../app/views/';
        $viewFile = $viewsDir . $viewPath . '.php';
        $headerFile = $viewsDir . 'layouts/header.php';
        $footerFile = $viewsDir . 'layouts/footer.php';
        
        // Verificar existencia de archivos
        if (!file_exists($headerFile)) {
            throw new \Exception("Archivo header no encontrado: {$headerFile}");
        }
        
        if (!file_exists($viewFile)) {
            throw new \Exception("Vista no encontrada: {$viewFile}");
        }
        
        if (!file_exists($footerFile)) {
            throw new \Exception("Archivo footer no encontrado: {$footerFile}");
        }
        
        // Cargar los archivos
        require $headerFile;
        require $viewFile;
        require $footerFile;
    }
}