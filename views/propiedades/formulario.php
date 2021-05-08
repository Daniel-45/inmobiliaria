<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Título</label>
    <input 
    type="text" 
    id="titulo" 
    name="propiedad[titulo]" 
    placeholder="Título Propiedad" 
    value="<?php echo sanitizar($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input 
    type="number" 
    id="precio" 
    name="propiedad[precio]" 
    placeholder="Precio Propiedad" 
    value="<?php echo sanitizar($propiedad->precio); ?>">

    <label for="imagen">Imágen</label>
    <input 
    type="file" 
    id="imagen" 
    name="propiedad[imagen]" 
    accept="image/jpeg, image/png">

    <?php if ($propiedad->imagen): ?>
        <img src="/uploads/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php endif; ?>

    <label for="descripcion">Descripción</label>
    <textarea 
    id="descripcion"
    name="propiedad[descripcion]" 
    rows="10"><?php echo sanitizar($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="dormitorios">Dormitorios</label>
    <input 
    type="number" 
    min="0" 
    id="dormitorios" 
    name="propiedad[dormitorios]" 
    placeholder="Ejemplo: 4" 
    value="<?php echo sanitizar($propiedad->dormitorios); ?>">

    <label for="wc">Baños</label>
    <input 
    type="number" 
    min="0" 
    id="wc" 
    name="propiedad[wc]" 
    placeholder="Ejemplo: 2" 
    value="<?php echo sanitizar($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamiento</label>
    <input 
    type="number" 
    min="0" id="estacionamiento" 
    name="propiedad[estacionamiento]" 
    placeholder="Ejemplo: 2" 
    value="<?php echo sanitizar($propiedad->estacionamiento); ?>">
</fieldset>

<fieldset>
    <legend>Vendedores</legend>
    <label for="vendedor">Vendedor</label>
    <select name="propiedad[id_vendedor]" id="vendedor">
        <option selected disabled value="">Selecciona un vendedor</option>
        <?php foreach ($vendedores as $vendedor ): ?>
            <option 
            <?php echo $propiedad->id_vendedor === $vendedor->id ? 'selected' : '' ?>
            value="<?php echo sanitizar($vendedor->id) ?>">
            <?php echo sanitizar($vendedor->nombre) . " " . sanitizar($vendedor->apellido) ?>
            </option>
        <?php endforeach ?>
    </select>
</fieldset>