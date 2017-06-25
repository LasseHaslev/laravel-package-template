<?php namespace <% package.namespace %>\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use <% package.namespace %>\Http\Router;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Route;

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

        $this->registerEloquentFactories();

        $this->registerRouteFiles();
    }

    /**
     * Register routes
     *
     * @return void
     */
    protected function registerRouteFiles()
    {
        Route::group( ['middleware' => ['web']], function ( $router )
        {
            require( __DIR__ . '/../../routes/web.php' );
        } );
        Route::group( ['middleware' => ['api']], function ( $router )
        {
            require( __DIR__ . '/../../routes/api.php' );
        } );
    }

    /**
     * Register factories.
     *
     * @param  string  $path
     * @return void
     */
    protected function registerEloquentFactories()
    {
        $this->app->make(Factory::class)
            ->load(__DIR__.'/../../database/factories');
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
