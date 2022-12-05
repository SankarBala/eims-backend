<?php

namespace App\Services\ExcelService;

use App\Services\ExcelService\Facades\SuperExcel;
use Illuminate\Support\Str;

class SuperExcelModel
{


    protected static $file;
    protected static $sheet;
    protected static $split;
    protected static $columns;



    public static function sheetCorrection()
    {

        if (!static::$file) {
            if (static::$split) {
                static::$file = database_path() . '/excels/' . Str::of(basename(static::class) . '_' . date('Y') . '.xlsx')->snake();
            } else {
                static::$file = database_path() . '/excels/' . Str::of(basename(static::class) . '.xlsx')->snake();
            }
        }
    }

    public static function __callStatic($name, $arguments)
    {
        static::sheetCorrection();

        $spreadsheet =  SuperExcel::open(static::$file ?? basename(static::class) . '.xlsx');

        // dd($spreadsheet);

        if (static::$sheet !== null) {
            $spreadsheet->useSheet(static::$sheet);
        }

        $data = $spreadsheet->worksheet->toArray();
        
        if (!static::$columns) {
            $keys = array_splice($data, 0, 1)[0];
        } else {
            $keys = static::$columns;
        }




        $results = [];
        $keys_length = count($keys);
        $value_length = count($data[0]);


        foreach ($data as $key => $value) {

            if ($keys_length < $value_length) {
               $values = array_slice($value, 0, $keys_length);
            }
            dd($value_length);

            $value = array_merge($value, array_fill(0, $keys_length - count($value) >= 0 ? $keys_length - count($value) :  0, null));
            // dd($value);
            array_push($results, array_combine($keys, $value));
        }

        return collect($results)->$name(...$arguments);
    }
}
