<?php

namespace App\Imports;

use App\Models\Layanan;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class LayananImport implements SkipsOnFailure, ToModel, WithHeadingRow, WithValidation
{
    use Importable, SkipsFailures;

    public function model(array $row)
    {
        return new Layanan([
            'nama_layanan' => $row['nama_layanan'],
            'biaya' => $row['biaya'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_layanan' => 'required|max:45|unique:layanan',
            'biaya' => 'required|numeric',
        ];
    }
}
