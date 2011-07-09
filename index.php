<?php get_header();?>
<section class="explain">
	<article id="what">
		<header>
			<h2>What?</h2>
		</header>
		<div class="description">
			<p>Code Kick Off lets you choose and integrate technologies like <a href="http://html5boilerplate.com/">HTML5 boilerplate</a>, <a href="http://compass-style.org/">Compass</a>, different CSS grid frameworks &amp; <a href="http://wordpress.org/">Wordpress</a>, to start new web projects faster.</p>
		</div>
	</article>
	<article id="why">
		<header>
			<h2>Why?</h2>
		</header>
		<div class="description">
			<p>There are tons of new cool technologies out there that are helping us develop faster &amp; faster. Code Kick Off goes one step further by integrating all these technologies in one place.</p>
		</div>
	</article>
	<article id="how">
		<header>
			<h2>How?</h2>
		</header>
		<div class="description">
			<p>You enter your project&rsquo;s settings and choose the technologies you work with. Code Kick Off will create a <code>.zip</code> file with a set of files ready to be used.</p>
			<div class="invite-button">
				<a href="<?php bloginfo('url');?>/create/" class="start-btn">Start Now &rarr;</a>
			</div>
		</div>
	</article>
</section>
<article id="start-invite">
	<div class="wrap">
		<header>
			<h2>Try it now!</h2>
		</header>
		<div class="description">
			<ul>
				<li>Code Kick Off is <strong>completely free</strong></li>
				<li>It takes 5 seconds to setup a new project</li>
				<li>You can choose the technologies that you want to work with</li>
			</ul>
			<div class="invite-button">
				<a href="<?php bloginfo('url');?>/create/" class="start-btn">Give it a try!</a>
			</div>
		</div>
	</div>
</article>
<article id="beta">
	<div class="wrap">
		<header>
			<h2>We&rsquo;re in beta. Tell us what you think!</h2>
		</header>
		<div class="description">
			<p>We&rsquo;d love to hear your thougts on Code Kick Off!</p>
			<ul>
				<li>What other tools you'd like us to integrate?</li>
				<li>What do you feel is missing?</li>
				<li>How can we make it even easier?</li>
			</ul>
			<p>Send your ideas <a href="http://codekickoff.uservoice.com/">here</a> or give us a shout in <a href="http://twitter.com/codekickoff">Twitter!</a></p>
			<ul class="share">
				<li class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-url="http://codekickoff.com/" data-text="I just tried @codekickoff and it was awesome!" data-count="vertical" data-via="codekickoff">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
				<li class="digg"><a class="DiggThisButton DiggMedium" href="http://digg.com/submit?url=<?php urlencode('http://codekickoff.com/')?>&amp;title=<?php urlencode('Code Kick Off: Kick Off Your New Web Project')?>" rev="technology"><span style="display:none">Code Kick Off is an application that lets you choose and integrate technologies like HTML5 boilerplate, Compass, different CSS grid frameworks & Wordpress, to start new web projects faster.</span></a></li>
				<li class="facebook"><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fcodekickoff.com%2F&amp;layout=box_count&amp;show_faces=true&amp;width=200&amp;action=recommend&amp;font=arial&amp;colorscheme=light&amp;height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:65px;" allowTransparency="true"></iframe></li>
			</ul>
		</div>
	</div>
</article>
<article id="whats-new">
	<header>
		<h2>What's new?</h2>
	</header>
	<div class="description">
		<?php
		query_posts('numberposts=3');
		$counter = 1;
		if(have_posts()):while(have_posts()):the_post();
			if($counter > 3){
				break;
			}
			?>
			<article class="post <?php echo $counter==1?'first':'';?> <?php echo $counter==3?'last':''?>">
				<header>
					<h3 class="title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
					<div class="meta"><small class="date">Posted on <?php the_date();?> by <?php the_author();?></small></div>
				</header>
				<div class="entry">
					<?php the_excerpt();?>
				</div>
			</article>
			<?php
			$counter++;
		endwhile;endif;
		//Reset Query
		wp_reset_query();
		?>
		<div class="clear"></div>
		<div style="width:300px;margin-right:30px;float:left;">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-7822138632410714";
			/* Code Kick Off Home Page */
			google_ad_slot = "4175514296";
			google_ad_width = 300;
			google_ad_height = 250;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div>
		<div style="width:300px;margin-right:30px;float:left;">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-7822138632410714";
			/* Code Kick Off Home Page */
			google_ad_slot = "4175514296";
			google_ad_width = 300;
			google_ad_height = 250;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div>
		<div style="width:300px;float:left;">
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-7822138632410714";
			/* Code Kick Off Home Page */
			google_ad_slot = "4175514296";
			google_ad_width = 300;
			google_ad_height = 250;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</div>
		<div class="clear"></div>
	</div>
</article>
<?php get_footer();?>