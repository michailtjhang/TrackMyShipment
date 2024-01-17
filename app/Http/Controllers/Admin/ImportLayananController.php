<?php

namespace App\Http\Controllers\Admin;

use App\Exports\FormatExport;
use App\Http\Controllers\Controller;
use App\Imports\LayananImport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ImportLayananController extends Controller
{
    public function importLayanan(Request $request)
    {
        $request->validate(
            [
                'file' => 'required',
            ]
        );

        $file = $request->file('file');

        $import = new LayananImport;
        $import->import($file);

        if ($import->failures()) {
            return back()->withFailures($import->failures());
        }

        return redirect('admin/layanan')->with('success', 'berhasil Bertambah!');
    }

    public function formatexport()
    {
        // dd('test');
        return Excel::download(new FormatExport, 'Format Layanan '.Carbon::now()->timestamp.'.xlsx');
    }
}
