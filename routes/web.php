<?php

use App\Models\Room;
use App\Services\ExcelService\Facades\SuperExcel;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {


    $rooms = Room::paginate(800);

    $excel = SuperExcel::open();
    $sheet = $excel->getActiveSheet();

    foreach ($rooms as $row => $rowdata) {
        $column = 1;
        foreach ($rowdata->toArray() as $col => $coldata) {
            $sheet->setCellValue(to_alpha($column) . ($row + 1), $coldata);
            $column++;
        }
    }



    SuperExcel::save($excel, "room.xlsx");

    return "done";
});
