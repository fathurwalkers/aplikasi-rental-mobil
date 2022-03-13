<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;
use App\Models\Kendaraan;
use App\Models\Rental;

class CustomerController extends Controller
{
    public function daftar_customer()
    {
        $customer = Data::latest()->get();
        return view('dashboard.daftar-customer', [
            'customer' => $customer
        ]);
    }

    public function hapus_customer(Request $request, $id)
    {
        $customer_id = $id;
        $findcustomer = Data::findOrFail($customer_id);
        $findcustomer->forceDelete();
        return redirect()->route('daftar-customer')->with('status', 'Data telah dihapus!');
    }

    public function tambah_customer(Request $request)
    {
        $customer = new Data;

        $validateData = $request->validate([
            "data_nama_lengkap" => "required",
            "data_jenis_kelamin" => "required",
            "data_email" => "required",
            "data_telepon" => "required"
        ]);

        $gambar = $request->file('data_foto');

        $save_customer = $customer->create([
            "data_foto" => $gambar,
            "data_nama_lengkap" => $validateData["data_nama_lengkap"],
            "data_jenis_kelamin" => $validateData["data_jenis_kelamin"],
            "data_email" => $validateData["data_email"],
            "data_telepon" => $validateData["data_telepon"],
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $save_customer->save();
    }

    public function update_customer(Request $request, $id)
    {
        $customer_id = $id;
        $customer = Data::find($customer_id);
        if ($customer == null) {
            return redirect()->route('daftar-customer')->with('status', 'Data Kendaraan yang anda ingin ubah tidak dapat ditemukan. ');
        } else {
            $customer_nama = $customer->data_nama_lengkap;
            $validateData = $request->validate([
                "data_nama_lengkap" => "required",
                "data_jenis_kelamin" => "required",
                "data_email" => "required",
                "data_telepon" => "required"
            ]);
            $gambar = $request->file('data_foto');
            $customer->update([
                "data_foto" => $gambar,
                "data_nama_lengkap" => $validateData["data_nama_lengkap"],
                "data_jenis_kelamin" => $validateData["data_jenis_kelamin"],
                "data_email" => $validateData["data_email"],
                "data_telepon" => $validateData["data_telepon"],
                "updated_at" => now()
            ]);
            $status_info = "Data Customer " . $customer_nama . " telah berhasil di ubah menjadi " . $validateData["data_nama_lengkap"] . ".";
            return redirect()->route('daftar-customer')->with('status', $status_info);
        }
    }

    public function pendaftaran_data_customer()
    {
        $users = session('data_login');
        $login = Login::findOrFail($users->id);
        if ($login->login_level == "admin") {
            return redirect()->route('dashboard')->with('status', 'Tidak dapat beralih ke halaman ini, karena anda bukan users. ');
        }
        $data = $login->where('data_id', $login->data_id);
        if ($data == null) {
            return view('dashboard.pendaftaran-data-customer');
        } else {
            return redirect()->route('dashboard')->with('status', 'Tidak dapat beralih ke halaman ini, karena data anda sudah ada. ');
        }
    }

    public function post_data_customer(Request $request, $id)
    {
        $login = Login::findOrFail($id);
        $customer = new Data;

        $validateData = $request->validate([
            "data_nama_lengkap" => "required",
            "data_jenis_kelamin" => "required"
        ]);

        $gambar_cek = $request->file('data_foto');
        if (!$gambar_cek) {
            $gambar = null;
        } else {
            $randomNamaGambar = Str::random(10) . '.jpg';
            $gambar = $request->file('data_foto')->move(public_path('default-img/foto'), strtolower($randomNamaGambar));
        }

        if ($gambar == null) {
            $gambar = null;
        } else {
            $gambar = $gambar->getFileName();
        }

        $save_customer = $customer->create([
            "data_foto" => $gambar,
            "data_nama_lengkap" => $validateData["data_nama_lengkap"],
            "data_jenis_kelamin" => $validateData["data_jenis_kelamin"],
            "data_email" => $login->login_email,
            "data_telepon" => $login->login_telepon,
            "created_at" => now(),
            "updated_at" => now()
        ]);
        $save_customer->save();
        $login->data()->associate($save_customer->id);
        $login->save();
        return redirect()->route('dashboard')->with('status', 'Data Customer anda telah dibuat. ');
    }


}
