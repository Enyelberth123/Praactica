<?php require __DIR__ . '/../layouts/header.php'; ?>

<div class="container">
    <h2>Lista de Productos</h2>
    
    <div class="actions">
        <a href="/bruz-deportes/public/productos/crear" class="btn">Nuevo Producto</a>
        <a href="/bruz-deportes/public/productos" class="btn">Ver Todos</a>
    </div>

    <?php if (empty($productos)): ?>
        <p>No hay productos registrados.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Color</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id'] ?></td>
                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                    <td><?= ucfirst($producto['tipo']) ?></td>
                    <td>$<?= number_format($producto['precio'], 2) ?></td>
                    <td><?= htmlspecialchars($producto['color']) ?></td>
                    <td><?= $producto['stock'] ?></td>
                    <td>
                        <a href="/bruz-deportes/public/productos/mostrar/<?= $producto['id'] ?>" class="btn">Ver</a>
                        <a href="/bruz-deportes/public/productos/editar/<?= $producto['id'] ?>" class="btn">Editar</a>
                        <a href="/bruz-deportes/public/productos/eliminar/<?= $producto['id'] ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>