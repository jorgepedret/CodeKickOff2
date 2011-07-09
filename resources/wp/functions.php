<?php
function wp_debug($variable,$die=false){
	echo '<pre>'.print_r($variable, true).'</pre>';
	if($die) die();
}

// This theme uses post thumbnails
add_theme_support('post-thumbnails');
// Add default posts and comments RSS feed links to head
add_theme_support('automatic-feed-links');
 
%%general.wp.custom_post%%
%%general.wp.admin_config%%

/*
Shortcode sample
*/
function buttons_shortcode($atts,$content) {
	extract(shortcode_atts(array(
		'color' => 'green',
		'url' => '#',
	), $atts));
	return '<a href="'.$url.'" class="'.$color.'-button">'.$content.'<span class="arrow"></span></a>';
}
add_shortcode('button', 'buttons_shortcode');
?>