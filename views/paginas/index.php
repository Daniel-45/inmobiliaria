<main class="contenedor seccion">
    <h2>Más Sobre Nosotros</h2>

    <?php include 'iconos.php' ?>
</main>

<section class="contenedor seccion">
    <h2>Casas en Venta</h2>

    <?php
    include 'anuncios.php'
    ?>

    <div class="alinear-centro ver-todas">
        <a href="/propiedades" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo</p>
    <a href="contacto" class="boton-naranja">Contacto</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/images/blog1.webp" type="image/webp">
                    <source srcset="build/images/blog1.jpg" type="image/jpeg">
                    <img src="build/images/blog1.jpg" alt="texto entrada blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada1">
                    <h4>Terraza en el techo de tu casa</h4>
                </a>
                <p class="informacion-fecha-autor">
                    Fecha: <span>10/04/2021</span> Autor: <span>Admin</span>
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, sapiente perferendis impedit
                    dolore
                </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/images/blog2.webp" type="image/webp">
                    <source srcset="build/images/blog2.jpg" type="image/jpeg">
                    <img src="build/images/blog2.jpg" alt="texto entrada blog" loading="lazy">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada2">
                    <h4>Construye una piscina en tu hogar</h4>
                </a>
                <p class="informacion-fecha-autor">
                    Fecha: <span>10/04/2021</span> Autor: <span>Admin</span>
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium sequi dicta asperiores ad
                    culpa eaque expedita
                </p>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal es profesional, buena atención al cliente y la casa que me vendieron cumple con
                todas mis expectativas.
            </blockquote>
            <p>- Emma Ciambrino Baz</p>
        </div>
    </section>
</div>