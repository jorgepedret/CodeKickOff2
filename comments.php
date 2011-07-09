<article class="comments">
	<?php comment_form(array(
		'title_reply' => 'What do you think of &ldquo;'.get_the_title().'&rdquo;?',
	)); ?>
	<?php if(have_comments()) : ?>
		<h3 id="comments-title"><?php
		printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'twentyten' ),number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
		?></h3>
		<ol class="commentlist">
			<?php wp_list_comments(array(
				'avatar_size'	=> 80
			)); ?>
		</ol>		
	<?php else : ?>
		<h3>Be the first one to comment</h3>
	<?php endif;?>
</article>