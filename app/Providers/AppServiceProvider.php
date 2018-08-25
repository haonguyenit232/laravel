<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(Schema::hasTable('categories'))
        {
            $shareCategories = Category::where('parent_id', config('setting.default_parent_id'))->get();
            View::share('shareCategories', $shareCategories);
        }
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
