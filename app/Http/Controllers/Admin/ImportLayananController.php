<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\LayananImport;
use Illuminate\Http\Request;

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
}
