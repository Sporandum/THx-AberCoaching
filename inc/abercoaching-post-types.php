<?php
// Custom post types
function abercoaching_post_types() {
	// Services
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

add_action('init', 'abercoaching_post_types');