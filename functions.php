<?php

// Require the composer autoload for getting conflict-free access to enqueue
require_once __DIR__ . '/vendor/autoload.php';


// WPACK.IO features init
require get_theme_file_path('/inc/wpack-features.php');

// Custom theme's functions
require get_theme_file_path('/inc/theme-features.php');