<?php

namespace App\Providers;

use App\Models\Archive\Archive;
use App\Models\Tag\Tag;
use App\Observers\TagObserver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Model\Links;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Tag::observe(TagObserver::class);

        app('view')->composer('pc_home.commonIn', function ($view) {
            $view->with('allTags', Tag::where('status',2)->orderBy('weight','desc')->orderBy('created_at','desc')->skip(0)->take(48)->get())
                ->with('hot_tags',  Tag::where('status',2)->orderBy('weight','desc')->orderBy('updated_at','desc')->skip(0)->take(7)->get())
                ->with('links', Links::where('is_on',1)->orderBy('id', 'desc')->take(10)->get());
            ;
        });

        app('view')->composer('pc_home.commonOut', function ($view) {
            $view->with('links', Links::where('is_on',1)->orderBy('id', 'desc')->take(10)->get());
        });
        app('view')->composer('inc.top-slide', 'App\Http\Controllers\Home\IndexController@topSlide');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
