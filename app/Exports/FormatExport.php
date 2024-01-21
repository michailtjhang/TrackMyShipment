<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;

class FormatExport implements  WithHeadings
{
    public function headings(): array
    {
        return [
            'nama_layanan',
            'biaya',
        ];
    }
}
