<?php

$host_name = 'localhost/_api';

$load['css']['core'] = array(
	'bootstrap.min',
	'bootstrap-theme.min'
);

$load['css']['custom'] = array(
	'style'
);

$load['js']['core'] = array(
	'angular.min',
	'angular-route.min',
	'jquery.min',
	'bootstrap.min',
	'app',
	'routes'
);

$load['js']['controllers'] = array(
	'home',
	'page'
);

$assets_link = $_SERVER['REQUEST_SCHEME'].'://'.$host_name.'/assets/';

?>
<html ng-app="app">
<head>
	<?php 
	echo '<!-- CSS CORE -->';
	foreach ($load['css']['core'] as $file) {
		echo '<link rel="stylesheet" type="text/css" href='.$assets_link.'css/core/'.$file.'.css>';
	}
	echo '<!-- CSS CUSTOM  -->';
	foreach ($load['css']['custom'] as $file) {
		echo '<link rel="stylesheet" type="text/css" href='.$assets_link.'css/'.$file.'.css>';
	}
	echo '<!-- JAVASCRIPT CORE  -->';
	foreach ($load['js']['core'] as $file){
		if($file == 'app' || $file == 'routes'){
			echo '<script src='.$assets_link.'js/'.$file.'.js></script>';
		}
		else echo '<script src='.$assets_link.'js/core/'.$file.'.js></script>';
	}
	echo '<!-- ANGULAR CONTROLLERS -->';
	foreach ($load['js']['controllers'] as $file){
		echo '<script src='.$assets_link.'js/controllers/'.$file.'Controller.js></script>';
	}
	?>
	<!-- ANGULAR ROUTE BASE -->
	<base href="/_api/">
</head>
<ng-view><ng-view>