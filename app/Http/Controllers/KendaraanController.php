<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function daftar_kendaraan()
    {
        $kendaraan = Kendaraan::all();
        return view('dashboard.daftar-kendaraan', [
            'kendaraan' => $kendaraan
        ]);
    }

    public function hapus_kendaraan(Request $request, $id)
    {
        $kendaraan_id = $id;
        $findkendaraan = Kendaraan::findOrFail($kendaraan_id);
        $findkendaraan->forceDelete();
        return redirect()->route('daftar-kendaraan')->with('status', 'Data telah dihapus!');
    }
}
