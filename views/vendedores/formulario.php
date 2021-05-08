<fieldset>
    <legend>Información</legend>

    <label for="titulo">Nombre</label>
    <input 
    type="text" 
    id="nombre" 
    name="vendedor[nombre]" 
    placeholder="Nombre" 
    value="<?php echo sanitizar($vendedor->nombre); ?>">

    <label for="titulo">Apellido</label>
    <input 
    type="text" 
    id="apellido" 
    name="vendedor[apellido]" 
    placeholder="Apellido" 
    value="<?php echo sanitizar($vendedor->apellido); ?>">

    <label for="titulo">Teléfono</label>
    <input 
    type="text" 
    id="telefono" 
    name="vendedor[telefono]" 
    placeholder="Teléfono" 
    value="<?php echo sanitizar($vendedor->telefono); ?>">
</fieldset>