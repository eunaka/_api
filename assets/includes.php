<?php
/* --------------------------------------------------
 * FILES INCLUDES
 * --------------------------------------------------
 * There are 2 ways to include a file:
 * 		$load['type'][] = 'file_name';
 *		$load['type']['folder'][] = 'file_name';
 *
 * THE ORDER OF INCLUSIONS MATTER.
 */

/* --------------------------------------------------
 * assets/css/core/
 * --------------------------------------------------
 */
$load['css']['core'][] = 'bootstrap.min';
$load['css']['core'][] = 'bootstrap-theme.min';

/* --------------------------------------------------
 * assets/css/
 * --------------------------------------------------
 */
$load['css'][] = 'style';

/* --------------------------------------------------
 * assets/js/core/
 * --------------------------------------------------
 */
$load['js']['core'][] = 'angular.min';
$load['js']['core'][] = 'angular-route.min';
$load['js']['core'][] = 'jquery.min';
$load['js']['core'][] = 'bootstrap.min';

/* --------------------------------------------------
 * assets/js/
 * --------------------------------------------------
 */
$load['js'][] = 'app';
$load['js'][] = 'routes';

/* --------------------------------------------------
 * assets/js/controllers/
 * --------------------------------------------------
 */
$load['js']['controllers'][] = 'homeController';
$load['js']['controllers'][] = 'pageController';

