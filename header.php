<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body>
	<?php wp_body_open(); ?>
	<div class="site-header">
			<div class="container site-header__wrapper">

				<div class="site-header__brand-logo">
					<img src="<?php echo get_theme_file_uri('/assets/images/logo_abercoaching_inline.png'); ?>" alt="">
				</div>
				<nav class="primary-nav">
					<ul>
						<li><a class="current-item" href="#">Présentation</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</nav>
			</div>
	</div>