/* ------------------------------
 * Angular UI-Router config
 * ------------------------------
 */
app.config(function($stateProvider, $locationProvider, $urlRouterProvider){
 	$locationProvider.html5Mode(true);

	$stateProvider
	.state({
		name: 'home',
		url:'/',
		templateUrl: viewsPath+'home.php',
		controller: 'HomeController'
	});

 	$urlRouterProvider.otherwise('/');
});