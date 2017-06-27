<?php

namespace App\Providers;

use Ana\SalesforceService;
use Ana\SessionService;
use Illuminate\Support\ServiceProvider;

class AnaServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton(SalesForceService::class, function ($app) {
			return new SalesforceService(null);
		});
		$this->app->singleton(SessionService::class, function ($app) {
			return new SessionService($app["request"]);
		});
	}

}
