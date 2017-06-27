anaCampaingTncsApp.controller('anaCampaingTncsController', ['$scope', '$sce', '$stateParams', '$translate', '$location', function($scope, $sce, $stateParams, $translate, $location){

}]);

anaCampaingTncsApp.directive('slidermenu', ['$timeout', function($timeout) {
  return {
    restrict: 'A',
    link: function(scope, element, attributes) {
      scope.$watch(attributes.slidermenu, function() {
        element.bxSlider({
				  minSlides: 2,
				  maxSlides: 4,
				  slideWidth: 240,
				  slideMargin: 0,
					pager: false,
					infiniteLoop: false,
  				//hideControlOnEnd: true
				});
      });
    }
  }
}]);
