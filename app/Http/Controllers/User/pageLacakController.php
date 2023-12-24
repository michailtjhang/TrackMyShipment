<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\LacakResource;
use App\Models\Pengiriman;

class pageLacakController extends Controller
{
    public function index1()
    {
        return view('user.lacakpaket.index');
    }

    public function index()
    {
        $pengiriman = Pengiriman::with('penerima', 'layanan')->get();

        return LacakResource::collection($pengiriman);
    }
}
