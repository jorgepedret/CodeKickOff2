<?php
/*
Template Name: News
*/
?>
<?php get_header();?>
<section class="multiple-posts">
	<header>
		<h1>What&rsquo;s New?</h1>
	</header>
	<?php
	query_posts(array(
		'numberposts'	=> 0,
	));
	$counter = 1;
	if(have_posts()):while(have_posts()):the_post();
		?>
		<article class="post <?php echo $counter%2?'odd':'even'?>">
			<header>
				<h2 class="title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>
				<div class="meta"><small class="date">Posted on <?php the_date();?> by <?php the_author();?></small></div>
			</header>
			<div class="entry">
				<?php the_excerpt();?>
			</div>
		</article>
		<?php
		$counter++;
	endwhile;endif;
	?>
</section>
<aside class="sidebar">
	<?php get_sidebar(); ?>
</aside>
<?php get_footer();?>