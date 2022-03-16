<?php
/*
Template Name: blog
*/

get_header();
?>
<!-- Esta es la página de blog, tuve que crear una página personalizada porque la que tiene WP por defecto no es muy personalizable y me dio muchos problemas con el sidebar. Tiene un loop para traer publicaciones del tipo "post"  -->

<!--Sección breadcrumb: Título + descripción de la página-->
<section class="breadcrumb_section bg_gradient_blue deco_wrap d-flex align-items-center text-white clearfix mb-3"
    id="breadcrumb_section">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9">
                <div class="breadcrumb_content text-center">
                    <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title item_title text-white page_title mb-30 fade-in-up">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title item_title text-white fade-in-up"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
                    <?php endif; ?>
                    <p class="text-white fade-in-up"> <?php echo get_the_excerpt() ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contenido de la página de blog  -->
<div class="container">
    <div class="row">
		<!-- Contenido principal  -->
        <div class="col-md-8 col-12">
                <?php

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
/*Query para pedir las entradas, se debe ajustar el "posts_per_page" para cambiar el número de publicaciones por página*/
$args = array(
    'post_type'=>'post',
    'posts_per_page' => 6,
    'paged' => $paged,
	'orderby'			=> 'date',
	'order'				=> 'DESC'
);
/*Loop para traer publicaciones*/
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
    while ( $loop->have_posts() ) : $loop->the_post();?>
 <article id="post-<?php the_ID(); ?>" <?php post_class('col-12 blog_grid item_content py-4 fade-in-up'); ?>>
                    <header class="entry-header">
                        <?php
		if ( is_singular() ) :
			the_title( '<h2 class="entry-title item_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		else :
			the_title( '<h3 class="entry-title item_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
                        <div class="entry-meta">
                            <?php
				zerty_posted_on();
				zerty_posted_by();
				?>
                        </div><!-- .entry-meta -->
                        <?php endif; ?>
                    </header><!-- .entry-header -->
<div class="d-flex align-items-center justify-content-center">
	  <?php zerty_post_thumbnail(); ?>

	 </div>
                  <!-- Contenido de la entrada (extracto)  -->
                    <div class="entry-content">
                        <p class="mb-30"><?php echo get_the_excerpt();?></p>
                        <?php

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zerty' ),
				'after'  => '</div>',
			)
		);
		?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer py-2">
						<div class="row">
							<div class="col-6">
								<!-- Permalink "leer más"  -->
								 <a href="<?php the_permalink();?>" class="details_btn float-left">
                            Leer más <i class="fas fa-arrow-right"></i>
                        </a>
							</div>
							<div class="col-6">
								<!-- Contador de comentarios  -->
								<a href="<?php the_permalink();?>" class="comments_btn float-right">
                            <i class="fas fa-comments"></i> <?php echo get_comments_number($post->ID);?>
                        </a>
							</div>
						
						</div>
                       
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile;

    $total_pages = $loop->max_num_pages;

    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));?>
		
		<!-- Paginación -->
		<div id="pagination" class="py-5 fade-in-up">
			
   
         <?php echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => 'page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('<i class="fas fa-caret-left"></i>'),
            'next_text'    => __('<i class="fas fa-caret-right"></i>'),
			'type' => 'list',
        ));
    }    
}
wp_reset_postdata();
?>
          </div>
			
    </div>
		<!-- Sidebar -->
		<div id="sidebar-blog" class="col-md-4 col-12 fade-in-up">
            <?php get_sidebar();?>
        </div>
</div>
</div>
<?php get_footer()?>