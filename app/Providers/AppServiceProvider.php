<?php

namespace App\Providers;

use App\Models\Producto;
use App\Policies\ProductoPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        /**
         * Registrar Politicas Manualmente
         * @param Model,
         * @param ModelPolicy
         */

        Gate::policy(Producto::class, ProductoPolicy::class);
    }
}
