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
        $session_user = session('data_login');
        $users = Login::find($session_user->id);
        switch ($users->login_level) {
            case 'admin':
                $penyewaan = Rental::latest()->get();
                return view('dashboard.daftar-penyewaan', [
                    'penyewaan' => $penyewaan
                ]);
                break;
            case 'customer':
                $penyewaan = Rental::where('data_id', $users->data_id)->get();
                if ($penyewaan->isEmpty()) {
                    return view('dashboard.daftar-penyewaan', [
                        'penyewaan' => $penyewaan
                    ]);
                }
                return view('dashboard.daftar-penyewaan', [
                    'penyewaan' => $penyewaan
                ]);
                break;
        }
        $penyewaan = Rental::latest()->get();
        return view('dashboard.daftar-penyewaan', [
            'penyewaan' => $penyewaan
        ]);
    }

    public function konfirmasi_penyewaan(Request $request, $id)
    {
        $rental = Rental::find($id);
        $kendaraan = Kendaraan::find($rental->kendaraan_id);
        $data = Data::find($rental->data_id);
        $update_rental = $rental->update([
            'rental_status' => "BERLANGSUNG",
            'updated_at' => now()
        ]);
        $update_kendaraan = $kendaraan->update([
            'kendaraan_status' => "DIPAKAI",
            'updated_at' => now()
        ]);
        return redirect()->route('daftar-penyewaan')->with('status', 'Status penyewaan anda telah berlangsung!');
    }

    public function konfirmasi_penyewaan_selesai(Request $request, $id)
    {
        $rental = Rental::find($id);
        $kendaraan = Kendaraan::find($rental->kendaraan_id);
        $data = Data::find($rental->data_id);
        $update_rental = $rental->update([
            'rental_status' => "SELESAI",
            'updated_at' => now()
        ]);
        $update_kendaraan = $kendaraan->update([
            'kendaraan_status' => "TERSEDIA",
            'updated_at' => now()
        ]);
        return redirect()->route('daftar-penyewaan')->with('status', 'Status penyewaan anda telah selesai!');
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
