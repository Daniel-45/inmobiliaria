<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if ($mensaje) { ?>
        <p class="alerta exito"><?php echo $mensaje ?></p>;
    <?php } ?>

    <picture>
        <source src="build/images/destacada.webp" type="image/webp">
        <source src="build/images/destacada.jpg" type="image/jpeg">
        <img src="build/images//destacada.jpg" alt="imagen contacto">
    </picture>

    <h2>Formulario de contacto</h2>

    <form action="/contacto" method="POST" class="formulario">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="contacto[nombre]" placeholder="Tu nombre" required>

            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="contacto[mensaje]" rows="10" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>
            <label for="opciones">Venta o compra</label>
            <select id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="venta">Venta</option>
                <option value="compra">Compra</option>
            </select>

            <label for="presupuesto">Precio o presupuesto</label>
            <input type="number" id="presupuesto" name="contacto[precio]" min="0" placeholder="Precio o Presupuesto" required>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>¿Cómo nos ponemos en contacto con usted?</p>

            <div class="formulario-contacto">
                <label for="contacto-telefono">Teléfono</label>
                <input type="radio" name="contacto[contacto]" value="telefono" id="contacto-telefono" required>

                <label for="contacto-email">E-Mail</label>
                <input type="radio" name="contacto[contacto]" value="email" id="contacto-email" required>
            </div>
            <br>
            <div id="contacto"></div>
        </fieldset>

        <input type="submit" value="Enviar" class="input-boton-naranja">
    </form>
</main>