<main class="contenedor seccion">
    <h1>Administrador de Bienes Raíces</h1>
    <?php
        if ($resultado) {
            $alerta = mostrarAlerta(intval($resultado));
            if ($alerta) {?>
                <p class="alerta exito"><?php echo sanitizar($alerta) ?></p>
            <?php }
        }
    ?>

    <a href="/propiedades/crear" class="boton-verde">Nueva Propiedad</a>
    <a href="/vendedores/crear" class="boton-verde">Nuevo Vendedor</a>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th class="acciones">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Mostrar los resultados -->
            <?php foreach ($propiedades as $propiedad): ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td>
                    <img src="/uploads/<?php echo $propiedad->imagen; ?>" alt="imagen propiedad" class="imagen-tabla">
                </td>
                <td><?php echo $propiedad->precio; ?>€</td>
                <td>
                    <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-verde-block">
                        Actualizar
                    </a>

                    <form method="POST" class="w-100" action="/propiedades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="input-boton-rojo" value="Eliminar">
                    </form>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>nombre</th>
                <th>telefono</th>
                <th class="acciones">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <!-- Mostrar los resultados -->
            <?php foreach ($vendedores as $vendedor) : ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-verde-block">
                        Actualizar
                    </a>

                    <form method="POST" class="w-100" action="/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="input-boton-rojo" value="Eliminar">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
     </table>
</main>