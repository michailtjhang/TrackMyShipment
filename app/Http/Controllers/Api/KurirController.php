<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KurirResource;
use App\Models\Kurir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KurirController extends Controller
{
    public function index()
    {
        $kurir = Kurir::join('layanan', 'kurir.layanan_id', '=', 'layanan.id')
            ->select('kurir.*', 'layanan.nama_layanan')
            ->get();

        return new KurirResource(true, 'Data Kurir', $kurir);
    }

    public function show($id)
    {
        $kurir = Kurir::join('layanan', 'kurir.layanan_id', '=', 'layanan.id')
            ->select('kurir.*', 'layanan.nama_layanan')
            ->where('kurir.id', $id)
            ->get();

        return new KurirResource(true, 'Detail Kurir', $kurir);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nama_kurir' => 'required |  max:45',
            'nomor_telepon' => 'required | numeric',
            'jadwal' => 'required | max:45',
            'layanan_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }

        $kurir = DB::table('kurir')->insert([
            'nama_kurir' => $request->nama_kurir,
            'nomor_telepon' => $request->nomor_telepon,
            'jadwal' => $request->jadwal,
            'layanan_id' => $request->layanan_id,
        ]);

        return new KurirResource(true, 'Data Kurir Berhasil diTambahkan', $kurir);
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [

            'nama_kurir' => 'required |  max:45',
            'nomor_telepon' => 'required | numeric',
            'jadwal' => 'required | max:45',
            'layanan_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }

        $kurir = DB::table('kurir')->where('id', $id)->update([
            'nama_kurir' => $request->nama_kurir,
            'nomor_telepon' => $request->nomor_telepon,
            'jadwal' => $request->jadwal,
            'layanan_id' => $request->layanan_id,
        ]);

        return new KurirResource(true, 'Data Kurir Berhasil diubah', $kurir);
    }

    public function destory($id)
    {
        $kurir = DB::table('kurir')->where('id', $id);
        $kurir->delete();

        return new KurirResource(true, 'Data Kurir Berhasil dihapus', $kurir);
    }
}
