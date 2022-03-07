<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Kendaraan;
use App\Models\Rental;
use App\Models\Login;
use App\Models\Data;

class PenyewaanController extends Controller
{
    public function daftar_penyewaan()
    {
        $penyewaan = Rental::latest()->get();
        return view('dashboard.daftar-penyewaan', [
            'penyewaan' => $penyewaan
        ]);
    }

    public function hapus_penyewaan(Request $request, $id)
    {
        $penyewaan_id = $id;
        $findpenyewaan = Penyewaan::findOrFail($penyewaan_id);
        $findpenyewaan->forceDelete();
        return redirect()->route('daftar-penyewaan')->with('status', 'Data telah dihapus!');
    }
    public function update_penyewaan(Request $request, $id)
    {
        //
    }
}
