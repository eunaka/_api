app.controller('HomeController', function($scope, $state, $http){
	$scope.home = "HOME";

	$scope.return;
	$scope.return2;

	$http.post('system/test/square', {num: 10})
	.then(function(response){
		$scope.return = response.data;
	});

	$http.post('system/test/test', {id: 10, name:'Test'})
	.then(function(response){
		$scope.return2 = response.data;
	});
});