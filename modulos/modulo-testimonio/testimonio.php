<!--Custom loop para los testimonios-->
<div class="pt-5 pb-5 pl-5 pr-5 container">
	<p class="text-center sub_title fade-in-up">Testimonios</p>
    <strong><h2 id="titulo-testimonio" class="fade-in-up text-center font-weight-bold p-2 pb-4">Casos de Éxito</h2></strong>
    <div id="testimonio" class="row d-flex justify-content-center">

        <?php
        $temp = $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = 3; // -1 muestra todas las entradas
        $args = array(
            'post_type' => 'testimonio',
            'orderby' => 'date',
            'order' => 'ASC',
            'paged' => $paged,
            'posts_per_page' => $post_per_page
        );
        $wp_query = new WP_Query($args);

        if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<div class="container d-flex flex-column fade-in-up">
            <div class="row">
                <div class="col-12">
                    <div class="text-center texto-blog">
						<div class="thumbnail_wrap">
							<div class="thumbnail_image">
								<!-- Imagen destacada: ícono de la persona  -->
								<?php nuevo_post_thumbnail(); ?>	
							</div>
						</div>
						<!-- Título: nombre de la persona  -->
                        <h3 class="hero_name"><?php echo get_the_title(); ?></h3>
						<!-- Campo personalizado: Ocupación de la persona  -->
                        <p class="hero_title mb-30"><?php the_field('empresa')?></p>
                        <blockquote><?php echo the_content()?></blockquote>
                    </div>
                </div>
            </div>
        </div>
            <?php endwhile;
        else : ?>
		<!-- En el caso de que no hayan entradas, se muestra este texto -->
            <p>No hay testimonios. Añade uno desde Añadir > Testimonio.</p>
        <?php endif;
        wp_reset_query();
        $wp_query = $temp ?>
    </div>
     
</div>