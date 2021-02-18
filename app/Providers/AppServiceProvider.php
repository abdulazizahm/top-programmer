<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Skill;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        view()->share('categories',Category::get());
        view()->share('skills',Skill::get());
        view()->share('pages',Page::get());
        Paginator::useBootstrap();
    }
}
