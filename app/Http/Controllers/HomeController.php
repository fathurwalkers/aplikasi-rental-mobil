<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::latest()->paginate(6);
        if ($kendaraan == null) {
            echo "Data Kendaran Kosong!";
            die;
        } else {
            return view('home.index', [
                'kendaraan' => $kendaraan
            ]);
        }
    }

    public function kontak()
    {
        return view('home.kontak');
    }

    public function proses_penyewaan(Request $request, $id)
    {
        $kendaraan_id = $id;
        $kendaraan = Kendaraan::where('id', $kendaraan_id)->firstOrFail();
        $users = session('data_login');

        if ($users == null) {
            return redirect()->route('home')->with('status', 'Maaf, anda harus login atau terdeftar sebagai customer untuk dapat melakukan penyewaan. ');
        } else {
            if ($users->login_level == "customer") {
                dump($request->rental_durasi);
                dump($request->rental_satuan_waktu);
                dd($kendaraan);
            } else {
                return redirect()->route('home')->with('status', 'Hanya customer saja yang dapat melakukan penyewaan. ');
            }
        }
    }
}
