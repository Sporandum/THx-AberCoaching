<?php

// Disable Gutenberg
add_filter( 'use_block_editor_for_post', '__return_false' );


//



function abercoaching_theme_features() {

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	add_image_size('gallery', 300, 220, true);
}

add_action('after_setup_theme', 'abercoaching_theme_features');