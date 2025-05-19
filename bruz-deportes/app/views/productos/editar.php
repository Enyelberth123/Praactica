<div class="container">
    <h2>Editar Producto</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
        
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
        </div>
        
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" required><?= htmlspecialchars($producto['descripcion']) ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" step="0.01" min="0" value="<?= $producto['precio'] ?>" required>
        </div>
        
        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" value="<?= htmlspecialchars($producto['color']) ?>">
        </div>
        
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" min="0" value="<?= $producto['stock'] ?>" required>
        </div>
        
        <!-- Campos específicos según el tipo -->
        <?php if ($producto['tipo'] === 'ropa'): ?>
            <div class="form-group">
                <label for="talla_ropa">Talla:</label>
                <select name="talla_ropa" id="talla_ropa">
                    <option value="XS" <?= $producto['talla'] === 'XS' ? 'selected' : '' ?>>XS</option>
                    <option value="S" <?= $producto['talla'] === 'S' ? 'selected' : '' ?>>S</option>
                    <option value="M" <?= $producto['talla'] === 'M' ? 'selected' : '' ?>>M</option>
                    <option value="L" <?= $producto['talla'] === 'L' ? 'selected' : '' ?>>L</option>
                    <option value="XL" <?= $producto['talla'] === 'XL' ? 'selected' : '' ?>>XL</option>
                    <option value="XXL" <?= $producto['talla'] === 'XXL' ? 'selected' : '' ?>>XXL</option>
                </select>
            </div>
            <div class="form-group">
                <label for="material_ropa">Material:</label>
                <input type="text" name="material_ropa" id="material_ropa" value="<?= htmlspecialchars($producto['material']) ?>">
            </div>
        <?php else: ?>
            <div class="form-group">
                <label for="talla_accesorio">Talla:</label>
                <input type="text" name="talla_accesorio" id="talla_accesorio" value="<?= htmlspecialchars($producto['talla']) ?>">
            </div>
            <div class="form-group">
                <label for="material_accesorio">Material:</label>
                <input type="text" name="material_accesorio" id="material_accesorio" value="<?= htmlspecialchars($producto['material']) ?>">
            </div>
        <?php endif; ?>
        
        <button type="submit" class="btn">Actualizar Producto</button>
        <a href="/bruz-deportes/public/productos" class="btn">Cancelar</a>
    </form>
</div>