<?php

namespace App\Exports;

use App\Instansi;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;

class InstansiExports implements FromView, WithStyles, ShouldAutoSize
{
    protected $instansi;

    public function __construct($instansi)
    {
        $this->instansi = $instansi;
    }

    public function view(): View
    {
        return view('exports.instansidata', [
            'instansi' => $this->instansi,
        ]);
    }
    
    public function styles(Worksheet $sheet)
    {
        $sheet->getDefaultRowDimension()->setRowHeight(20);
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 15,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => 'FFFF00'],
            ],
        ]);

        $sheet->getStyle('A2:F' . $sheet->getHighestRow())->applyFromArray([
            'font' => [
                'size' => 13,
            ],
        ]);

        return $sheet;
    }
}