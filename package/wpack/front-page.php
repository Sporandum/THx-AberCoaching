<?php get_header(); ?>

<?php if (have_posts()) :
	while (have_posts()) :
		the_post();

		// Hero ACF
		$hero = (object) get_field('home_page_hero');
		// Gallery ACF
		$gallery = get_field('home_page_gallery');
		// About ACF
		$about = (object) get_field('home_page_about');
		// Services ACF
		$services = get_field('home_services');
		$servicesID = [];
		if (!empty($services)) {
			foreach ($services['services_select'] as $service) {
				$servicesID[] = $service->ID;
			}
		}
		// Testimonials ACF
		$testimonials = get_field('home_testimonials');
		$testimonialsID = [];
		if (!empty($testimonials)) {
			foreach ($testimonials['testimonials_select'] as $testimonial) {
				$testimonialsID[] = $testimonial->ID;
			}
		}
		// Allowed html tag in wp_kses functions
		$allowed_html = array(
			'br' => array(),
			'p' => array(),
			'strong' => array(),
			'em' => array()
		);
?>

		<main class="home">

			<?php if ($hero) : ?>
				<div class="wrapper">
					<section class="hero">
						<div class="hero__text-bloc generic-content">
							<h1 class="headline headline--large"><?php echo wp_kses($hero->hero_title, $allowed_html); ?></h1>
							<?php echo wp_kses($hero->hero_text, $allowed_html); ?>
							<p>
								<a href="<?php echo esc_url($hero->hero_btn['hero_btn_link']); ?>" class="btn btn--primary btn--center"><?php echo esc_html($hero->hero_btn['hero_btn_title']); ?></a>
							</p>
						</div>
						<div class="hero__img-bloc">
							<img src="<?php echo get_theme_file_uri('/assets/images/Hero__img.png'); ?>" alt="Illustration de personnes travaillant ensemble">
						</div>
					</section><!-- end .hero -->
				</div><!-- end .wrapper -->
			<?php endif; ?>

			<?php if ($gallery) : ?>
				<div class="banner">
					<div class="banner__container">

						<?php foreach ($gallery as $image) : ?>
							<div class="banner__image">

								<img src="<?php echo esc_url($image['sizes']['gallery']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">

							</div>
						<?php endforeach; ?>

					</div>
				</div><!-- end .banner -->
			<?php endif; ?>

			<?php if ($about) : ?>
				<div class="wrapper">
					<section id="presentation" class="about" data-matching-link="#presentation-link">
						<h2 class="about__headline headline headline--section"><?php echo esc_html($about->about_title); ?></h2>
						<div class="about__img-bloc">
							<img src="<?php echo esc_url($about->about_picture['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($about->about_picture['alt']); ?>">
						</div>
						<h3 class="about__name headline headline--medium"><?php echo esc_html($about->about_name); ?></h3>
						<div class="about__text-bloc generic-content">
							<?php echo wp_kses($about->about_excerpt, $allowed_html); ?>
						</div>
						<a href="<?php echo esc_url($about->about_page); ?>" class="about__btn btn btn--primary"><?php echo esc_html($about->about_btn); ?></a>
					</section><!-- end .about -->
				</div><!-- end .wrapper -->
			<?php endif; ?>


			<?php if ($services) : ?>

				<div class="services__bg-color">
					<div class="wrapper">
						<section id="services" class="services" data-matching-link="#services-link">
							<h2 class="headline headline--section"><?php echo esc_html($services['services_title']); ?></h2>

							<div class="services__container">

								<?php
								// Custom WP_Query for Services
								$serviceQuery = new WP_Query(array(
									'posts_per_page' => -1,
									'post_type' => 'services',
									'post__in' => $servicesID,
									'orderby' => 'post__in'

								));
								if ($serviceQuery->have_posts()) :
									while ($serviceQuery->have_posts()) :
										$serviceQuery->the_post();


										$img;
										$service = (object) get_field('home_description');

										if ($service->png) $img = $service->png;
										if ($service->svg) $img = $service->svg; ?>

										<div class="service">

											<div class="service__img-bloc">
												<img src="<?php echo esc_url($img['sizes']['large']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
											</div>

											<h3 class="service__label headline headline--medium"><?php the_title(); ?></h3>
											<div class="service__text-bloc generic-content">
												<p><?php echo wp_kses($service->excerpt, $allowed_html); ?></p>
												<p>
													<a href="<?php the_permalink(); ?>" class="btn btn--primary btn--center"><?php echo esc_html($service->button_title); ?></a>
												</p>
											</div>

										</div><!-- end .service -->
								<?php endwhile;
								endif;  ?>
							</div><!-- end .services__container -->
						</section><!-- end .services -->
					</div><!-- end .wrapper -->
				</div><!-- end .services__bg-color -->
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>


			<?php
			// Custom WP_Query for Testimonials
			$testimonialsQuery = new WP_Query(array(
				'posts_per_page' => -1,
				'post_type' => 'testimonials',
				'post__in' => $testimonialsID,
				'orderby' => 'post__in'
			));

			if ($testimonialsQuery) : ?>

				<div class="wrapper">
					<section id="testimonials" class="testimonials">
						<h2 class="headline headline--section"><?php echo esc_html($testimonials['testimonials_title']); ?></h2>

						<div class="glide">

							<div class="glid__track" data-glide-el="track">
								<ul class="glide__slides">

									<?php while ($testimonialsQuery->have_posts()) :
										$testimonialsQuery->the_post(); ?>

										<li class="glide__slide">
											<div class="testimonial">
												<div class="testimonial__avatar">
													<img src="<?php echo get_theme_file_uri('/assets/images/Temoignage__avatar.png'); ?>" alt="">
												</div>
												<div class="testimonial__title"><?php the_title(); ?></div>
												<div class="testimonial__text"><?php echo wp_kses(get_field('testimonial'), $allowed_html); ?></div>
												<div class="testimonial__author"><?php echo esc_html(get_field('name')); ?> - <?php echo esc_html(get_field('profession')); ?></div>
											</div>
										</li>

									<?php endwhile; ?>

								</ul>
							</div>
							<div data-glide-el="controls" class="testimonials__controls">
								<span class="testimonials__control testimonials__control--left" role="button" data-glide-dir="<"><i class="fas fa-chevron-left"></i></span>
								<span class="testimonials__control testimonials__control--right" role="button" data-glide-dir=">"><i class="fas fa-chevron-right"></i></span>
							</div>

							<div class="glide__bullets" data-glide-el="controls[nav]">
								<?php for ($i = 0; $i < $testimonialsQuery->post_count; $i++) : ?>
									<button class="glide__bullet" data-glide-dir="=<?php echo $i ?>"><span class="sr-only"><?php echo "Acceder au temoignage n° " . ($i + 1); ?></span></button>
								<?php endfor; ?>
							</div>

						</div><!-- end .glide -->
					</section><!-- end .testimonials -->
				</div><!-- end .wrapper -->
			<?php endif;
			wp_reset_postdata(); ?>

			<?php
			// Custom WP_Query for Last Posts
			$lastPosts = new WP_Query(array(
				'posts_per_page' => 3,
				'post_type' => 'post'
			));

			if ($lastPosts) : ?>

				<section id="last-posts" class="last-posts" data-matching-link="#blog-link">
					<div class="wrapper">
						<h2 class="headline headline--section">Dernier articles</h2>
					</div>
					<div class="last-posts__bg">
						<div class="wrapper">
							<div class="post-card__container">
								<?php while ($lastPosts->have_posts()) :
									$lastPosts->the_post(); ?>
									<div class="post-card">
										<a href="<?php the_permalink(); ?>">

											<div class="post-card__img">
												<?php the_post_thumbnail('post_card'); ?>
											</div>

											<div class="post-card__content">
												<h4><?php the_title(); ?></h4>
												<p><?php echo wp_kses(wp_trim_words(get_the_excerpt(), 15, ' ...'), $allowed_html); ?></p>
											</div>

										</a>
									</div>
								<?php endwhile; ?>
							</div>

						</div><!-- end .wrapper -->
						<div class="last-posts__btn-more">
							<a href="<?php echo esc_url(site_url('/blog')); ?>" class="btn btn--primary btn--center">Voir plus d'articles <i class="fas fa-plus"></i></a>
						</div>

					</div><!-- end .last-post__bg -->
				</section><!-- end .last-posts -->
			<?php endif;
			wp_reset_postdata(); ?>

			<?php if (get_field('home_contact_cf7')) : ?>
			<section id="contact" class="contact-form section-spacing" data-matching-link="#contact-link">
				<div class="wrapper wrapper--narrow">
					<h2 class="headline headline--section">Contact</h2>
					<?php the_field('home_contact_cf7');  ?>
				</div>

			</section>
			<?php endif; ?>

		</main>

<?php endwhile;
endif;
?>

<?php get_footer();
