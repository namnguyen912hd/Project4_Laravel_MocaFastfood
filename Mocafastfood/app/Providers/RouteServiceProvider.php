<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();


        // route admin
        $this->mapAdminCategoryRoutes();
        $this->mapAdminMenuRoutes();
        $this->mapAdminProductRoutes();
        $this->mapAdminRoleRoutes();
        $this->mapAdminPermissionRoutes();
        $this->mapAdminUserRoutes();
        $this->mapAdminSettingRoutes();
        $this->mapAdminOrderRoutes();

        // route home
        $this->mapClientAccountRoutes();
        $this->mapClientOrderRoutes();
        $this->mapClientCartRoutes();
        $this->mapClientProductRoutes();


    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/web.php'));
    }

    // ROUTE ADMIN
    protected function mapAdminCategoryRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/category.php'));
    }

    protected function mapAdminMenuRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/menu.php'));
    }


    protected function mapAdminProductRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/product.php'));
    }

    protected function mapAdminRoleRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/role.php'));
    }

    protected function mapAdminPermissionRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/permission.php'));
    }

    protected function mapAdminUserRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/user.php'));
    }

    protected function mapAdminSettingRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/setting.php'));
    }

    protected function mapAdminOrderRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin/order.php'));
    }


    // ROUTE HOMEPAGE
    
    protected function mapClientOrderRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/client/order.php'));
    }

    protected function mapClientCartRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/client/cart.php'));
    }

    protected function mapClientProductRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/client/product.php'));
    }

    protected function mapClientAccountRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/client/account.php'));
    }



















    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api.php'));
    }
}
