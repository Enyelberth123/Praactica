<?php
namespace App\Models;

use App\Models\Interfaces\IProducto;
use App\Models\Conexion;

abstract class Producto implements IProducto {
    protected $id;
    protected $nombre;
    protected $tipo;
    protected $descripcion;
    protected $precio;
    protected $color;
    protected $stock;
    
    // Métodos abstractos que deben ser implementados por las clases hijas
    abstract public function getTalla();
    abstract public function getMaterial();
    
    // Constructor
    public function __construct($nombre, $tipo, $descripcion, $precio, $color, $stock) {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->color = $color;
        $this->stock = $stock;
    }
    
    // Getters y Setters (encapsulamiento)
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    // ... otros getters y setters para cada propiedad
    
    // Implementación de la interfaz
    public function calcularDescuento($porcentaje) {
        return $this->precio * (1 - ($porcentaje / 100));
    }
    
    public function mostrarDetalles() {
        return "Producto: {$this->nombre}, Precio: {$this->precio}, Color: {$this->color}";
    }
    
    // Métodos CRUD
    public static function obtenerTodos() {
        $db = Conexion::getConexion();
        $query = "SELECT * FROM productos";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function guardar() {
        $db = Conexion::getConexion();
        
        if ($this->id) {
            // Actualizar
            $query = "UPDATE productos SET nombre=?, tipo=?, descripcion=?, precio=?, color=?, talla=?, material=?, stock=? WHERE id=?";
            $stmt = $db->prepare($query);
            $stmt->execute([
                $this->nombre,
                $this->tipo,
                $this->descripcion,
                $this->precio,
                $this->color,
                $this->getTalla(),
                $this->getMaterial(),
                $this->stock,
                $this->id
            ]);
        } else {
            // Crear
            $query = "INSERT INTO productos (nombre, tipo, descripcion, precio, color, talla, material, stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([
                $this->nombre,
                $this->tipo,
                $this->descripcion,
                $this->precio,
                $this->color,
                $this->getTalla(),
                $this->getMaterial(),
                $this->stock
            ]);
            $this->id = $db->lastInsertId();
        }
    }
    
    public static function obtenerPorId($id) {
        $db = Conexion::getConexion();
        $query = "SELECT * FROM productos WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
    public static function eliminar($id) {
        $db = Conexion::getConexion();
        $query = "DELETE FROM productos WHERE id = ?";
        $stmt = $db->prepare($query);
        return $stmt->execute([$id]);
    }
}