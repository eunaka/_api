app.controller('PageController', function($scope, $location, $routeParams, $http){
	$scope.page = "PAGE";
	$scope.var = $routeParams.var;
	$scope.rst;

	$http.post('system/test/square', {num: $scope.var})
	.then(function(response){
		$scope.rst = response.data;
	});
});