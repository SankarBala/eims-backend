<?php

namespace App\Services\ExcelService;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ExcelReader;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as ExcelWriter;

class SuperExcel
{
    protected $header = [1, 2];
    protected $subHeader = null;
    public $spreadsheet;
    public $worksheet;

    public function __construct()
    {
    }

    public function open(String $file_name = null)
    {
        if ($file_name == null) {
            $file_name = "New_Excel_Worksheet_" . time() . "_" . rand() . ".xlsx";
            $spreadsheet = new Spreadsheet();
        } else {
            $spreadsheet = new ExcelReader();
            $spreadsheet = $spreadsheet->load($file_name);
        }
        $spreadsheet->name = $file_name;
        $this->spreadsheet = $spreadsheet;
        $this->worksheet =  $this->spreadsheet->getActiveSheet();
        return $this;
    }


    public function useSheet(String $sheetName = null)
    {
        if ($sheetName !== null) {
            $this->spreadsheet->setActiveSheetIndexByName($sheetName);
            $this->worksheet =  $this->spreadsheet->getActiveSheet();
        }
        return $this;
    }

    public function useSheetByIndex(Int $sheetIndex = null)
    {
        if ($sheetIndex !== null) {
            $this->spreadsheet->setActiveSheetIndex($sheetIndex);
            $this->worksheet =  $this->spreadsheet->getActiveSheet();
        }
        return $this;
    }

    public function createSheet(String $sheetName = null)
    {
        $newSheet =  $this->spreadsheet->createSheet();
        if ($sheetName !== null) {
            $newSheet->setTitle($sheetName);
        }
        return $this->useSheet($newSheet->getTitle());
    }



    public function makeHeader(Worksheet $data, $keyRow = 1)
    {
        $data = $data->toArray();
        $keys = collect(array_splice($data, 0, 1)[0]);
        $values = $data;
        $result = [];

        foreach ($values as $key => $value) {
            array_push($result,  $keys->combine($value));
        }

        return $result;
    }

    public static function get()
    {
        // return new Collection($this->worksheet->toArray(null, true, true, false));
        return "fff";
    }

    public function find(Worksheet $worksheet, Int $row)
    {
        // return new Collection($worksheet->toArray(null, true, true, false));

        $keys =  $worksheet->toArray()[0];
        $values = $worksheet->toArray()[$row];

        $result = [];

        foreach ($keys as $key => $value) {
            $result[$value] = $values[$key];
        }

        return $result;
    }




    // public function saveAs(Spreadsheet $spreadsheet, String $file_name)
    // {
    //     $writer = new ExcelWriter($spreadsheet);
    //     $writer->save($file_name);
    //     return $spreadsheet;
    // }


    // public function save(Spreadsheet $spreadsheet)
    // {
    //     return self::saveAs($spreadsheet, $spreadsheet->name);
    // }

    public function saveAs(String $file_name)
    {
        $writer = new ExcelWriter($this->spreadsheet);
        $writer->save($file_name);
        return $this;
    }


    public function save()
    {
        return self::saveAs($this->spreadsheet->name);
    }




    public function add(Worksheet $sheet, array $data)
    {
        $lastRow = $sheet->getHighestRow();

        foreach ($data as $row => $rowdata) {
            $column = 1;
            foreach ($rowdata as $col => $coldata) {
                $sheet->setCellValue((to_alpha($column) . ($lastRow + $row + 1)), json_encode($coldata));
                $column++;
            }
        }
        return $sheet;
    }

    public function insert(Worksheet $sheet, array $data)
    {
        $sheet =  self::add($sheet, $data);
        self::save($sheet->getParent());
        return $sheet;
    }

    public static function paginate(Collection $collection, $pageSize = 15)
    {
        $page = Paginator::resolveCurrentPage('page');
        $total = $collection->count();
        return self::paginator($collection->forPage($page, $pageSize), $total, $pageSize, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page'
        ]);
    }

    protected static function paginator($items, $total, $perPage, $currentPage, $options)
    {
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items',
            'total',
            'perPage',
            'currentPage',
            'options'
        ));
    }
}
