<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zerty
 */

?>

<footer id="footer-zerty">

    <section id="footer-Content">
        <div class="container-fluid" id="formulario-footer">
 <!--Formulario-->
            <div class="row">

                <div id="contacto" class="col-12 p-5">
                    <div class="footer-logo container">
                        <?php if (is_active_sidebar('formulario_footer')) : dynamic_sidebar('formulario_footer');
		endif; ?>
                    </div>
                </div>
		 </div>
	</div>
 <!--Widgets-->  
	<div class="container pt-5">
		<div class="row">
			   <div class="d-flex align-items-center justify-content-center col-12 col-md-5">
                    <div class="widget">
                        <?php if (is_active_sidebar('columna_dos_footer')) : dynamic_sidebar('columna_dos_footer');
		endif; ?>
                    </div>
                </div>


                <div class="d-flex align-items-center justify-content-center col-12 col-md-3">
                    <div class="widget">
                        <?php if (is_active_sidebar('columna_tres_footer')) : dynamic_sidebar('columna_tres_footer');
		endif; ?>
                    </div>
                </div>


                <div class="d-flex align-items-center justify-content-center col-12 col-md-3">
                    <div class="widget">
                        <?php if (is_active_sidebar('columna_cuatro_footer')) : dynamic_sidebar('columna_cuatro_footer');
		endif; ?>
                    </div>
                </div>
				</div>
		</div>




    </section>

</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>