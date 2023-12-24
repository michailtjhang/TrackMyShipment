<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LacakResource;
use App\Models\Pengiriman;

class LacakController extends Controller
{
    //
    public function index()
    {
        $pengiriman = Pengiriman::with('penerima', 'layanan')->get();

        return LacakResource::collection($pengiriman);
    }
}
