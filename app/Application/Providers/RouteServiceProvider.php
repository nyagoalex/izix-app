<?php

namespace App\Application\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
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
        $this->configureRateLimiting();

        $this->routes(function () {
            $route = Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        $this->registerDomainRoutes();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    public function registerDomainRoutes()
    {
        if (!file_exists(base_path('app/Domain'))) {
            return;
        };

        $Domain = array_diff(scandir(base_path('app/Domain')), array('.', '..'));

        foreach ($Domain as $domain) {
            $dirPath = base_path('app/Domain/') . $domain;

            if (!is_dir($dirPath)) {
                continue;
            }


            $dirs = array_diff(scandir(base_path('app/Domain/' . $domain)), array('.', '..'));
            $routesDirExists = in_array('Routes', $dirs);
            if (!$routesDirExists) {
                Log::info("$domain Domain missing routes directory. Can't register routes");
                continue;
            }

            $domainRouteFiles = array_diff(scandir(base_path('app/Domain/' . $domain . '/Routes')), array('.', '..'));
            foreach ($domainRouteFiles as $file) {
                Route::middleware('api')
                    ->prefix('api')
                    ->group(base_path('app/Domain/' . $domain . '/Routes/' . $file));
            }
        }
    }
}
