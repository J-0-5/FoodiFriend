<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductsExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::get(['name', 'description', 'price', 'quantity']);
    }

    public function headings(): array
    {
        return [
            __('Name'),
            __('Description'),
            __('Price'),
            __('Quantity')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return
            $sheet->getStyle('1')->getFont()->setBold(true);
    }
}
