<?php
/* Template Name: Process 2 */

ini_set('display_errors',0);
error_reporting(~E_ALL);

if(!isset($_POST) || count($_POST) <= 0){
	header('Location: '.get_bloginfo('url').'/create/');
	exit();
}

?>
<?php get_header();?>
<article id="packaging">
	<header>
		<h1>Packaging your new project</h1>
	</header>
	<div class="description">
		<ul id="packaging-process">
			<li id="conf-base"><span class="iconic check"></span> Configuring Base Frame</li>
			<li id="conf-compass"><span class="iconic check"></span> Configuring Compass</li>
			<li id="conf-grid"><span class="iconic check"></span> Configuring CSS Grid</li>
			<li id="conf-cms"><span class="iconic check"></span> Configuring CMS</li>
			<li id="conf-packaging"><span class="iconic check"></span> Packaging</li>
		</ul>
	</div>
</article>
<article id="start-invite">
	<div class="wrap">
		<header>
			<h2>So, what do you think?</h2>
		</header>
		<div class="description">
			<p>Tell us how you liked Code Kick Off!</p>
			<ul class="share">
				<li class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-url="http://codekickoff.com/" data-text="I just tried @codekickoff and it was..." data-count="horizontal" data-via="codekickoff">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
				<li class="facebook-share"><a name="fb_share" style="position:relative;top:-5px;" type="button_count" share_url="<?php echo $url?>">Share it</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share"></script></li>
			</ul>
		</div>
	</div>
</article>
<article id="beta">
	<div class="wrap">
		<header>
			<h2>Tell your friends!</h2>
		</header>
		<div class="description">
			<p>If you like what you saw, tell your friends now!</p>
			<ul>
				<li>Code Kick Off is <strong>completely free</strong></li>
				<li>It takes 5 seconds to setup a new project</li>
				<li>You can choose the technologies that you want to work with</li>
			</ul>
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
	</div>
</article>
<?php
define('RESOURCES_DIR', TEMPLATEPATH.'/resources/');

function my_log($message){
	//echo $message.'<br />';
}

function clean_str($str){
	$new_str = '';
	$new_str = str_replace(array('/','\\','.'),'',$str);
	return $new_str = preg_replace('/[^(\x20-\x7F)\x0A]*/','', $new_str);
}


$s = $_POST;

//wp_debug($s,false);

$project_slug = sanitize_title(get_value($s['general']['name'],'Code Kick Off'));
$project_dir = ABSPATH.'temp/'.$project_slug.'';

if(is_dir($project_dir)){
	deleteDir($project_dir);
}

my_log('Slug: '.$project_slug);
my_log('Dir: '.$project_dir);

$html_base_dir = 'base';
if(get_value($s['general']['include']['bp']) == 1){
	smartCopy(RESOURCES_DIR.'boilerplate-undocumented', $project_dir);
	$html_base_dir = 'boilerplate-undocumented';
	
	switch(get_value($s['general']['bp']['platform'])){
		case 'iis':
			my_log('Base: Boilerplate for IIS');
			unlink($project_dir.'/nginx.conf');
			unlink($project_dir.'/.htaccess');
			break;
		case 'nginx':
			my_log('Base: Boilerplate for NGINX');
			unlink($project_dir.'/web.config');
			unlink($project_dir.'/.htaccess');
			break;
		case 'apache':
		default:
			my_log('Base: Boilerplate for Apache');
			unlink($project_dir.'/web.config');
			unlink($project_dir.'/nginx.conf');
			break;
	}
	
} else {
	my_log('Base: Basic');
	smartCopy(RESOURCES_DIR.'/base/', $project_dir);
}

//Configuring directories
$s['general']['css_dir'] = clean_str(get_value($s['general']['css_dir'],'css'));
if(basename($project_dir.'/css') !== get_value($s['general']['css_dir'],'css')){
	rename($project_dir.'/css', $project_dir.'/'.get_value($s['general']['css_dir'],'css'));
}

$s['general']['img_dir'] = clean_str(get_value($s['general']['img_dir'],'img'));
if(basename($project_dir.'/images') !== get_value($s['general']['img_dir'],'img')){
	rename($project_dir.'/images', $project_dir.'/'.get_value($s['general']['img_dir'],'img'));
}

$s['general']['js_dir'] = clean_str(get_value($s['general']['js_dir'],'js'));
if(basename($project_dir.'/js') !== get_value($s['general']['js_dir'],'js')){
	rename($project_dir.'/js', $project_dir.'/'.get_value($s['general']['js_dir'],'js'));
}



