<?php

namespace App\Providers;

use App\Tag;
use App\User;
use App\TagJual;
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
        $jtags = TagJual::all();
        $tags  = Tag::all();
        //$ceo = User::where('admin', 1)->first();
        View::share(['tags' => $tags, 'jtags' => $jtags]);
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
