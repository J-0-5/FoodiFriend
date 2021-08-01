<?php

namespace App\Exports;

use App\Commerce;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CommercesExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Commerce::get(['nit','name','description']);
    }

    public function headings(): array
    {
        return [
            __('NIT'),
            __('Name'),
            __('Description')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return
            $sheet->getStyle('1')->getFont()->setBold(true);
    }
}
