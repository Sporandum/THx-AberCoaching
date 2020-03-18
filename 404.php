<?php
get_header();

?>

<main>
	<div class="wrapper wrapper--narrow">
		<h1>Page 404</h1>
		<p>Oups, la page que vous cherchez n'existe pas... ou n'existe plus</p>
		<a href="<?php echo esc_url(site_url('/')); ?>">Retourner à l'accueil</a>
	</div>
</main>


<?php
get_footer();