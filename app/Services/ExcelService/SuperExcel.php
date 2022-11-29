<?php

namespace App\Services\ExcelService;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ExcelReader;
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

    public function save(Spreadsheet $spreadsheet, String $file_name = null)
    {
        if ($file_name == null) {
            if (!property_exists($spreadsheet, 'name')) {
                $file_name = "New_Excel_Worksheet_" . time() . "_" . rand() . ".xlsx";
            }
            $file_name = $spreadsheet->name;
        }
        $writer = new ExcelWriter($spreadsheet);
        return $writer->save($file_name);
    }
}
