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
    protected $header = [0, 1];
    protected $subHeader = 2;

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
        return $spreadsheet;
    }


    public function makeHeader(Worksheet $data, $keyRow)
    {
        $data = $data->toArray();
        $keys = collect(array_splice($data,  $this->header[0], $this->header[1])[0]);

        if ($this->subHeader != null) {
            array_shift($data);
        }

        $values = $data;
        $result = [];

        foreach ($values as $key => $value) {
            array_push($result,  $keys->combine($value));
        }

        return $result;
    }

    public function get(Worksheet $worksheet)
    {
        return new Collection($worksheet->toArray(null, true, true, false));
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




    public function saveAs(Spreadsheet $spreadsheet, String $file_name)
    {
        $writer = new ExcelWriter($spreadsheet);
        $writer->save($file_name);
        return $spreadsheet;
    }


    public function save(Spreadsheet $spreadsheet)
    {
        return self::saveAs($spreadsheet, $spreadsheet->name);
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