$index_file = 'index.html';
// If it is a Wordpress theme
if(get_value($s['general']['include']['wp']) == 1){
	my_log('Including Wordpress theme');
	// Change index.html to php
	rename($project_dir.'/index.html', $project_dir.'/index.php');
	//Processing the index.php file
	$replaces = array(
		'%%general.wp.wp_head%%' 	=> '<?php wp_head(); ?>',
		'%%general.wp.wp_foot%%' 	=> '<?php wp_footer(); ?>',
		'%%general.css_dir%%' 		=> '<?php bloginfo("stylesheet_directory");?>/'.$s['general']['css_dir'],
		'%%general.img_dir%%' 		=> '<?php bloginfo("stylesheet_directory");?>/'.$s['general']['img_dir'],
		'%%general.js_dir%%' 		=> '<?php bloginfo("stylesheet_directory");?>/'.$s['general']['js_dir'],
	);
	
	rename($project_dir.'/.htaccess', $project_dir.'/htaccess.txt');
	
	
	//Create the functions.php file
	$fh = fopen($project_dir.'/index.php','w');
	//Get the content from the base styles file
	$base_content = file_get_contents(RESOURCES_DIR.$html_base_dir.'/index.html');
	$new_content = str_replace( array_keys($replaces),$replaces,$base_content);
	//Write the content to the new file created
	fwrite($fh, $new_content);
	fclose($fh);
	$index_file = 'index.php';
	
	
	
	
	//Create the style.css file
	$fh = fopen($project_dir.'/style.css','w');
	//Get the content from the base styles file
	$base_style_content = file_get_contents(RESOURCES_DIR.'wp/style.css');
	//Replace the variables
	$replaces = array('%%general.name%%' => $s['general']['name']);
	$new_content = str_replace( array_keys($replaces),$replaces,$base_style_content);
	//Write the content to the new file created
	fwrite($fh, $new_content);
	fclose($fh);
	
	
	
	smartCopy(RESOURCES_DIR.'wp/admin',$project_dir.'/admin');
	
	
	//Processing the functions.php file
	$replaces = array();
	if(!is_dir($project_dir.'/admin')){
		@mkdir($project_dir.'/admin');
	}
	if(get_value($s['general']['wp']['custom_post']) == 1){
		smartCopy(RESOURCES_DIR.'wp/admin/custom-post.php',$project_dir.'/admin/custom-post.php');
		$replaces['%%general.wp.custom_post%%'] = "require('admin/custom-post.php');";
	} else {
		$replaces['%%general.wp.custom_post%%'] = "";
		unlink($project_dir.'/admin/custom-post.php');
	}
	if(get_value($s['general']['wp']['admin_config']) == 1){
		smartCopy(RESOURCES_DIR.'wp/admin/admin-config.php',$project_dir.'/admin/admin-config.php');
		$replaces['%%general.wp.admin_config%%'] = "require('admin/admin-config.php');";
	} else {
		$replaces['%%general.wp.admin_config%%'] = "";
		unlink($project_dir.'/admin/admin-config.php');
	}
	//Create the functions.php file
	$fh = fopen($project_dir.'/functions.php','w');
	//Get the content from the base styles file
	$base_content = file_get_contents(RESOURCES_DIR.'wp/functions.php');
	$new_content = str_replace( array_keys($replaces),$replaces,$base_content);
	//Write the content to the new file created
	fwrite($fh, $new_content);
	fclose($fh);
	
	
	
	//Copying screenshot.png file
	smartCopy(RESOURCES_DIR.'wp/screenshot.png',$project_dir.'/screenshot.png');
} else {
	$fh = fopen($project_dir.'/index.html','w');
	//Get the content from the base styles file
	$base_content = file_get_contents(RESOURCES_DIR.'/'.$html_base_dir.'/index.html');
	//Replace the variables
	$replaces = array(
		'%%general.wp.wp_head%%' 	=> '',
		'%%general.wp.wp_foot%%' 	=> '',
		'%%general.css_dir%%' 		=> $s['general']['css_dir'],
		'%%general.img_dir%%' 		=> $s['general']['img_dir'],
		'%%general.js_dir%%' 		=> $s['general']['js_dir'],
	);
	$new_content = str_replace( array_keys($replaces),$replaces,$base_content);
	//Write the content to the new file created
	fwrite($fh, $new_content);
	fclose($fh);
}




