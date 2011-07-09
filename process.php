<?php
ini_set('error_reporting',~E_ALL);
error_reporting(~E_ALL);
/*
Template Name: Process Request
*/
define('RESOURCES_DIR',ABSPATH.'resources/');

function my_log($message){
	//echo $message.'<br />';
}

function clean_str($str){
	$new_str = '';
	$new_str = str_replace(array('/','\\','.'),'',$str);
	return $new_str = preg_replace('/[^(\x20-\x7F)\x0A]*/','', $new_str);
}


if(isset($_POST) && count($_POST)){

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
	
	$dest_name = ABSPATH.'temp/'.$project_slug.'-'.substr(md5(date(DateTime::COOKIE)),0,5).'.zip';
	Zip($project_dir, $dest_name);
	if(!headers_sent()){
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		header("Content-Type: application/zip");
		header("Content-Disposition: attachment; filename=".basename($dest_name).";" );
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".filesize($dest_name));
		readfile($dest_name);
		
		$message = 'New Project downloaded:<br />
		<pre>'.print_r($_POST,true).'</pre>';
		$headers = 'From: Code Kick Off <info@codekickoff.com>'."\r\n";
		wp_mail('jorge@codekickoff.com','Project Downloaded',$message,$headers);
	} else {
		$message = 'Something went wrong when trying to download a project:<br />
		<pre>'.print_r($_POST,true).'</pre>';
		$headers = 'From: Code Kick Off <info@codekickoff.com>'."\r\n";
		wp_mail('jorge@codekickoff.com','Download Error',$message,$headers);
	}
	
	deleteDir($project_dir);
	
} else {
	header('Location: '.get_bloginfo('url').'/create/');
}
?>