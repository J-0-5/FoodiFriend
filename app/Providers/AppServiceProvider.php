<?php

namespace App\Providers;

use App\Helpers\Helpers;
use View;
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
        require_once app_path() . '/Helpers/Helpers.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $departmets = Helpers::dataCookie('departments');
            $typeDoc = Helpers::dataCookie('typeDoc');
            $view->with('departments', $departmets)->with('typeDoc', $typeDoc);
        });
    }
}
