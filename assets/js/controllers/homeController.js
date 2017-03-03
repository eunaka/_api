app.controller('HomeController', function($scope, $location, $routeParams, $http){
	$scope.home = "HOME";

	$scope.return;

	$scope.link = function(){
		$location.path("/page/teste");
	}

	$http.post('system/test/home', {teste: 'teste'})
	.then(function(response){
		$scope.return = response.data;
	});
});