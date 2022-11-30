<?php

use App\Models\Room;
use App\Services\ExcelService\Facades\SuperExcel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\Paginator;
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

    // dd(Room::paginate(20));
    $data = SuperExcel::get($sheet);

    // dd($data);
    // dd($data);

    //    dd(new Paginator($data, 2));



    // dd($col);
    dd(SuperExcel::paginate($data, 10));
});
