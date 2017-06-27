var anaCampaingTncsApp = angular.module('anaCampaingTncsApp', ['ui.router', 'duScroll', 'pascalprecht.translate']);

anaCampaingTncsApp.config(function($stateProvider, $urlRouterProvider, $locationProvider, $provide) {

  $urlRouterProvider.otherwise('/');
	$stateProvider
      .state('tncs', {
        url: '/',
        abstract: true,
        templateUrl: '../_tncs.html',
        controller: 'anaCampaingTncsController'
      })
			// nested list with custom controller
      .state('tncs.basic_regulations', {
        url: '',
        templateUrl: '../_tncs_basic_regulations.html'
      })
      /*
			.state('tncs.campaign_prizes', {
        url: 'campaign-prizes',
        templateUrl: '../_tncs_campaign_prizes.html'
      })
      .state('tncs.eligibility', {
        url: 'eligibility',
        templateUrl: '../_tncs_eligibility.html'
      })
      .state('tncs.eligibleticket', {
        url: 'eligibleticket',
        templateUrl: '../_tncs_eligibleticket.html'
      })
      */
      .state('tncs.section_method', {
        url: 'section-method',
        templateUrl: '../_tncs_section_method.html'
      })
      /*
      .state('tncs.announcement_of_winner', {
        url: 'announcement-of-winner',
        templateUrl: '../_tncs_announcement_of_winner.html'
      })
      */
      .state('tncs.winner_conditions', {
        url: 'winner-conditions',
        templateUrl: '../_tncs_winner_conditions.html'
      })
      .state('tncs.temporary_interruption', {
        url: 'general',
        templateUrl: '../_tncs_general.html'
      })
      /*
      .state('tncs.inquiries', {
        url: 'inquiries',
        templateUrl: '../_tncs_inquiries.html'
      })*/
      ;
});

anaCampaingTncsApp.config(['$translateProvider', function ($translateProvider) {
  $translateProvider.useStaticFilesLoader({
    prefix: '../javascripts/anaCampaingApp/i18n/locale-',
    suffix: '.json'
  });
  $translateProvider.preferredLanguage('en');
}]);