if(get_value($s['general']['include']['compass']) == 1){
	
	my_log('Including Compass');
	
	//Copy src dir
	smartCopy(RESOURCES_DIR.'compass/src',$project_dir.'/src');
	//Copy config file
	smartCopy(RESOURCES_DIR.'compass/config.rb',$project_dir.'/config.rb');
	
	$replaces = array(
		'%%general.lib.blueprint%%' 	=> '',
		'%%general.lib.css3%%' 			=> '',
		'%%general.lib.utilities%%' 	=> '',
		'%%general.lib.reset%%'			=> '',
		'%%general.lib.blueprint_base%%'=> '',
	);
	$libs = get_value($s['general']['compass']['lib'],array());
	foreach($libs as $lib){
		switch($lib){
			case 'css3':
				my_log('Including Compass module CSS3');
				$replaces['%%general.lib.css3%%'] = '@import "compass/css3";';
				break;
			case 'utilities':
				my_log('Including Compass module Utilities');
				$replaces['%%general.lib.utilities%%'] = '@import "compass/utilities";';
				break;
			case 'reset':
				my_log('Including Compass module Reset');
				$replaces['%%general.lib.reset%%'] = '@import "compass/reset";';
				break;
			case 'blueprint':
				my_log('Including Compass module Blueprint');
				$replaces['%%general.lib.blueprint%%'] = '@import "blueprint";';
				$replaces['%%general.lib.blueprint_base%%'] = '@import "partials/base";';
				break;
		}
	}
	$base_content = file_get_contents($project_dir.'/src/style.scss');
	$new_content = str_replace( array_keys($replaces),$replaces,$base_content);
	$fh = fopen($project_dir.'/src/style.scss','w');
	fwrite($fh,trim($new_content));
	fclose($fh);
	
	
	$replaces = array(
		'%%general.css_dir%%' => $s['general']['css_dir'],
		'%%general.img_dir%%' => $s['general']['img_dir'],
		'%%general.js_dir%%' => $s['general']['js_dir'],
	);
	$base_content = file_get_contents($project_dir.'/config.rb');
	$new_content = str_replace( array_keys($replaces),$replaces,$base_content);
	$fh = fopen($project_dir.'/config.rb','w');
	fwrite($fh,$new_content);
	fclose($fh);
	
	$fh = fopen($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css','w');
	fwrite($fh,'/* Don\'t edit this file. The source file is in /src/style.scss */');
	fclose($fh);
}
if(get_value($s['general']['include']['grid']) != null){
	if(get_value($s['general']['include']['grid']) == 'tfg'){
		my_log('Including TFG Grid');
		$columns 	= get_value($s['general']['grid']['tfg']['columns'],	12);
		$gutter 	= get_value($s['general']['grid']['tfg']['gutter'],		20);
		$minw 		= get_value($s['general']['grid']['tfg']['minw'],		800);
		$maxw 		= get_value($s['general']['grid']['tfg']['maxw'],		1200);
		
		$each_gutter = $gutter / ($columns*2);
		$each_column = (100 - $gutter) / $columns;
		
		$grid_styles = '';
		$grid_styles2 = array();
		for($i=1;$i<=$columns;$i++){
			$width = ($i * $each_column) + (($i-1)*2*$each_gutter);
			$grid_styles .= ".grid_".$i." { width:".$width."%; }\n";
			$grid_styles2[] = '.grid_'.$i;
		}
		
		$grid_styles2 = implode(",\n",$grid_styles2);
		$grid_styles2 .= '{';
		$grid_styles2 .= 'margin-left:'.$each_gutter.'%;';
		$grid_styles2 .= 'margin-right:'.$each_gutter.'%;';
		$grid_styles2 .= 'float:left;';
		$grid_styles2 .= 'display:block;';
		$grid_styles2 .= '}';
		
		$replaces = array(
			'%%general.grid.tfg.columns%% ' 	=> $s['general']['grid']['tfg']['columns'],
			'%%general.grid.tfg.gutter%% ' 		=> $s['general']['grid']['tfg']['gutter'],
			'%%general.grid.tfg.minw%%' 		=> $s['general']['grid']['tfg']['minw'],
			'%%general.grid.tfg.maxw%%' 		=> $s['general']['grid']['tfg']['maxw'],
			'%%general.grid.tfg.grid_widths%%'	=> $grid_styles,
			'%%general.grid.tfg.grid_gutters%%' => $grid_styles2
			
		);
		$base_content = file_get_contents(RESOURCES_DIR.'tfg/base.css');
		$count = 20;
		$new_content = str_replace( array_keys($replaces),$replaces,$base_content,$count);
		
		if(get_value($s['general']['include']['compass']) == 1){
			$fh = fopen($project_dir.'/src/partials/_grid.scss','w');
			fwrite($fh,$new_content);
			fclose($fh);
		} else {
			$replaces = array(
				'%%general.grid.styles%%' => $new_content,
			);
			$base_content = file_get_contents($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css');
			$new_content = str_replace( array_keys($replaces),$replaces,$base_content);
			$fh = fopen($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css','w');
			fwrite($fh,$new_content);
			fclose($fh);
		}
	}
	if(get_value($s['general']['include']['grid']) == 'less'){
		my_log('Including Less Framework Grid');
		switch(get_value($s['general']['grid']['less']['op'],15)){
			case 13:
				$base_content = file_get_contents(RESOURCES_DIR.'less/optimized-1.33.css');
				break;
			case 14:
				$base_content = file_get_contents(RESOURCES_DIR.'less/optimized-1.4.css');
				break;
			case 15:
			default:
				$base_content = file_get_contents(RESOURCES_DIR.'less/optimized-1.5.css');
				break;
		}
		if(get_value($s['general']['grid']['less']['retina']) == 1){
			$base_content2 = file_get_contents(RESOURCES_DIR.'less/retina.css');
			$base_content .= $base_content2;
		}
		if(get_value($s['general']['include']['compass']) == 1){
			$fh = fopen($project_dir.'/src/partials/_grid.scss','w');
			fwrite($fh,$base_content);
			fclose($fh);
		} else {
			$replaces = array(
				'%%general.grid.styles%%' => $base_content,
			);
			$base_content = file_get_contents($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css');
			$new_content = str_replace( array_keys($replaces),$replaces,$base_content);
			$fh = fopen($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css','w');
			fwrite($fh,$new_content);
			fclose($fh);
		}
	}
	if(get_value($s['general']['include']['grid']) == '960'){
		my_log('Including 960.gs Grid');
		$base_content = file_get_contents(RESOURCES_DIR.'960/base.css');
		if(get_value($s['general']['include']['compass']) == 1){
			$fh = fopen($project_dir.'/src/partials/_grid.scss','w');
			fwrite($fh,$base_content);
			fclose($fh);
		} else {
			$replaces = array(
				'%%general.grid.styles%%' => $base_content,
			);
			$base_content = file_get_contents($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css');
			$new_content = str_replace( array_keys($replaces),$replaces,$base_content);
			$fh = fopen($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css','w');
			fwrite($fh,$new_content);
			fclose($fh);
		}
	}
	if(get_value($s['general']['include']['grid']) == 'bp'){
		my_log('Including Blueprint Grid');
		$base_content = file_get_contents(RESOURCES_DIR.'blueprint/base.css');
		if(get_value($s['general']['include']['compass']) == 1){
			$fh = fopen($project_dir.'/src/partials/_grid.scss','w');
			fwrite($fh,$base_content);
			fclose($fh);
		} else {
			$replaces = array(
				'%%general.grid.styles%%' => $base_content,
			);
			$base_content = file_get_contents($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css');
			$new_content = str_replace( array_keys($replaces),$replaces,$base_content);
			$fh = fopen($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css','w');
			fwrite($fh,$new_content);
			fclose($fh);
		}
	}
} else {
	$replaces = array(
		'%%general.grid.styles%%' => '',
	);
	$base_content = file_get_contents($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css');
	$new_content = str_replace( array_keys($replaces),$replaces,$base_content);
	$fh = fopen($project_dir.'/'.get_value($s['general']['css_dir'],'css').'/style.css','w');
	fwrite($fh,$new_content);
	fclose($fh);
}
$rand = substr(md5(date(DateTime::COOKIE)),0,5);
$dest_name = ABSPATH.'temp/'.$project_slug.'-'.$rand.'.zip';
$dest_url = get_bloginfo('url').'/temp/'.$project_slug.'-'.$rand.'.zip';
Zip($project_dir, $dest_name);

$message = 'New Project downloaded:<br />
<pre>'.print_r($_POST,true).'</pre>';
$headers = 'From: Code Kick Off <info@codekickoff.com>'."\r\n";
wp_mail('jorge@codekickoff.com','Project Downloaded',$message,$headers);

deleteDir($project_dir);


function js_packager(){
global $dest_url;
?>
<script>
$(function(){
	function random(from, to){
		return Math.floor(Math.random() * (to - from + 1) + from);
	}

	var interval_id = window.setInterval(function(){
		if($('#packaging-process li:first[class!="done"]').length > 0){
			$('#packaging-process li:first[class!="done"]').addClass('done');
		} else {
			clearInterval(interval_id);
			document.location.href = "<?php echo $dest_url; ?>";
		}
	},random(200,400));
	function checkNext(){
		
	}
});
</script>
<?
}
add_action('wp_footer','js_packager');
?>
<?php get_footer();?>