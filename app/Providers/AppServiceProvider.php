<?php

namespace App\Providers;

use App\View\Components\navbar;
use App\View\Components\navbar_user;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);

        View::composer('driver.layouts.partials.navbar', navbar::class);
        View::composer('user.layouts.partials.navbar', navbar_user::class);


    }
}
