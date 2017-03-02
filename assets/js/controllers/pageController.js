app.controller('PageController', function($scope, $location, $routeParams){
	$scope.page = "PAGE";
	$scope.var = $routeParams.var;
});