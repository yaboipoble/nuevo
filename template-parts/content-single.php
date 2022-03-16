<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zerty
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Sección breadcrumb  -->
    <header class="breadcrumb_section bg_gradient_blue deco_wrap d-flex align-items-center text-white clearfix"
        id="breadcrumb_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="breadcrumb_content text-center decrease_size fade-in-up">
						<p class="text-center">
							<?php $categories = get_the_category();
if ( ! empty( $categories ) ) {
    echo '<a class="text-white" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
} ?>
						</p>
                        <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title page_title mb-30 text-white">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title text-white"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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
                    </div>
                </div>
            </div>
        </div>
    </header><!-- .entry-header -->

    <section class="entry-content details_section blog_details sec_ptb_120 clearfix fade-in-up">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-md-center justify-content-sm-center">
				<!-- Contenido de la página  -->
                <div class="col-12 col-md-8 format-standard">
				<div class="d-flex align-items-center justify-content-center">
	  <?php zerty_post_thumbnail(); ?>

	 </div>
                    <?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'slick' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'slick' ),
				'after'  => '</div>',
			)
		);
		?>
                    <?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
                </div><!-- .entry-content -->
                <!--sidebar-->
                <div class="col-12 col-md-4 fade-in-up">
                    <?php get_sidebar();?>
                </div>
            </div>

        </div>

    </section>

    <footer class="entry-footer">
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->