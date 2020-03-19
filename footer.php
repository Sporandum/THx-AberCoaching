<footer class="site-footer">
	<div class="site-footer__top">
		<div class="site-footer__wrapper">
			<div>RDV au cabinet : 8 rue Villebois-Mareuil - LE RELECQ KERHUON</div>
			<div>06 32 75 57 90</div>
		</div>
	</div>
	<div class="site-footer__middle">
		<div class="site-footer__wrapper">
			<div class="site-footer__logo">
				<a href="<?php echo esc_url(site_url()); ?>"><img src="<?php echo get_theme_file_uri('/assets/images/logo_abercoaching_inline.png'); ?>" alt="Abercoaching logo"></a>
			</div>
			<div class="site-footer__social-icons">
				<a href="https://www.linkedin.com/in/annaszeremeta/" target="_blank"><i class="fab fa-linkedin"></i></a>
				<a href="https://www.facebook.com/abercoaching" target="_blank"><i class="fab fa-facebook-square"></i></a>
			</div>
		</div>
	</div>
	<div class="site-footer__bottom">
		<div class="site-footer__wrapper">
			<ul class="site-footer__links">
				<li><a href="<?php echo get_privacy_policy_url(); ?>">Mentions Légales</a></li>
				<li><a href="mailto:contact@abercoaching.com" target="_blank">contact@abercoaching.com</a></li>
				<?php
				$creditSitesPage = get_page_by_path('credits-site');
				if (get_post_status($creditSitesPage) === 'publish') : ?>
					<li><a href="<?php the_permalink($creditSitesPage); ?>"><?php echo esc_html(get_the_title($creditSitesPage)); ?></a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>