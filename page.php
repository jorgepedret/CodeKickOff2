<?php get_header();?>
<section class="single-post">
	<?php
	if(have_posts()):while(have_posts()):the_post();
		?>
		<article class="post">
			<header>
				<h1 class="title"><?php the_title();?></h1>
			</header>
			<div class="entry">
				<?php the_content();?>
			</div>
		</article>
		<?php
		$counter++;
	endwhile;endif;
	?>
</section>
<aside class="sidebar">
	<header>
		<h3>Project Overview</h3>
	</header>
	<div class="description">
		
	</div>
</aside>
<?php get_footer();?>