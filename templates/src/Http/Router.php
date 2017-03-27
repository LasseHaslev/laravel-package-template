<?php

namespace <% package.namespace %>\Http;

use LasseHaslev\LaravelPackageRouter\PackageRouter;
use Illuminate\Support\Facades\Route;
use <% package.namespace %>\Http\Controllers\<% model.plural %>Controller;

/**
 * Class ImageRouter
 * @author Lasse S. Haslev
 */
class Router extends PackageRouter
{

    /**
     * Create web routes
     *
     * @return void
     */
    public function web()
    {
        Route::get( '<% model.instance.plural %>', '\\' .<% model.plural %>Controller::class . '@index' )
            ->name( '<% package.name %>.<% model.instance.plural %>.index' );
        Route::get( '<% model.instance.plural %>/create', '\\' .<% model.plural %>Controller::class . '@create' )
            ->name( '<% package.name %>.<% model.instance.plural %>.create' );
        Route::post( '<% model.instance.plural %>/store', '\\' .<% model.plural %>Controller::class . '@store' )
            ->name( '<% package.name %>.<% model.instance.plural %>.store' );
        Route::get( '<% model.instance.plural %>/{<% model.instance.single %>}', '\\' .<% model.plural %>Controller::class . '@show' )
            ->name( '<% package.name %>.<% model.instance.plural %>.show' );
        Route::get( '<% model.instance.plural %>/{<% model.instance.single %>}/edit', '\\' .<% model.plural %>Controller::class . '@edit' )
            ->name( '<% package.name %>.<% model.instance.plural %>.edit' );
        Route::put( '<% model.instance.plural %>/{<% model.instance.single %>}', '\\' .<% model.plural %>Controller::class . '@update' )
            ->name( '<% package.name %>.<% model.instance.plural %>.update' );
        Route::delete( '<% model.instance.plural %>/{<% model.instance.single %>}', '\\' .<% model.plural %>Controller::class . '@destroy' )
            ->name( '<% package.name %>.<% model.instance.plural %>.destroy' );
    }

}
