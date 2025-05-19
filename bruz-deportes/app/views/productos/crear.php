<div class="container">
    <h2>Crear Nuevo Producto</h2>

    <form method="post">
        <!-- Todos tus campos de formulario aquí -->
        <div class="form-group">
            <label for="tipo">Tipo de Producto:</label>
            <select name="tipo" id="tipo" required>
                <option value="">Seleccione...</option>
                <option value="ropa">Ropa</option>
                <option value="accesorio">Accesorio</option>
            </select>
        </div>
        
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion"></textarea>
        </div>
        
        <div>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" step="0.01" min="0" required>
        </div>
        
        <div>
            <label for="color">Color:</label>
            <input type="text" name="color" id="color">
        </div>
        
        <div>
            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" min="0" required>
        </div>
        
        <!-- Campos específicos para Ropa -->
        <div id="ropa-fields" style="display: none;">
            <h3>Detalles de Ropa</h3>
            <div>
                <label for="talla_ropa">Talla:</label>
                <select name="talla_ropa" id="talla_ropa">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>
            <div>
                <label for="material_ropa">Material:</label>
                <input type="text" name="material_ropa" id="material_ropa">
            </div>
        </div>
        
        <!-- Campos específicos para Accesorio -->
        <div id="accesorio-fields" style="display: none;">
            <h3>Detalles de Accesorio</h3>
            <div>
                <label for="talla_accesorio">Talla:</label>
                <input type="text" name="talla_accesorio" id="talla_accesorio">
            </div>
            <div>
                <label for="material_accesorio">Material:</label>
                <input type="text" name="material_accesorio" id="material_accesorio">
            </div>
        </div>
        
        <button type="submit" class="btn">Guardar Producto</button>
    </form>
</div>
<script>
document.getElementById('tipo').addEventListener('change', function() {
    const tipo = this.value;
    document.getElementById('ropa-fields').style.display = tipo === 'ropa' ? 'block' : 'none';
    document.getElementById('accesorio-fields').style.display = tipo === 'accesorio' ? 'block' : 'none';
});
</script>
