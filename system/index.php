<?php
/* --------------------------------------------------
 * FOLDERS NAMES
 * --------------------------------------------------
 */
$core_folder = 'core';

$controllers_folder = 'controllers';

$libraries_folder = 'libraries';

$models_folder = 'models';

/* --------------------------------------------------
 * DEFINITION OF SOURCE PATHS
 * --------------------------------------------------
 */
define('BASE_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);

if(is_dir($core_folder)){
	define('CORE_PATH', BASE_PATH.$core_folder.DIRECTORY_SEPARATOR);
}
else die('Core folder was not set correctly.');

if(is_dir($controllers_folder)){
	define('CONTROLLERS_PATH', BASE_PATH.$controllers_folder.DIRECTORY_SEPARATOR);
}
else die('Controllers folder was not set correctly.');

if(is_dir($libraries_folder)){
	define('LIB_PATH', BASE_PATH.$libraries_folder.DIRECTORY_SEPARATOR);
}
else die('Libraries folder was not set correctly.');

if(is_dir($models_folder)){
	define('MODELS_PATH', BASE_PATH.$models_folder.DIRECTORY_SEPARATOR);
}
else die('Models folder was not set correctly.');

/* --------------------------------------------------
 * 
 * --------------------------------------------------
 */
require_once CORE_PATH.'init.php';
?>