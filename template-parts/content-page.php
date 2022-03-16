<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zerty
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="breadcrumb_section bg_gradient_blue deco_wrap d-flex align-items-center text-white clearfix" id="breadcrumb_section">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-9">
					<div class="breadcrumb_content text-center decrease_size">
												<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title page_title mb-30 text-white fade-in-up">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title text-white fade-in-up"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
		<?php endif; ?>
				<p class="text-white fade-in-up"> <?php echo get_the_excerpt() ?></p>
					</div>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->

	<?php zerty_post_thumbnail(); ?>

	<div class="entry-content container fade-in-up">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zerty' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

		<footer class="entry-footer">
		</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
