<?php

/*estilos bien llamados*/

function mis_estilos() {
	
	wp_register_style('estilos-style', get_template_directory_uri() . '/assets/css/style.css');
	wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_register_style('slick', get_template_directory_uri() . '/assets/css/slick.css');
	wp_register_style('slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css');
	
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('estilos-style');
	wp_enqueue_style('slick');
	wp_enqueue_style('slick-theme');
	
	}
	
	
	add_action('wp_enqueue_scripts', 'mis_estilos');
	
	
/*estilos bien llamados*/


/*scripts*/
function mis_script() {
	// nos aseguramos que no estamos en el area de administracion
		if (!is_admin()) {
			// registramos nuestro script con el nombre "mi-script" y decimos que es dependiente de jQuery para que wordpress se asegure de incluir jQuery antes de este archivo
			// en adicion a las dependencias podemos indicar que este aarchivo debe ser insertado en el footer del sitio, en el lugar donde se encuente la funcion wp_footer
 
// Register the script like this for a theme:
wp_register_script('bootstrap-script', get_bloginfo('template_directory') .'/assets/js/bootstrap.min.js', array('jquery'), '1', true);
wp_register_script('script-scroll', get_bloginfo('template_directory') . '/assets/js/scroll.js', array('jquery'), '1', true );
wp_register_script('slick', get_bloginfo('template_directory') . '/assets/js/slick.min.js', array('jquery'), '1', true );
/*encolamos los JS*/
wp_enqueue_script('bootstrap-script', array('jquery'), true);
wp_enqueue_script('script-scroll', array('jquery'), true);
wp_enqueue_script('slick', array('jquery'), true);
		 }
	
	}
	
	add_action("wp_enqueue_scripts", "mis_script", 1 );

/*scripts*/