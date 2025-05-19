<?php
namespace App\Models;

class Conexion {
    private static $conexion;
    
    private function __construct() {} // Privado para evitar instanciación
    
    public static function getConexion() {
        if (!self::$conexion) {
            try {
                self::$conexion = new \PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                    DB_USER,
                    DB_PASS
                );
                self::$conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec("SET NAMES 'utf8'");
            } catch (\PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$conexion;
    }
}