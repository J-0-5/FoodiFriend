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
            $departments = Helpers::dataCookie('departments');
            $docType = Helpers::dataCookie('docType');
            $commerceType = Helpers::dataCookie('commerceType');
            $view->with('departments', $departments)->with('docType', $docType)->with('commerceType', $commerceType);
        });
    }
}
