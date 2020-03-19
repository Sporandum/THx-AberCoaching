<?php
get_header();
?>
<main class="blog-page">

	<div class="wrapper">
		<h1 class="headline headline--section">Blog</h1>
	</div>

	<div class="blog-page__bg">
		<div class="wrapper">
			<div class="post-card__container">

				<?php if (have_posts()) :
					while (have_posts()) :
						the_post(); ?>
						<div class="post-card">
							<a href="<?php the_permalink(); ?>">

								<div class="post-card__img">
									<?php the_post_thumbnail('post_card'); ?>
								</div>

								<div class="post-card__content">
									<h4><?php the_title(); ?></h4>
									<p><?php echo wp_trim_words(get_the_excerpt(), 15, ' ...'); ?></p>
								</div>

							</a>
						</div>
				<?php endwhile;
				endif; ?>
			</div><!-- end .post-card__container -->
			<div class="blog-page__pagination">
				<?php the_posts_navigation(); ?>
			</div>

		</div><!-- end .wrapper -->
	</div>
</main>

<?php
get_footer();
