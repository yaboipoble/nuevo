<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package nuevo
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
<header class="page-header breadcrumb_section bg_gradient_blue deco_wrap d-flex align-items-center text-white clearfix" id="breadcrumb_section">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-9">
					<div class="breadcrumb_content text-center decrease_size">
					   <h1 class="page_title text-white fade-in-up">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Resultados para: %s', 'nuevo' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
					</div>
				</div>
			</div>
		</div>
	</header><!-- .page-header -->
<div class="container">
	<div class="row">
		<div class="col-12 col-md-8">
				<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div>
		<div class="col-12 col-md-4 pt-4 fade-in-up">
			<?php get_sidebar()?>
		</div>
	</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
