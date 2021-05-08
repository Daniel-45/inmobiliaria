<main class="contenedor seccion contenido-centrado">
    <h1 class="titulo-propiedad"><?php echo $propiedad->titulo ?></h1>

    <img src="uploads/<?php echo $propiedad->imagen ?>" alt="anuncio" loading="lazy">

    <div class="resumen-propiedad">
        <p class="precio"><?php echo $propiedad->precio ?>€</p>

        <ul class="iconos-caracteristicas">
            <li>
                <img class="icono" src="build/images/icono-wc.svg" alt="icono wc" loading="lazy">
                <p><?php echo $propiedad->wc ?></p>
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

        <p class="texto-anuncio">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi sequi ipsam aperiam illum odit et,
            quae nesciunt magnam, suscipit alias hic cum culpa nam, inventore itaque dolorum ad velit veritatis. Id
            pariatur ipsam quod maiores eum molestiae non ratione officia consequuntur. Velit molestias dignissimos
            porro animi libero temporibus culpa adipisci earum mollitia dicta illum exercitationem accusamus aperiam
            modi! Nesciunt, id praesentium ducimus dolores tempora distinctio earum iure aliquid, modi accusamus
            tempore cumque nobis.
        </p>

        <p class="texto-anuncio">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptates et incidunt, temporibus
            facere quia? Nemo recusandae asperiores, officiis veritatis fugit modi, accusantium ex alias
            perspiciatis fuga distinctio est illum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore
            eius tenetur quis libero ipsam nesciunt obcaecati sequi officiis? Doloribus, dolor Facilis, officia
            atque tenetur neque quis similique repudiandae tempore illo!
        </p>
    </div>
</main>