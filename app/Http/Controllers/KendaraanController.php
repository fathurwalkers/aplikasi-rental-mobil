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
        $random_kode_kendaraan = "KDR-" . strtoupper(Str::random(5));

        $gambar_cek = $request->file('kendaraan_foto');
        if (!$gambar_cek) {
            $gambar = null;
        } else {
            $ext = $request->file('kendaraan_foto')->getClientOriginalExtension();
            $randomNamaGambar = strtolower(Str::random(10)) . "." .$ext;
            $gambar_ori = $request->file('kendaraan_foto')->move(public_path('default-img/foto'), $randomNamaGambar);
            $gambar = $randomNamaGambar;
        }

        $kendaraan = new Kendaraan;
        $save_kendaraan = $kendaraan->create([
            "kendaraan_deskripsi" => $request->kendaraan_deskripsi,
            "kendaraan_kode" => $random_kode_kendaraan,
            "kendaraan_foto" => $gambar,
            "kendaraan_harga_sewa" => $request->kendaraan_harga_sewa,
            "kendaraan_tipe" => $request->kendaraan_tipe,
            "kendaraan_merk" => $request->kendaraan_merk,
            "kendaraan_kondisi" => $request->kendaraan_kondisi,
            "kendaraan_max_mil" => $request->kendaraan_max_mil,
            "kendaraan_tahun" => $request->kendaraan_tahun,
            "kendaraan_status" => $request->kendaraan_status,
            "kendaraan_jenis_transmisi" => $request->kendaraan_jenis_transmisi,
            "kendaraan_jenis_body" => $request->kendaraan_jenis_body,
            "created_at" => now(),
            "updated_at" => now()
        ]);
        return redirect()->route('daftar-kendaraan')->with('status', 'Kendaraan berhasil ditambah!');
    }

    public function update_kendaraan(Request $request, $id)
    {
        $kendaraan_id = $id;
        $kendaraan = Kendaraan::find($kendaraan_id);
        if ($kendaraan == null) {
            return redirect()->route('daftar-kendaraan')->with('status', 'Data Kendaraan yang anda ingin ubah tidak dapat ditemukan. ');
        } else {
            $kendaraan_nama = $kendaraan->kendaraan_merk;
            // $validateData = $request->validate([
            //     "kendaraan_deskripsi" => 'required',
            //     "kendaraan_harga_sewa" => 'required',
            //     "kendaraan_tipe" => 'required|filled',
            //     "kendaraan_merk" => 'required',
            //     "kendaraan_kondisi" => 'required|filled',
            //     "kendaraan_max_mil" => 'required',
            //     "kendaraan_tahun" => 'required',
            //     "kendaraa_status" => 'required|filled',
            //     "kendaraan_jenis_transmisi" => 'required|filled',
            //     "kendaraan_jenis_body" => 'required|filled',
            // ]);

            $gambar_cek = $request->file('kendaraan_foto');
            if (!$gambar_cek) {
                $gambar_ori = $kendaraan->kendaraan_foto;
                $gambar = $gambar_ori;
            } else {
                $ext = $request->file('kendaraan_foto')->getClientOriginalExtension();
                $randomNamaGambar = strtolower(Str::random(10)) . "." .$ext;
                $gambar_ori = $request->file('kendaraan_foto')->move(public_path('default-img/foto'), $randomNamaGambar);
                $gambar = $randomNamaGambar;
            }

            $kode_kendaraan = "KDR-" . strtoupper(Str::random(5));

            $kendaraan->update([
                "kendaraan_deskripsi" => $request->kendaraan_deskripsi,
                "kendaraan_kode" => $kode_kendaraan,
                "kendaraan_foto" => $gambar,
                "kendaraan_harga_sewa" => $request->kendaraan_harga_sewa,
                "kendaraan_tipe" => $request->kendaraan_tipe,
                "kendaraan_merk" => $request->kendaraan_merk,
                "kendaraan_kondisi" => $request->kendaraan_kondisi,
                "kendaraan_max_mil" => $request->kendaraan_max_mil,
                "kendaraan_tahun" => $request->kendaraan_tahun,
                "kendaraan_status" => $request->kendaraan_status,
                "kendaraan_jenis_transmisi" => $request->kendaraan_jenis_transmisi,
                "kendaraan_jenis_body" => $request->kendaraan_jenis_body,
                "updated_at" => now()
            ]);
            $status_info = "Data Kendaran " . $kendaraan_nama . " telah berhasil di ubah menjadi " . $request->kendaraan_merk . ".";
            return redirect()->route('daftar-kendaraan')->with('status', $status_info);
        }
    }
}
