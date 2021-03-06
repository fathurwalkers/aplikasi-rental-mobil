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
        $kendaraan = Kendaraan::where('kendaraan_status', 'TERSEDIA')->paginate(6);
        return view('home.index', [
            'kendaraan' => $kendaraan
        ]);
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
        if ($users == null) {
            return redirect()->route('home')->with('status', 'Maaf, anda harus login sebagai customer untuk dapat melakukan penyewaan ');
        }
        if ($users->login_level == "admin") {
            return redirect()->route('home')->with('status', 'Maaf, anda harus login atau terdaftar sebagai customer untuk dapat melakukan penyewaan. ');
        }
        $login = Login::find($users->id);
        if ($users->login_level == "customer") {
            $validateData = $request->validate([
                'rental_durasi' => 'required',
                'rental_satuan_waktu' => 'required|filled'
            ]);
            $data                   = Data::find($login->data_id);
            if ($data == null) {
                return redirect()->route('home')->with('status', 'Kami tidak menemukan data identitas anda, silahkan masuk ke dashboard terlebih dahulu untuk melakukan pengisian data identitas. ');
            }
            $rental                 = new Rental;
            $rental_durasi          = $request->rental_durasi;
            $rental_satuan_waktu    = $request->rental_satuan_waktu;
            $rental_kode = "RNDRA". strtoupper(Str::random(8));
            $rental_status = "PENDING";

            $kendaraan_harga = $kendaraan->kendaraan_harga_sewa;

            switch ($rental_satuan_waktu) {
                case 'BULAN':
                    $satuan_waktu = 28;
                    $hasil_kali = intval($satuan_waktu) * intval($rental_durasi);
                    break;
                case 'HARI':
                    $satuan_waktu = 1;
                    $hasil_kali = intval($satuan_waktu) * intval($rental_durasi);
                    break;
            }

            $total_harga = intval($hasil_kali) * intval($kendaraan_harga);

            $save_rental = $rental->create([
                "rental_kode" => $rental_kode,
                "rental_total_harga" => intval($total_harga),
                "rental_waktu_pemesanan" => now(),
                "rental_durasi" => intval($rental_durasi),
                "rental_satuan_waktu" => $rental_satuan_waktu,
                "rental_status" => $rental_status,
                "rental_bukti_ktp" => null,
                "rental_bukti_lain" => null,
                "created_at" => now(),
                "updated_at" => now()
            ]);
            $save_rental->save();
            $save_rental->data()->associate($data->id);
            $save_rental->save();
            $save_rental->kendaraan()->associate($kendaraan->id);
            $save_rental->save();
            return redirect()->route('home')->with('status', 'Anda telah berhasil melakukan permohonan penyewaan, silah     mengambil informasi Penyewaan pada halaman Dashboard anda. ');
        } else {
            return redirect()->route('home')->with('status', 'Maaf, anda harus terdaftar sebagai customer untuk dapat melakukan penyewaan');
        }
    }
}
