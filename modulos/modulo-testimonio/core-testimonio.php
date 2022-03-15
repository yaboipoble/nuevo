<?php
/*Custom post type: testimonios*/
/**
 * Register a custom post type called "testimonios".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_testimonio_init() {
    $labels = array(
        'name'                  => _x( 'Testimonios', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Testimonio', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Inicio: Sección de testimonios', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Testimonio', 'Agregar nuevo on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Agregar nuevo', 'textdomain' ),
        'add_new_item'          => __( 'Agregar nuevo testimonio', 'textdomain' ),
        'new_item'              => __( 'Nuevo testimonio', 'textdomain' ),
        'edit_item'             => __( 'Editar testimonio', 'textdomain' ),
        'view_item'             => __( 'Ver testimonio', 'textdomain' ),
        'all_items'             => __( 'Todos los testimonios', 'textdomain' ),
        'search_items'          => __( 'Buscar testimonio', 'textdomain' ),
        'parent_item_colon'     => __( 'Testimonio padre:', 'textdomain' ),
        'not_found'             => __( 'No se encontraron testimonios.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No se encontraron testimonios en la basura.', 'textdomain' ),
        'featured_image'        => _x( 'Imagen del testimonio', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Añadir imagen del testimonio', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Quitar imagen del testimonio', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Usar como imagen principal', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Todos los testimonios', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insertar testimonio', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Subido a este testimonio', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filtar lista de testimonios', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Lista de navegación de testimonios', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Lista de testimonios', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-format-quote', 
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies'  => array( 'category' ),
    );
 
    register_post_type( 'testimonio', $args );
}
 
add_action( 'init', 'wpdocs_codex_testimonio_init' );