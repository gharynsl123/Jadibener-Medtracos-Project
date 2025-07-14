<?php

namespace App\Exports;

use App\Equipment;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;

class EquipmentExports implements FromView, WithStyles, ShouldAutoSize
{

    protected $equipment;

    public function __construct($equipment)
    {
        $this->equipment = $equipment;
    }

    public function view(): View
    {
        return view('exports.equipmentdata', [
            'equipment' => $this->equipment,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getDefaultRowDimension()->setRowHeight(20);
        $sheet->getStyle('A1:I1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 15,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'color' => ['argb' => 'FFFF00'],
            ],
        ]);

        $sheet->getStyle('A2:E' . $sheet->getHighestRow())->applyFromArray([
            'font' => [
                'size' => 15,
            ],
        ]);

        return $sheet;
    }
}
