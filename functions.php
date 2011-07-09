<?php
require('inc/utilities.php');
require('inc/CreateZipFile.inc.php');
//require('inc/CreateZipFileMac.zip.php');

if(function_exists('register_sidebar')){ 
	register_sidebar('blog-sidebar');
}

?>