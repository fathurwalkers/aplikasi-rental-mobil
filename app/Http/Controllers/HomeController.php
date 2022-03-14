<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Data;
use App\Models\Kendaraan;
use App\Models\Rental;
use App\Models\Login;

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
        $kendaraan = Kendaraan::findOrFail($kendaraan_id);
        $users = session('data_login');
        $login = Login::find($users->id);
        if ($users == null) {
            return redirect()->route('home')->with('status', 'Maaf, anda harus login atau terdeftar sebagai customer untuk dapat melakukan penyewaan. ');
        } else {
            if ($users->login_level == "customer") {
                $data                   = Data::find($login->data_id);
                $rental                 = new Rental;
                $rental_durasi          = $request->rental_durasi;
                $rental_satuan_waktu    = $request->rental_satuan_waktu;
                $rental_kode = "RNDRA". strtoupper(Str::random(8));
                $rental_status = "PENDING";

                $save_rental = $rental->create([
                    "rental_kode" => $rental_kode,
                    "rental_waktu_pemesanan" => now(),
                    "rental_durasi" => intval($rental_durasi),
                    "rental_satuan_waktu" => $rental_satuan_waktu,
                    "rental_status" => $rental_status,
                    "rental_bukti_ktp" => null,
                    "rental_bukti_lain" => null,
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
                $save_rental->data()->associate($data->id);
                $save_rental->kendaraan()->associate($kendaraan->id);
                $save_rental->save();
                return redirect()->route('home')->with('status', 'Anda telah berhasil melakukan permohonan penyewaan, silahkan mengambil informasi Penyewaan pada halaman Dashboard anda. ');
            } else {
                return redirect()->route('home')->with('status', 'Hanya customer saja yang dapat melakukan penyewaan. ');
            }
        }
    }
}
