<?php

use App\Models\Room;
use App\Services\ExcelService\Facades\SuperExcel;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Excel;

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


    $room = Room::paginate();


    $excel = SuperExcel::open("hello.xlsx");


    $sheet = $excel->getActiveSheet();

    dd(SuperExcel::getData($sheet));

    $rooms = [
        [1, 2, 3],
        [1, 2, 3],
        [1, 2, 3],
        [
            1, 2, [
                1, 2, 3, [
                    1, 2, $room
                ]
            ]
        ],
    ];


    dd(SuperExcel::insert($sheet, $rooms));





    // foreach ($rooms as $row => $rowdata) {
    //     $column = 1;
    //     foreach ($rowdata->toArray() as $col => $coldata) {
    //         $sheet->setCellValue(to_alpha($column) . ($row + 1), $coldata);
    //         $column++;
    //     }
    // }



    // SuperExcel::save($excel, "roomss.xlsx");

    dd($excel->getProperties());
});
