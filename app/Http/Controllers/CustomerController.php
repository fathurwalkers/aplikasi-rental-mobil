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
        $kendaraan = new Kendaraan;
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
                "kendaraan_deskripsi" => 'required',
                "kendaraan_harga_sewa" => 'required',
                "kendaraan_tipe" => 'required|filled',
                "kendaraan_merk" => 'required',
                "kendaraan_kondisi" => 'required|filled',
                "kendaraan_max_mil" => 'required',
                "kendaraan_tahun" => 'required',
                "kendaraa_status" => 'required!filled',
                "kendaraan_jenis_transmisi" => 'required|filled',
                "kendaraan_jenis_body" => 'required|filled',
            ]);

            $customer->update([
                "kendaraan_deskripsi" => $validateData["kendaraan_deskripsi"],
                "kendaraan_kode" => $kode_kendaraan,
                "kendaraan_foto" => $gambar,
                "kendaraan_harga_sewa" => $validateData["kendaraan_harga_sewa"],
                "kendaraan_tipe" => $validateData["kendaraan_tipe"],
                "kendaraan_merk" => $validateData["kendaraan_merk"],
                "kendaraan_kondisi" => $validateData["kendaraan_kondisi"],
                "kendaraan_max_mil" => $validateData["kendaraan_max_mil"],
                "kendaraan_tahun" => $validateData["kendaraan_tahun"],
                "kendaraan_status" => $validateData["kendaraan_status"],
                "kendaraan_jenis_transmisi" => $validateData["kendaraan_jenis_transmisi"],
                "kendaraan_jenis_body" => $validateData["kendaraan_jenis_body"],
                "updated_at" => now()
            ]);
            $status_info = "Data Kendaran " . $customer_nama . " telah berhasil di ubah menjadi " . $validateData["kendaraan_merk"] . ".";
            return redirect()->route('daftar-kendaraan')->with('status', $status_info);
        }
    }
}
