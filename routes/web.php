<?php


use App\Exports\RoomExport;
use App\Imports\RoomImport;
use App\Models\Room;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


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
    // $st = Student::with('guardians')->paginate();
    // return dd($st->toArray());
    // $gd = Guardian::with('students')->paginate()->toArray();
    // return dd(Branch::all()->toArray());
    // $br = Branch::find(2);
    // $br->phones = ["017427asdfsa25606", "015sadfasf31827045"];
    // $br->phone = array_push($br->phone, "01742725606");
    // $br->save();


    // $rooms = Room::paginate(20);

    // return dd($rooms);


    // dd(Room::paginate(20));


    //   dd(collect([[0], [2], [3]])->find(2));

    // $data = Room::paginate(20);


    // $headings = collect([
    //     [
    //         "id",
    //         "branch_id",
    //         "building_id",
    //         "floor_no",
    //         "room_number",
    //         "name",
    //         "width",
    //         "length",
    //         "benches",
    //         "seats",
    //         "ready",
    //         "created_at",
    //         "updated_at"
    //     ]
    // ]);
    // $path = Excel::store(new RoomExport(), 'invoices3.xlsx');
    // $rooms = Excel::import(new RoomImport, 'invoices.xlsx');
    // return Excel::download(new RoomExport, 'invoices.csv');
    // return dd(new RoomExport);
    // return dd($path);



    // $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    // $spreadsheet = $reader->load("hello.xlsx");
    // $sheet = $spreadsheet->getActiveSheet();

    // $rooms = Room::paginate(800);

    // foreach ($rooms as $row => $rowdata) {
    //     $column = 1;
    //     foreach ($rowdata->toArray() as $col => $coldata) {
    //         $sheet->setCellValue(to_alpha($column) . ($row + 1), $coldata);
    //         $column++;
    //     }
    // }

    // $sheet->setCellValue("B3", "coldata");


    // // $spreadsheet->save();

    // $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

    // $writer->save("hello.xlsx");

    return "ok";
});
