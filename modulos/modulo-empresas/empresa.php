<!--Custom loop para empresas en el inicio, por defecto se muestran hasta 5 empresas-->
<div class="pt-3 pb-5 pl-5 pr-5 container fade-in-up">
    <strong><h2 id="titulo-empresa" class="text-center font-weight-bold p-2 pb-4">Empresas que apoyamos en sus áreas administrativas y de prevención de riesgos</h2></strong>
    <div class="row d-flex justify-content-center">
        <?php
        $temp = $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $post_per_page = 5; // -1 shows all posts
        $args = array(
            'post_type' => 'empresa',
            'orderby' => 'date',
            'order' => 'ASC',
            'paged' => $paged,
            'posts_per_page' => $post_per_page
        );
        $wp_query = new WP_Query($args);

        if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
	
							<div class="col-md-2 col-6 mx-3 d-flex align-items-center justify-content-center">
								<img src="<?php the_post_thumbnail_url(); ?>">
							</div>
            <?php endwhile;
        else : ?>
		<!-- En el caso de que no hayan entradas, se muestra este texto -->
            <p>No hay empresas. Agrega una desde <i class="fas fa-plus"></i> Añadir > Empresa.</p>
        <?php endif;
        wp_reset_query();
        $wp_query = $temp ?>
    </div>
     
</div>