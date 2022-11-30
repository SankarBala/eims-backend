<?php

namespace App\Services\ExcelService;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ExcelReader;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as ExcelWriter;

class SuperExcel
{

    public function __construct()
    {
        //
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
        return $spreadsheet;
    }

    public function getData(Worksheet $worksheet){
           return $worksheet->toArray();
    }

    public function saveAs(Spreadsheet $spreadsheet, String $file_name)
    {
        // if ($file_name == null) {
        //     if (!property_exists($spreadsheet, 'name')) {
        //         $file_name = "New_Excel_Worksheet_" . time() . "_" . rand() . ".xlsx";
        //     }
        //     $file_name = $spreadsheet->name;
        // }
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
}
