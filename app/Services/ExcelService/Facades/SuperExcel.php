<?php

namespace App\Services\ExcelService\Facades;

use Illuminate\Support\Facades\Facade;

class SuperExcel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'superexcel';
    }
}
