<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{
    public function index()
    {

        $id = Auth::user()->id;
        $pengiriman = pengiriman::where('users_id', $id)->count();
        $status = pengiriman::where('users_id', $id)->where('status', 'penjemputan')->count();
        $perjalanan = pengiriman::where('users_id', $id)->where('status', 'pengiriman')->count();
        $diterima = pengiriman::where('users_id', $id)->where('status', 'terkirim')->count();

        return view('user.dashboard', compact('pengiriman', 'status', 'perjalanan', 'diterima'));
    }
}
