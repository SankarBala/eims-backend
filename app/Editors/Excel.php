<?php

namespace App\Editor;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;

class Excel
{

    protected $spreadsheet;
    protected $currentSheet;


    public function __construct()
    {
        //
    }

    public function create()
    {
        //
    }

    public function open(String $worksheet = "")
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load($worksheet);
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue("B3", "coldata");
    }

    public function save(String $worksheet = "")
    {
        $writer = new XlsxWriter($this->spreadsheet);
        $writer->save($worksheet);
    }

    public function update()
    {
        //
    }
}
