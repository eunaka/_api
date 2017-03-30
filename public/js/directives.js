app
.directive('modal', function() {
	return {
		restrict: 'AE',
		scope: {
			id: '@modalId',
			type: '@modalType',
			title: '@modalTitle',
		},
		transclude: true,
		templateUrl: directivesPath+'modal.html'
	};
})
;