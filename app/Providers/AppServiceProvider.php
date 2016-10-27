<?php

namespace App\Providers;

use App\Models\Tag\Tag;
use App\Observers\TagObserver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        Tag::creating(function ($tag) {
//            dd($tag);
//        });
        Tag::observe(TagObserver::class);
        $allTags = Tag::where('status',2)->orderBy('weight','desc')->orderBy('created_at','desc')->skip(0)->take(48)->get();
        View::share('allTags', $allTags);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
//        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
//        }
    }
}
