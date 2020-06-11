<?php

namespace App\Providers;

use App\Intake;
use App\Project;
use Illuminate\Support\ServiceProvider;
use View;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['partials.meta_dynamic', 'layouts.sideNav'], function ($view) {
            $view->with('projects', Project::where('status', 1)->latest()->get());
        });

        View::composer(['layouts.sideNav'], function ($view) {
            $view->with('intakes', Intake::where('isNew', 0)->latest()->get());
        });
    }
}
