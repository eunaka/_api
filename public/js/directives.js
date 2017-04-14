app
.directive('modal', function($pathTo) {
	return {
		restrict: 'AE',
		scope: {
			id: '@modalId',
			type: '@modalType',
			title: '@modalTitle',
		},
		transclude: true,
		templateUrl: $pathTo.directivesFolder+'modal.html'
	};
})
;