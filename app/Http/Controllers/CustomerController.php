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
    public function daftar_kendaraan()
    {
        $kendaraan = Kendaraan::latest()->get();
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

    public function tambah_kendaraan(Request $request)
    {
        $kendaraan = new Data;
    }

    public function update_kendaraan(Request $request, $id)
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
}
