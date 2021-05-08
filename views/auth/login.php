<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach ?>

    <form action="/login" method="POST" class="formulario">
        <fieldset>
            <legend>Login</legend>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="name@example.com">

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Tu contraseña">
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="input-boton-naranja">
    </form>
</main>