<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;
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
        Voyager::addAction(\App\Actions\ReplyAction::class);
        Voyager::addAction(\App\Actions\ResponsibleAction::class);
        Voyager::addAction(\App\Actions\SendUser::class);
        Voyager::addAction(\App\Actions\ChatAction::class);
    }
}
