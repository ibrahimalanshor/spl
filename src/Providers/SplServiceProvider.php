<?php

namespace Ibrahimalanshor\Spl\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Ibrahimalanshor\Spl\AccessInfo;

/**
 * SplServiceProvider
 */
class SplServiceProvider extends ServiceProvider {    
    
    /**
     * register
     *
     * @return void
     */
    public function register() {
        $this->app->bind('access-info', function() {
            return new AccessInfo();
        });
    }
    
    /**
     * boot
     *
     * @return void
     */
    public function boot() {
        $router = $this->app->make(Router::class);

        $router->aliasMiddleware('has-access-info', \Ibrahimalanshor\Spl\Http\Middleware\HasAccessInfo::class);
        $router->aliasMiddleware('has-permissions', \Ibrahimalanshor\Spl\Http\Middleware\HasPermissions::class);
        $router->aliasMiddleware('has-services', \Ibrahimalanshor\Spl\Http\Middleware\HasServices::class);
    }
}