<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Tag;
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
        $data = [
            'categories' => Category::whereActive(1)->select('id','name')->has('courses')->withCount('courses')->get(),
            'tags' => Tag::sewelect('name')->has('courses')->get(),
        ];
        View::share('data_sidebar',$data );
        Schema::defaultStringLength(191);
    }
}
