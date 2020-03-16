<?php

// Theme support
add_action('after_setup_theme', 'abercoaching_theme_features');
function abercoaching_theme_features() {

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	add_image_size('gallery', 600, 440, true);
	add_image_size('post_card', 330, 220, true);
}


// Remove support editor for front-page
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {

    if($_GET['post'] == get_option('page_on_front')){ 
        remove_post_type_support('page', 'editor');
    }
}


// Remove <p> tag around input in contact form 7 plugin
add_filter('wpcf7_autop_or_not', '__return_false');