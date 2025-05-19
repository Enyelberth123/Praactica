<?php
namespace App\Models\Interfaces;

interface IProducto {
    public function calcularDescuento($porcentaje);
    public function mostrarDetalles();
}