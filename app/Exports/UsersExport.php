<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::get(['name', 'lastName', 'docNum', 'address', 'email']);
    }

    public function headings(): array
    {
        return [
            __('Name'),
            __('Last name'),
            __('Document number'),
            __('Address'),
            __('E-Mail Address'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return
            // Style the first row as bold text.
            $sheet->getStyle('1')->getFont()->setBold(true);
    }
}
