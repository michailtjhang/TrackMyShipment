<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\LayananImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportLayananController extends Controller
{
    public function importLayanan(Request $request)
    {
        $request->validate(
            [
                'file' => 'required',
            ]);

        Excel::import(new LayananImport, $request->file('file'));

        return redirect('admin/layanan')->with('success', 'berhasil Bertambah!');
    }
}
