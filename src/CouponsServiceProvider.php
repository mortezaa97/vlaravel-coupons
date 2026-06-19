<?php

declare(strict_types=1);

namespace Mortezaa97\Coupons;

use Mortezaa97\Coupons\Concerns\PublishesPackageAssets;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Mortezaa97\Coupons\Models\Coupon;
use Mortezaa97\Coupons\Policies\CouponPolicy;

class CouponsServiceProvider extends ServiceProvider
{
    use PublishesPackageAssets;

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');

        // Register policies
        Gate::policy(Coupon::class, CouponPolicy::class);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('coupons.php'),
            ], 'config');

            $this->publishPackageAssets('coupons');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'coupons');

        // Register the main class to use with the facade
        $this->app->singleton('coupons', function () {
            return new Coupons;
        });

        $this->app->alias('coupons', Coupons::class);
        
    }
}
