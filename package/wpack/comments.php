<?php

if (post_password_required()) {
	return;
}

?>
<div class="comments">

	<?php if (have_comments()) : 
		$commentsNumber = get_comments_number(); ?>
		<p><strong><?php echo $commentsNumber; ?></strong> commentaire<?php $commentsNumber > 1 ? 's' : ''; ?> pour <?php the_title('<strong>', '</strong>'); ?></p>

		<?php 
			wp_list_comments(); ?>


	<?php endif; /* have_comments() */ ?>
	<?php comment_form(array(
		'class_submit' => 'comment-form__submit'
	)); ?>
</div>