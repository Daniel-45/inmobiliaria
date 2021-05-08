<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) { ?>
        <div class="anuncio">
            <img src="/uploads/<?php echo $propiedad->imagen ?>" alt="anuncio" loading="lazy">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo ?></h3>
                <p><?php echo $propiedad->descripcion ?></p>
                <p class="precio"><?php echo $propiedad->precio ?>€</p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/images/icono-wc.svg" alt="icono wc" loading="lazy">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>

                    <li>
                        <img class="icono" src="build/images/icono-estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                        <p><?php echo $propiedad->estacionamiento ?></p>
                    </li>

                    <li>
                        <img class="icono" src="build/images/icono-dormitorio.svg" alt="icono dormitorio" loading="lazy">
                        <p><?php echo $propiedad->dormitorios ?></p>
                    </li>
                </ul>

                <a href="/propiedad?id=<?php echo $propiedad->id ?>" class="boton-naranja-block">
                    Ver Propiedad
                </a>
            </div> <!-- .contenido-anuncio -->
        </div> <!-- .anuncio -->
    <?php } ?>
</div> <!-- .contenedor-anuncios -->