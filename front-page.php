<?php get_header(); ?>

<?php if (have_posts()) :
	while (have_posts()) :
		the_post();

		$hero = (object) get_field('home_page_hero');
		$gallery = get_field('home_page_gallery');
		$about = (object) get_field('home_page_about');
		$services = get_field('home_services');
		$servicesID = [];
		foreach ($services['services_select'] as $service) {
			$servicesID[] = $service->ID;
		}
		$testimonials = get_field('home_testimonials');
		$testimonialsID = [];
		foreach ($testimonials['testimonials_select'] as $testimonial) {
			$testimonialsID[] = $testimonial->ID;
		}

		$allowed_html = array(
			'br' => array()
		);
?>

		<main class="home">

			<div class="wrapper">
				<section class="hero">
					<div class="hero__text-bloc generic-content">
						<h1 class="headline headline--large"><?php echo wp_kses($hero->hero_title, $allowed_html); ?></h1>
						<?php echo $hero->hero_text; ?>
						<p>
							<a href="<?php echo esc_url($hero->hero_btn['hero_btn_link']); ?>" class="btn btn--primary btn--center"><?php echo esc_html($hero->hero_btn['hero_btn_title']); ?></a>
						</p>
					</div>
					<div class="hero__img-bloc">
						<img src="<?php echo get_theme_file_uri('/assets/images/hero__img.png'); ?>" alt="">
					</div>
				</section><!-- end .hero -->
			</div><!-- end .wrapper -->

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
					<section class="about">
						<h2 class="about__headline headline headline--section"><?php echo esc_html($about->about_title); ?></h2>
						<div class="about__img-bloc">
							<img src="<?php echo esc_url($about->about_picture['sizes']['medium_large']); ?>" alt="">
						</div>
						<h3 class="about__name headline headline--medium"><?php echo esc_html($about->about_name); ?></h3>
						<div class="about__text-bloc generic-content">
							<?php echo $about->about_excerpt; ?>
						</div>
						<a href="<?php echo esc_url($about->about_page); ?>" class="about__btn btn btn--primary"><?php echo esc_html($about->about_btn); ?></a>
					</section><!-- end .about -->
				</div><!-- end .wrapper -->
			<?php endif; ?>


			<?php if ($services) : ?>

				<div class="services__bg-color">
					<div class="wrapper">
						<section class="services">
							<h2 class="headline headline--section"><?php echo esc_html($services['services_title']); ?></h2>

							<div class="services__container">

								<?php $serviceQuery = new WP_Query(array(
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


			<?php $testimonialsQuery = new WP_Query(array(
				'posts_per_page' => -1,
				'post_type' => 'testimonials',
				'post__in' => $testimonialsID,
				'orderby' => 'post__in'
			));

			if ($testimonialsQuery) : ?>

				<div class="wrapper">
					<section class="testimonials">
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
									<button class="glide__bullet" data-glide-dir="=<?php echo $i ?>"></button>
								<?php endfor; ?>
							</div>

						</div><!-- end .glide -->
					</section><!-- end .testimonials -->
				</div><!-- end .wrapper -->
			<?php endif;
			wp_reset_postdata(); ?>

			<section class="last-posts">
				<div class="wrapper">
					<h2 class="headline headline--section">Dernier articles</h2>
				</div>
				<div class="last-posts__bg">
					<div class="wrapper">
						<div class="last-posts__container">

							<div class="post-card">

								<div class="post-card__img">
									<img src="<?php echo get_theme_file_uri('/assets/images/vladimir-proskurovskiy-TNJdsXC_wtY-unsplash.jpg'); ?>" alt="">
								</div>

								<div class="post-card__content">
									<h4><a href="">Titre de mon post très</a></h4>
								</div>

							</div>
							<div class="post-card">

								<div class="post-card__img">
									<img src="<?php echo get_theme_file_uri('/assets/images/vladimir-proskurovskiy-TNJdsXC_wtY-unsplash.jpg'); ?>" alt="">
								</div>

								<div class="post-card__content">
									<h4><a href="">Titre de mon post très</a></h4>
								</div>

							</div>
							<div class="post-card">

								<div class="post-card__img">
									<img src="<?php echo get_theme_file_uri('/assets/images/vladimir-proskurovskiy-TNJdsXC_wtY-unsplash.jpg'); ?>" alt="">
								</div>

								<div class="post-card__content">
									<h4><a href="">Titre de mon post très</a></h4>
								</div>

							</div>
						</div>

					</div>
					<div class="last-posts__btn-more">
						<a href="" class="btn btn--primary btn--center">Voir plus d'articles <i class="fas fa-plus"></i></a>
					</div>

				</div><!-- end .last-post__bg -->
			</section><!-- end .last-posts -->

		</main>

<?php endwhile;
endif;
?>

<?php get_footer();
