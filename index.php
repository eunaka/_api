<?php

/* --------------------------------------------------
 * FOLDERS AND FILE NAMES
 * --------------------------------------------------
 * Defines the name of the assets folder and the PHP
 * witch helds the the $load variable.
 */

$assets_folder = 'assets';
$include_file = 'includes';

/* --------------------------------------------------
 * HOST NAME
 * --------------------------------------------------
 * Change host if the assets files are in other server,
 * or leave to system do it.
 *
 * If you are in localhost and uses a suffix in host
 * name, then define it here.
 * Ex.:
 *		For http://localhost/folder/
 *		Use $localhost_suffix = 'folder/';
 */

$localhost_suffix = '_api/';
$host_name = $_SERVER['HTTP_HOST'].$localhost_suffix;

/* --------------------------------------------------
 * END OF CUSTOMIZATION
 * --------------------------------------------------
 */

# Base constants
define('ASSETS_LINK', $_SERVER['REQUEST_SCHEME'].'://'.$host_name.$assets_folder.'/');
define('ASSETS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.$assets_folder.DIRECTORY_SEPARATOR);

# Require of $load variables
require_once ASSETS_PATH.$include_file.'.php';

?>
<html ng-app="app">
<head>
	<?php
	# Function to simplificate the include of a file.
	function include_file($type, $link){
		if ($type == 'css') {
			echo '<link rel="stylesheet" type="text/css" href='.$link.'>';
		}elseif ($type == 'js') {
			echo '<script src='.$link.'></script>';
		}
	}

	/* --------------------------------------------------
	 * INCLUSION OF FILES
	 * --------------------------------------------------
	 * $k1 holds the type of the file (CSS / JS);
	 * $v1 is aways an array;
	 * $k2 is a folder name if $v2 is an array;
	 * $k2 is a number if $v2 is a filename;
	 * If $v2 is an array each $file is a file name;
	 * 
	 * Ex.:
	 * $k1.'/'.$v2.'.'.$k1 can be css/style.css
	 * $k1.'/'.$k2.'/'.$file.'.'.$k1 can be js/controllers/homeController.js
	 */
	foreach ($load as $k1 => $v1) {
		$link = NULL;
		foreach ($v1 as $k2 => $v2) {
			$path = ASSETS_PATH.$k1.DIRECTORY_SEPARATOR;
			if(is_array($v2)){
				$path .= $k2.DIRECTORY_SEPARATOR;
				is_dir($path) OR die($path.' is not a directory.');
				foreach ($v2 as $file) {
					if(file_exists($path.$file.'.'.$k1)){
						include_file($k1, ASSETS_LINK.$k1.'/'.$k2.'/'.$file.'.'.$k1);
					}
				}
			}elseif (file_exists($path.$v2.'.'.$k1)) {
				include_file($k1, ASSETS_LINK.$k1.'/'.$v2.'.'.$k1);
			}
		}
	}
	?>
	<!-- ANGULAR ROUTE BASE -->
	<base href="/_api/">
</head>
<ng-view><ng-view>