<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header class="site-header">
		<div class="site-header__wrapper">
			<div class="site-header__logo">
				<a href="<?php echo esc_url(site_url()); ?>"><img src="<?php echo get_theme_file_uri('/assets/images/logo_abercoaching_inline.png'); ?>" alt="Abercoaching logo"></a>
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
						<li id="presentation-link"><a href="<?php echo esc_url(site_url('/#presentation')); ?>">Nos Missions</a></li>
						<li id="services-link"><a href="<?php echo esc_url(site_url('/#services')); ?>">Services</a></li>
						<li id="blog-link" <?php echo get_post_type() === 'post' ? 'class="current-menu-item"' : ''; ?>><a href="<?php echo esc_url(site_url('/blog')); ?>">Blog</a></li>
						<li id="contact-link"><a href="<?php echo esc_url(site_url('/#contact')); ?>">Contact</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>