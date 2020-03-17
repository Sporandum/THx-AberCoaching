<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body>
	<main>
		<div class="wrapper wrapper--narrow">
			<?php if (have_posts()) :
				while (have_posts()) :
					the_post();

					the_title('<h1>', '</h1>');
					the_content();

				endwhile;
			endif; ?>
		</div>
	</main>
	<?php wp_footer(); ?>
</body>

</html>