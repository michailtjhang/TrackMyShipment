<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LayananResource;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    //
    public function index()
    {
        $layanan = Layanan::get();

        return new LayananResource(true, 'Data Layanan', $layanan);
    }

    public function show($id)
    {
        $layanan = Layanan::where('layanan.id', $id)
            ->get();

        return new LayananResource(true, 'Detail Layanan', $layanan);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nama_layanan' => 'required|max:45',
            'biaya' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }

        $layanan = DB::table('layanan')->insert([
            'nama_layanan' => $request->nama_layanan,
            'biaya' => $request->biaya,
        ]);

        return new LayananResource(true, 'Data Layanan Berhasil diTambahkan', $layanan);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [

            'nama_layanan' => 'required|max:45',
            'biaya' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }

        $layanan = Layanan::where('id', $id)->update([
            'nama_layanan' => $request->nama_layanan,
            'biaya' => $request->biaya,
        ]);

        return new LayananResource(true, 'Data Berhasil Diubah', $layanan);
    }

    public function destory($id)
    {
        $layanan = DB::table('layanan')->where('id', $id);
        $layanan->delete();

        return new LayananResource(true, 'Data layanan Berhasil dihapus', $layanan);
    }
}
