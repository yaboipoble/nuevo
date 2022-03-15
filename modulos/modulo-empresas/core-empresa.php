<?php
/*Custom post type: empresas*/
/**
 * Register a custom post type called "empresas".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_empresa_init() {
    $labels = array(
        'name'                  => _x( 'Empresas', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Empresa', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Inicio: Sección empresas', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Empresa', 'Agregar nuevo on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Agregar nuevo', 'textdomain' ),
        'add_new_item'          => __( 'Agregar nuevo testimonio', 'textdomain' ),
        'new_item'              => __( 'Añadir empresa', 'textdomain' ),
        'edit_item'             => __( 'Editar empresa', 'textdomain' ),
        'view_item'             => __( 'Ver empresa', 'textdomain' ),
        'all_items'             => __( 'Todos las empresas', 'textdomain' ),
        'search_items'          => __( 'Buscar empresa', 'textdomain' ),
        'parent_item_colon'     => __( 'Empresa padre:', 'textdomain' ),
        'not_found'             => __( 'No se encontraron empresas.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No se encontraron empresas en la basura.', 'textdomain' ),
        'featured_image'        => _x( 'Logo de la empresa', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Añadir logo de la empresa', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Quitar logo de la empresa', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Usar como imagen principal', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Todos las empresas', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insertar empresa', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Subido a esta empresa', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filtar lista de empresas', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Lista de navegación de empresas', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Lista de empresas', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'empresa' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-businessperson', 
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail'),
		'taxonomies'  => array( 'category' ),
    );
 
    register_post_type( 'empresa', $args );
}
 
add_action( 'init', 'wpdocs_codex_empresa_init' );