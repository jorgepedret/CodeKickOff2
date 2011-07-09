<?php get_header();?>
<section class="single-post">
	<?php
	if(have_posts()):while(have_posts()):the_post();
		?>
		<article class="post">
			<header>
				<h1 class="title"><?php the_title();?></h1>
				<div class="meta"><small class="date">Posted on <?php the_date();?> by <?php the_author();?></small></div>
			</header>
			<div class="entry">
				<?php the_content();?>
			</div>
		</article>
		<?php comments_template( '', true ); ?>
		<?php
		$counter++;
	endwhile;endif;
	?>
</section>
<aside class="sidebar">
	<?php get_sidebar(); ?>
</aside>
<?php get_footer();?>