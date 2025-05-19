<div class="container">
    <h2>Detalles del Producto</h2>
    
    <div class="product-details">
        <h3><?= htmlspecialchars($producto['nombre']) ?></h3>
        <p><strong>Tipo:</strong> <?= ucfirst($producto['tipo']) ?></p>
        <p><strong>Descripción:</strong> <?= htmlspecialchars($producto['descripcion']) ?></p>
        <p><strong>Precio:</strong> $<?= number_format($producto['precio'], 2) ?></p>
        <p><strong>Color:</strong> <?= htmlspecialchars($producto['color']) ?></p>
        <p><strong>Talla:</strong> <?= htmlspecialchars($producto['talla']) ?></p>
        <p><strong>Material:</strong> <?= htmlspecialchars($producto['material']) ?></p>
        <p><strong>Stock:</strong> <?= $producto['stock'] ?></p>
        
        <div class="actions">
            <a href="/bruz-deportes/public/productos" class="btn">Volver</a>
            <a href="/bruz-deportes/public/productos/editar/<?= $producto['id'] ?>" class="btn">Editar</a>
            <a href="/bruz-deportes/public/productos/eliminar/<?= $producto['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
        </div>
    </div>
</div>