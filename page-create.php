<?php
/*
Template Name: Create 2
*/
?>
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
				<?php gravity_form(1, false, false, false, null, true); ?>
			</div>
		</article>
		<?php
		$counter++;
	endwhile;endif;
	?>
</section>
<aside class="sidebar" id="create-sidebar">
	<div class="wrapper">
		<header>
			<h3>Project Overview</h3>
		</header>
		<div class="description">
			<ol class="top-level">
				<li class="setting" id="general-tab">
					<h4 class="title">General Settings</h4>
					<div class="saved">
						<ul>
							<li id="setting-project-name"><strong class="label">Project Name:</strong> <span class="value">Project Name</span></li>
						</ul>
					</div>
				</li>
				<li class="setting" id="bp-tab">
					<h4 class="title">HTML5 Boilerplate</h4>
					<div class="saved">
						<ul>
							<li id="setting-bp-platform"><strong class="label">Platform:</strong> <span class="value"></span></li>
						</ul>
					</div>
				</li>
				<li class="setting" id="compass-tab">
					<h4 class="title">Compass</h4>
					<div class="saved">
						<ul>
							<li id="setting-compass-libs"><strong class="label">Modules:</strong> <span class="value">1, 2 and 3</span></li>
						</ul>
					</div>
				</li>
				<li class="setting" id="grid-tab">
					<h4 class="title">CSS Grid</h4>
					<div class="saved">
						<ul>
							<li id="setting-grid-system"><strong class="label">Grid:</strong> <span class="value">Less Framework</span></li>
						</ul>
					</div>
				</li>
				<li class="setting" id="wp-tab">
					<h4 class="title">Wordpress</h4>
					<div class="saved">
						<ul>
							<li id="setting-wp-custom"><strong class="label">Include Custom Type:</strong> <span class="value">Yes</span></li>
							<li id="setting-wp-admin"><strong class="label">Include Admin Config:</strong> <span class="value">Yes</span></li>
						</ul>
					</div>
				</li>
				<li class="setting" id="drupal-tab">
					<h4 class="title">Drupal</h4>
				</li>
			</ol>
			<div class="download">
				<a href="#" class="download-btn"><span>Download</span></a>
			</div>
		</div>
	</div>
</aside>
<?php get_footer();?>