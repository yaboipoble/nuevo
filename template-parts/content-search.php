<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nuevo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-12 blog_grid item_content py-4 fade-in-up'); ?>>
                    <header class="entry-header">
                        <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title item_title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title item_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
                        <div class="entry-meta">
                            <?php
				nuevo_posted_on();
				nuevo_posted_by();
				?>
                        </div><!-- .entry-meta -->
                        <?php endif; ?>
                    </header><!-- .entry-header -->
<div class="d-flex align-items-center justify-content-center">
	  <?php nuevo_post_thumbnail(); ?>

	 </div>
                  
                    <div class="entry-content">
                        <p class="mb-30"><?php echo get_the_excerpt();?></p>
                        <?php

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nuevo' ),
				'after'  => '</div>',
			)
		);
		?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer py-2">
						<div class="row">
							<div class="col-6">
								 <a href="<?php the_permalink();?>" class="details_btn float-left">
                            Leer más <i class="fas fa-arrow-right"></i>
                        </a>
							</div>
							<div class="col-6">
								<a href="<?php the_permalink();?>" class="comments_btn float-right">
                            <i class="fas fa-comments"></i> <?php echo get_comments_number($post->ID);?>
                        </a>
							</div>
						
						</div>
                       
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->