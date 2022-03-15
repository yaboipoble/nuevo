<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nuevo
 */

get_header();
?>

	<main id="primary" class="site-main">
			<section><?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', get_post_type() );
				
		endwhile; // End of the loop.
		?></section>		
	</main><!-- #main -->
<?php
get_footer();
