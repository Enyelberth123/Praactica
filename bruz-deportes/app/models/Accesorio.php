<?php
namespace App\Models;

class Accesorio extends Producto {
    private $tallaAccesorio;
    private $materialAccesorio;
    
    public function __construct($nombre, $descripcion, $precio, $color, $stock, $tallaAccesorio, $materialAccesorio) {
        parent::__construct($nombre, 'accesorio', $descripcion, $precio, $color, $stock);
        $this->tallaAccesorio = $tallaAccesorio;
        $this->materialAccesorio = $materialAccesorio;
    }
    
    // Implementación de métodos abstractos
    public function getTalla() {
        return $this->tallaAccesorio;
    }
    
    public function getMaterial() {
        return $this->materialAccesorio;
    }
    
    // Polimorfismo: sobrescritura del método mostrarDetalles
    public function mostrarDetalles() {
        return parent::mostrarDetalles() . ", Talla: {$this->tallaAccesorio}, Material: {$this->materialAccesorio}";
    }
}