<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nuevo
 */

get_header();
?>
<!-- Página 404  -->
	<main id="primary" class="site-main">

		<section id="error_section" class="error_section bg_gradient_blue deco_wrap d-flex align-items-center text-white clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="error_content text-center">
                    <h1 class="page_title text-white">404</h1>
                    <h3 class="title_text text-white">Página no encontrada</h3>
                    <p>La página a la que intentas acceder no está disponible.</p>
                    <a href="/" class="btn bg_white">
                        Volver al inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

	</main><!-- #main -->

<?php
get_footer();
