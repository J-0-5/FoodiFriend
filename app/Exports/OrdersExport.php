<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersExport implements FromCollection, WithHeadings, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::get(['description','address','total']);
    }

    public function headings(): array
    {
        return [
            __('Description'),
            __('Address'),
            __('Total')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return
            $sheet->getStyle('1')->getFont()->setBold(true);
    }
}
