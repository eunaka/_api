<?php 
defined('BASE_PATH') OR exit('No direct script access allowed');

/* --------------------------------------------------
 * CONFIGS IMPORT
 * --------------------------------------------------
 */
require_once 'config.php';

/* --------------------------------------------------
 * READING URL
 * --------------------------------------------------
 */
$url = explode('/', $_SERVER['REQUEST_URI']);
array_shift($url);
array_shift($url);
if($_SERVER['HTTP_HOST']=='localhost') array_shift($url);
if(empty($url[count($url)-1])){
	unset($url[count($url)-1]);
}

/* --------------------------------------------------
 * LOADING FILES/OBJECTS/METHODS
 * --------------------------------------------------
 */
require_once CORE_PATH.'Controller.php';

if(isset($url[0])){
	#Load the controller
	if(file_exists(CONTROLLERS_PATH.$url[0].'.php')){
		require_once CONTROLLERS_PATH.$url[0].'.php';
		$_CONTROLLER = new $url[0];

		#Execute the controller method
		if(isset($url[1])){
			if(method_exists($_CONTROLLER, $url[1])){
				call_user_method($url[1], $_CONTROLLER);
			}
			else echo 'The '.CONTROLLERS_PATH.'<strong>'.$url[0].'.php</strong>'.' Class does not have <strong>'.$url[1].'( )</strong> method.';
		}
	}
	else echo 'The file '.CONTROLLERS_PATH.'<strong>'.$url[0].'.php</strong>'.' does not exist.';
}