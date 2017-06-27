<?php namespace App\Providers;

use App\Services\Salesforce;
use Illuminate\Support\ServiceProvider;
/**
 * Class MacroServiceProvider
 * @package App\Providers
 */
class SalesforceServiceProvider extends \Illuminate\Auth\AuthServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        //
        $this->app['sf']->resolver(function($translator, $data, $rules, $messages) {
            return new \App\Services\Salesforce($translator, $data, $rules, $messages);
        });
        */
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        require_once dirname(dirname(__FILE__)) . "/Services/salesforce_tool/oauth.php";

        $this->app->bindShared('oauth', function($app)
        {
            $oauth = new Salesforce($app['html'], $app['url'], $app['session.store']->getToken());
            return $oauth->setSessionStore($app['session.store']);
        });
    }
}
