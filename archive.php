<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nuevo
 */

get_header();
?>
<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
<!-- Sección breadcrumb (Título + descripción del sitio)  -->
		<header class="page-header breadcrumb_section bg_gradient_blue deco_wrap d-flex align-items-center text-white clearfix" id="breadcrumb_section">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-9">
					<div class="breadcrumb_content text-center decrease_size fade-in-up">
							<?php
				the_archive_title( '<h1 class="page_title text-white">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
					</div>
				</div>
			</div>
		</div>
	</header><!-- .page-header -->
       <div class="container">
		   <div class="row">
			   <div class="col-12 col-md-8">
				   <!-- Aquí va el contenido principal de la página  -->
				    <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part('template-parts/content', 'archive');

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content-archive', 'none' );

		endif;
		?> 
			   </div>
			   <div class="col-12 col-md-4 pt-4">
				   <!-- Aquí va el sidebar  -->
				   <?php get_sidebar()?>
			   </div>
		   </div>
	</div>

	</main><!-- #main -->
<?php get_footer();?>