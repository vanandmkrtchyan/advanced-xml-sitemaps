<?php
/**
 * Created by PhpStorm.
 * User: Comp
 * Date: 9/30/2016
 * Time: 4:07 PM
 */

namespace ReviewsBee\Providers;

use Illuminate\Support\ServiceProvider;
use ReviewsBee\ReviesBee;

class ReviewsBeeServiceProvider extends ServiceProvider
{

    const version = '1.0.0';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot(){

        $this->publishes( [ __DIR__.'/../config/config.php' => config_path('reviewsbee.php'), ], 'config' );

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
        $this->app->singleton( 'reviewsbee', ReviesBee::class );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['reviewsbee', 'ReviewsBee\ReviesBee'];
    }
}