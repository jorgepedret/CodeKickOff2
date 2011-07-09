<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
	
		wp_title( '|', true, 'right' );
	
		// Add the blog name.
		bloginfo( 'name' );
	
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
	
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
	
		?></title>
	
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory');?>/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory');?>/apple-touch-icon.png" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/style.css?v=0.4" />
	<script src="<?php bloginfo('stylesheet_directory');?>/js/libs/modernizr-1.6.min.js"></script>
	
	<script type="text/javascript">
	(function() {
	var s = document.createElement('SCRIPT'), s1 = document.getElementsByTagName('SCRIPT')[0];
	s.type = 'text/javascript';
	s.async = true;
	s.src = 'http://widgets.digg.com/buttons.js';
	s1.parentNode.insertBefore(s, s1);
	})();
	</script>
	
	<?php wp_head();?>
</head>
<body>
<div id="wrap">
	<header id="header">
		<div id="branding">
			<a href="<?php bloginfo('url');?>">
				<?php if(is_home()){ ?>
					<h1 class="logo"><span class="code">Code</span> <span class="kick">Kick</span> <span class="off">Off</span></h1>
				<?php } else { ?>
					<span class="logo"><span class="code">Code</span> <span class="kick">Kick</span> <span class="off">Off</span></span>
				<?php } ?>
			</a>
			<span class="slogan">Kick off your new web project</span>
		</div>
		<div id="beta-sign">Beta</div>
		<nav id="main-nav">
			<a href="<?php bloginfo('url');?>/">Home</a> | 
			<a href="<?php bloginfo('url');?>/create/"><strong>Create New Project</strong></a> | 
			<a href="<?php bloginfo('url');?>/news/">What&rsquo;s new?</a> | 
			<a href="#" onclick="UserVoice.Popin.show(uservoiceOptions); return false;">Feedback</a> |
			<a href="http://twitter.com/codekickoff">Twitter</a>
		</nav>
	</header>
	<article id="main">
		<div id="content">