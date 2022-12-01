<?php

use App\Models\Room;
use App\Services\ExcelService\Facades\SuperExcel;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

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

    $excel = SuperExcel::open("hello.xlsx");
    $sheet = $excel->getActiveSheet();
    // $sheet = $excel->createSheet();
    // $sheet->setTitle("newSheetthis");
    // $sheet=$sheet->setSheetName("fff");

    // SuperExcel::save($excel);

    //    $sheet = new Worksheet();
    //     dd($sheet->title);

    // dd(Room::find(2));

    // dd(SuperExcel::makeHeader($sheet, 1));
    // dd($sheet);



    dd(SuperExcel::get($sheet));
});
