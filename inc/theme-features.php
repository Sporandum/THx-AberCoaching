<?php

// Theme support
add_action('after_setup_theme', 'abercoaching_theme_features');
function abercoaching_theme_features() {

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	add_image_size('gallery', 600, 440, true);
}


// Hide editor on home
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
     
    if($_GET['post'] == 5){ 
        remove_post_type_support('page', 'editor');
    }
}


// Custom post type Services
function abercoaching_services_post_types() {
	register_post_type('services', array(
		'public' => true,
		'menu_icon' => 'dashicons-format-aside',
		'show_in_rest' => true, // For use block editor
		'labels' => array(
			'name' => 'Services',
			'add_new_item' => 'Ajouter un service',
			'edit_item' => 'Editer un service',
			'all_items' => 'Services',
			'singular_name' => 'Service'
		)
	));
}

add_action('init', 'abercoaching_services_post_types');