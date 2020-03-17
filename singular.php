<?php get_header();
if (have_posts()) :
	while (have_posts()) :
		the_post();
?>
		<main class="singular">
			<div class="singular__top-banner">
				<div class="singular__top-banner__img">
					<?php the_post_thumbnail('post_banner'); ?>
				</div>
				<div class="singular__top-banner__title">
					<div class="wrapper">
						<?php the_title('<h1>', '</h1>'); ?>
					</div>
				</div>

			</div>
			</div>
			<div class="wrapper wrapper--narrow">
				<div class="singular__content generic-content">

					<?php the_content(); ?>

				</div>
				<div class="singular__comments">
					<?php if(comments_open() || get_comments_number()) :
						comments_template();
					endif; ?>
				</div>
			</div>
		</main>

<?php
	endwhile;
endif;
get_footer();
