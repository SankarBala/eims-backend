<?php

namespace App\Providers;

use App\Services\ExcelService\SuperExcel;
use Illuminate\Support\ServiceProvider;

class ExcelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('superexcel', function () {
            return new SuperExcel();
        });
    }
}
