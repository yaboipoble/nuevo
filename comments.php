<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zerty
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$is_comments = get_comment_count() > 0 ? 'have_comments' : 'no_comments';

if ( have_comments() ) :
    ?>
    <div class="comment_area mb-80 clearfix container">
        <h3 class="title_text mb-50">
		<?php
			$zerty_comment_count = get_comments_number();
			if ( '1' === $zerty_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'Un comentario en &ldquo;%1$s&rdquo;', 'zerty' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s comentario en &ldquo;%2$s&rdquo;', '%1$s comentarios en &ldquo;%2$s&rdquo;', $zerty_comment_count, 'comments title', 'zerty' ) ),
					number_format_i18n( $zerty_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h3>
        <ul class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ul',
					'short_ping' => true,
				)
			);
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();?>
    </div>
    <?php
endif; ?>

<!-- Formulario de comentarios  -->
<div class="comment_form">
    <?php
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comentarios desactivados.', 'zerty' ); ?></p>
        <?php
    endif;

    $commenter      = wp_get_current_commenter();
    $req            = get_option( 'require_name_email' );
    $aria_req       = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
        'author' => '<div class="row"><div class="col-lg-6 col-md-6"><div class="form_item"> <input type="text" name="author" id="name" value="'.esc_attr($commenter['comment_author']).'" placeholder="'.esc_attr__( 'Tu nombre *', 'zerty' ).'" '.$aria_req.'> </div></div>',
        'email'	=> '<div class="col-lg-6 col-md-6"><div class="form_item"> <input type="email" name="email" id="email" value="'.esc_attr($commenter['comment_author_email']).'" placeholder="'.esc_attr__( 'Tu correo electrónico *', 'zerty' ).'" '.$aria_req.'> </div></div></div>',
        'url'	=> '<div class="form_item"><input type="url" name="url" value="'.esc_attr($commenter['comment_author_url']).'" placeholder="'.esc_attr__( 'Tu sitio web (opcional)', 'zerty' ).'"> </div>',
    );
    $comments_args = array(
        'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
        'class_form'            => '',
        'class_submit'          => 'btn bg_default_blue',
        'title_reply_before'    => '<h3 class="title_text mb-50">',
        'title_reply'           => esc_html__( 'Deja un comentario', 'zerty' ),
        'title_reply_after'     => '</h3>',
        'comment_notes_before'  => '',
        'comment_field'         => '<div class="form_item"><textarea name="comment" id="comment" placeholder="'.esc_attr__( 'Escribe tu comentario aquí...', 'zerty' ).'"></textarea></div>',
        'comment_notes_after'   => '',
        'submit_button'         => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s">'. esc_html__( 'Publicar comentario', 'zerty' ).'</button>',
    );
    comment_form($comments_args);
    ?>
</div>