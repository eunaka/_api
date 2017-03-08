<?php
/**
 * <PROJECT_NAME>
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright 2017, Poli Júnior Engenharia
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	<PROJECT_NAME>
 * @author <AUTHOR>
 * @copyright 2017, <COPYRIGHT>
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link <REPOSITORY_LINK>
 */

/* --------------------------------------------------
 * FOLDERS AND FILE NAMES
 * --------------------------------------------------
 * Folder names used to define constant links in
 * index imports. If any folder or file used here
 * had its name changed and not changed here, the
 * imports and links will not work.
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
 * name, then define it here. If theres no suffix, 
 * set an empty string.
 * Ex.:
 *		For http://localhost/folder/
 *		Use $localhost_suffix = 'folder/';
 *
 *		For http://domain.com/
 *		Use $localhost_suffix = '';
 */

$localhost_suffix = '_api';
$host_name = $_SERVER['HTTP_HOST'];

/* --------------------------------------------------
 * END OF CUSTOMIZATION
 * --------------------------------------------------
 */

# Base constants
if(!empty($localhost_suffix)){
	$host_name .= '/'.$localhost_suffix;
}
define('ASSETS_LINK', $_SERVER['REQUEST_SCHEME'].'://'.$host_name.'/'.$assets_folder.'/');
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
	<base href=<?= "/".$localhost_suffix."/" ?>>
</head>
<ng-view><ng-view>