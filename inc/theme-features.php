<?php


// Hide editor on home
add_action( 'admin_init', 'hide_editor' );
function hide_editor() {
     
    if($_GET['post'] == 5){ 
        remove_post_type_support('page', 'editor');
    }
}

function abercoaching_theme_features() {

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	add_image_size('gallery', 600, 440, true);
}

add_action('after_setup_theme', 'abercoaching_theme_features');