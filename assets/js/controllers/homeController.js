app.controller('HomeController', function($scope, $location, $routeParams, $http){
	$scope.home = "HOME";
	$scope.link = function(){
		$location.path("/page/teste");
	}
	$http.post('system/test.php', {teste: 'teste'})
	.then(function(response){
		console.log(response.data);
	});
});