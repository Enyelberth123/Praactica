<?php
namespace App\Models;

class Ropa extends Producto {
    private $tallaRopa;
    private $materialRopa;
    
    public function __construct($nombre, $descripcion, $precio, $color, $stock, $tallaRopa, $materialRopa) {
        parent::__construct($nombre, 'ropa', $descripcion, $precio, $color, $stock);
        $this->tallaRopa = $tallaRopa;
        $this->materialRopa = $materialRopa;
    }
    
    // Implementación de métodos abstractos
    public function getTalla() {
        return $this->tallaRopa;
    }
    
    public function getMaterial() {
        return $this->materialRopa;
    }
    
    // Polimorfismo: sobrescritura del método mostrarDetalles
    public function mostrarDetalles() {
        return parent::mostrarDetalles() . ", Talla: {$this->tallaRopa}, Material: {$this->materialRopa}";
    }
}