<?php namespace <% package.namespace %>\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use <% package.namespace %>\Http\Router;

/**
 * Class ServiceProvider
 * @author <% author.name %>
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../../config/<% package.name %>.php', '<% package.name %>');
        Router::create();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../../config/<% package.name %>.php'=>config_path('<% package.name %>.php')], 'config');
        $this->loadMigrationsFrom( __DIR__.'/../../database/migrations' );
        $this->loadViewsFrom( __DIR__.'/../../resources/views', '<% package.name %>' );

        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', '<% package.name %>');
        $this->publishes([ __DIR__.'/../../resources/lang', resource_path( 'lang/vendor/<% package.name %>' ) ], 'lang');
    }
}
