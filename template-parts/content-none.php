<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nuevo
 */

?>

<div class="container pt-3">
	<div class="row">
	<section class="no-results not-found col-md-8">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'No pudimos encontrar nada', 'nuevo' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'No hay entradas. Agrega una <a href="%1$s">aquí</a>.', 'nuevo' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Lamentablemente, no encontramos lo que intentaste buscar. Prueba con otros términos.', 'nuevo' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'Parece que el contenido al que intentaste acceder no está disponible. Prueba la función de búsqueda.', 'nuevo' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
<div class="col-md-4">
	<?php get_sidebar()?>
		</div>
</div>
</div>