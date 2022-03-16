<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zerty
 */

?>
<!-- Nota: este loop no se utiliza en la página ya que estoy usando el de "blog.php" para mostrar entradas. Como este no es muy personalizable, no pude hacer mucho con el  -->
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title text-white">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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

                <?php zerty_post_thumbnail(); ?>

                <footer class="entry-footer">
                    <?php zerty_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </article><!-- #post-<?php the_ID(); ?> -->
        </div>
		
    </div>
	<div class="col-12 col-md-4">
			<?php get_sidebar();?>
		</div>
</div>