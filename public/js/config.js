/* ------------------------------
 * Module config
 * ------------------------------
 */
app.config(function($stateProvider, $locationProvider, $urlRouterProvider, $pathToProvider){
	/*Friendly URL correction*/
 	$locationProvider.html5Mode(true);
 	
	/*Constant paths to public sub-folders*/
 	$pathToProvider
		.addPath({
			name:"jsFolder",
			folder:"js"
		})
		.addPath({
			name:"directivesFolder",
			folder:"directives",
			parent:"jsFolder"
		})
		.addPath({
			name:"viewsFolder",
			folder:"views"
		});

	/*Getting the paths defined by pathToProvider*/
	var pathTo = $pathToProvider.$get();

	/*UI-Router states*/
	$stateProvider
		.state({
			name: 'home',
			url:'/',
			templateUrl: pathTo.viewsFolder+'home.php',
			controller: 'HomeController'
		});

 	$urlRouterProvider.otherwise('/');
});