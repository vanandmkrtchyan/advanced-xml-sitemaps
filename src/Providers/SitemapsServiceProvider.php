<?php
/**
 * Created by PhpStorm.
 * User: Comp
 * Date: 9/30/2016
 * Time: 4:07 PM
 */

namespace Sitemaps\Providers;

use Illuminate\Support\ServiceProvider;

class SitemapsServiceProvider extends ServiceProvider
{

    const version = '1.0.0';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot(){

        //this->publishes( [ __DIR__.'/../config/config.php' => config_path('reviewsbee.php'), ], 'config' );
        $this->loadViewsFrom(__DIR__.'/../views', 'sitemap');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // TODO: Implement register() method.
        //$this->app->maske('reviewsbee');
    }

}