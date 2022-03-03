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

class GenerateController extends Controller
{
    public function generate_pengguna()
    {
        $faker                  = Faker::create('id_ID');
        for ($i = 0; $i < 20; $i++) {

            // DATA PENGGUNA
            $arr_jenis_kelamin  = ["L", "P"];
            $arr_status_pendaftaran = ["DISETUJUI", "BELUM DISETUJUI"];
            $arr_status_pembayaran = ["DIPROSES", "SELESAI", "DIBATALKAN"];
            $arr_number  = [1, 2, 3];

            $random_number = Arr::random($arr_number);
            $random_jenis_kelamin = Arr::random($arr_jenis_kelamin);

            switch ($random_jenis_kelamin) {
                case 'L':
                    $data_foto = "default-img/male.jpg";
                    $nama_depan = $faker->firstNameMale();
                    $nama_belakang = $faker->lastNameMale();
                    $nama_lengkap = $nama_depan . " " . $faker->words($random_number, true) . " " . $nama_belakang;
                    break;
                case 'P':
                    $data_foto = "default-img/female.jpg";
                    $nama_depan = $faker->firstNameFemale();
                    $nama_belakang = $faker->lastNameFemale();
                    $nama_lengkap = $nama_depan . " " . $faker->words($random_number, true) . " " . $nama_belakang;
                    break;
            }

            $data_customer = new Data;
            $save_customer = $data_customer->create([
                'data_foto' => $data_foto,
                'data_nama_lengkap' => $nama_lengkap,
                'data_jenis_kelamin' => $random_jenis_kelamin,
                'data_email' => $faker->email(),
                'data_telepon' => $faker->phoneNumber(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $save_customer->save();

            // LOGIN
            $login_model            = new Login;
            $password               = '12345';
            $hashPassword           = Hash::make($password, [
                'rounds' => 12,
            ]);
            $token_raw              = Str::random(16);
            $token                  = Hash::make($token_raw, [
                'rounds' => 12,
            ]);
            $level                  = "customer";
            $login_status           = "verified";
            $login_data = $login_model->create([
                'login_nama'        => $save_customer->data_nama_lengkap,
                'login_username'    => 'customer' . $i . strtoupper(Str::random(5)),
                'login_password'    => $hashPassword,
                'login_email'       => $save_customer->data_email,
                'login_telepon'     => $save_customer->data_telepon,
                'login_token'       => $token,
                'login_level'       => $level,
                'login_status'      => $login_status,
                'created_at'        => now(),
                'updated_at'        => now()
            ]);
            $login_data->save();
            $login_data->data()->associate($save_customer->id);
            $login_data->save();
        }
        return redirect()->route('dashboard');
    }

    public function generate_kendaraan()
    {
        $faker                  = Faker::create('id_ID');
        for ($i=0; $i < 40; $i++) {
            $arr_number  = [1, 2, 3, 4, 5];
            $arr_transmisi = [
                "AUTOMATIC",
                "MANUAL",
                "SEMI-AUTOMATIC"
            ];
            $arr_jenis_body = [
                "COMPACT",
                "CONVERTIBLE",
                "COUPLE",
                "MVP",
                "OFF-ROAD",
                "LAINNYA",
                "SEDAN",
                "SEDANO",
                "STATION WAGON",
                "SUV", "TRANSPORTER",
                "VAN"
            ];
            $arr_foto_mobil = [
                "mobil1.jpg",
                "mobil2.jpg",
                "mobil3.jpg",
                "mobil4.jpg",
                "mobil5.jpg",
                "mobil6.jpg",
                "mobil7.jpg"
            ];
            $arr_foto_motor = [
                "motor1.jpg",
                "motor2.jpg",
                "motor3.jpg",
                "motor4.jpg",
                "motor5.jpg",
                "motor6.jpg",
                "motor7.jpg",
                "motor8.jpg",
                "motor9.jpg",
                "motor10.jpg"
            ];

            $arr_kondisi = ["BARU", "LAMA"];
            $arr_status = ["TERSEDIA", "RENTAL", "KOSONG"];
            $arr_tipe_kendaraan = ["MOBIL", "MOTOR"];
            $arr_merk = ["TOYOTA","HONDA","DAIHATSU","SUZUKI","MITSUBISHI","KIA","NISSAN","DATSUN"];
            $arr_tahun = [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020];
            $arr_max_mil = [10000, 20000, 30000, 40000, 50000, 60000, 70000, 80000, 90000, 100000];

            $random_tipe_kendaraan = Arr::random($arr_tipe_kendaraan);
            $random_transmisi = Arr::random($arr_transmisi);
            $random_jenis_body = Arr::random($arr_jenis_body);
            $random_tahun = Arr::random($arr_tahun);
            $random_max_mil = Arr::random($arr_max_mil);
            $random_kondisi = Arr::random($arr_kondisi);
            $random_merk = Arr::random($arr_merk);
            $random_number = Arr::random($arr_number);
            $random_status = Arr::random($arr_status);

            switch ($random_tipe_kendaraan) {
                case 'MOBIL':
                    $random_gambar_kendaraan = Arr::random($arr_foto_mobil);
                    break;
                case 'MOTOR':
                    $random_gambar_kendaraan = Arr::random($arr_foto_motor);
                    break;
            }

            $kendaraan = new Kendaraan;
            $save_kendaraan = $kendaraan->create([
                "kendaraan_deskripsi" => $faker->paragraph($random_number, false),
                "kendaraan_tipe" => $random_gambar_kendaraan,
                "kendaraan_tipe" => $random_tipe_kendaraan,
                "kendaraan_merk" => $random_merk,
                "kendaraan_kondisi" => $random_kondisi,
                "kendaraan_max_mil" => $random_max_mil,
                "kendaraan_tahun" => $random_tahun,
                "kendaraan_status" => $random_status,
                "kendaraan_jenis_transmisi" => $random_transmisi,
                "kendaraan_jenis_body" => $random_jenis_body,
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
        return redirect()->route('dashboard');
    }

    public function chained_generate()
    {
        $this->generate_pengguna();
        $this->generate_kendaraan();
        return redirect()->route('dashboard');
    }
}
