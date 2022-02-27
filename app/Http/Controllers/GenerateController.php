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
use App\Models\Mobil;
use App\Models\Rental;

class GenerateController extends Controller
{
    public function generate_pengguna()
    {
        $faker                  = Faker::create('id_ID');
        for ($i = 0; $i < 10; $i++) {

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

    public function generate_mobil()
    {
        $faker                  = Faker::create('id_ID');
        for ($i=0; $i < 2; $i++) {

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
            $arr_kondisi= ["BARU", "LAMA"];
            $arr_merk= ["TOYOTA","HONDA","DAIHATSU","SUZUKI","MITSUBISHI","KIA","NISSAN","DATSUN"];
            $arr_tahun = [2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020];
            $arr_max_mil = [10000, 20000, 30000, 40000, 50000, 60000, 70000, 80000, 90000, 100000];

            $random_transmisi = Arr::random($arr_transmisi);
            $random_jenis_body = Arr::random($arr_jenis_body);
            $random_tahun = Arr::random($arr_tahun);
            $random_max_mil = Arr::random($arr_max_mil);
            $random_kondisi = Arr::random($arr_kondisi);
            $random_merk = Arr::random($arr_merk);

            $mobil = new Mobil;
            $save_mobil = $mobil->create([
                "mobil_deskripsi" => ,
                "mobil_merk" => $random_merk,
                "mobil_kondisi" => $random_kondisi,
                "mobil_tipe_model" => "DEFAULT",
                "mobil_max_mil" => $random_max_mil,
                "mobil_tahun" => $random_tahun,
                "mobil_jenis_transmisi" => $random_transmisi,
                "mobil_jenis_body" => $random_jenis_body,
            ]);
        }
    }
}
