<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body class="<?php body_class(); ?>">
	<?php wp_body_open(); ?>
	<header class="site-header">
		<div class="site-header__wrapper">
			<div class="site-header__logo">
				<img src="<?php echo get_theme_file_uri('/assets/images/logo_abercoaching_inline.png'); ?>" alt="">
			</div>
			<div id="site-header__menu-icon" class="site-header__menu-icon">
				<div id="burger-icon" class="burger-icon">
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
			<div id="site-header__menu-content" class="site-header__menu-content">
				<nav class="primary-nav">
					<ul>
						<li><a href="#">Présentation</a></li>
						<li><a href="#">Services</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>