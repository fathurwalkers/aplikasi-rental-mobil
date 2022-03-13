<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Data;
use App\Models\Login;
use App\Models\Kendaraan;
use App\Models\Rental;

class BackController extends Controller
{
    public function index()
    {
        $session_user = session('data_login');
        $user_login = Login::findOrFail($session_user->id);
        switch ($session_user->login_level) {
            case "admin":
                $data               = Data::all()->count();
                $login              = Login::all()->count();
                $kendaraan          = Kendaraan::all()->count();
                $rental             = Rental::all()->count();
                return view('dashboard.index', [
                    'data'          => $data,
                    'login'         => $login,
                    'kendaraan'     => $kendaraan,
                    'rental'        => $rental
                ]);
                break;
            case "customer":
                $user_data = Data::find($user_login->data_id);
                if ($user_data == null) {
                    return redirect()->route('pendaftaran-data-customer')->with('status', 'Anda belu mempunyai Data customer, silahkan melakukan pengisian form data customer sebelum mengakses halaman lain pada Dashboard Panel ini. ');
                } else {
                    return view('dashboard.index');
                }
                break;
        }
    }

    public function login()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function register()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('dashboard');
        }
        return view('register');
    }

    public function logout(Request $request)
    {
        $users = session('data_login');
        $request->session()->forget(['data_login']);
        $request->session()->flush();
        return redirect()->route('login')->with('status', 'Anda telah logout!');
    }

    public function postlogin(Request $request)
    {
        $cariUser = Login::where('login_username', $request->login_username)->get();
        if ($cariUser->isEmpty()) {
            return back()->with('status', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('login_username', $request->login_username)->firstOrFail();
        switch ($data_login->login_level) {
            case 'admin':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
                    }
                }
                break;
            case 'customer':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
                    }
                }
                break;
            // case 'pendaftar':
            //     $cek_password = Hash::check($request->login_password, $data_login->login_password);
            //     if ($data_login) {
            //         if ($cek_password) {
            //             $users = session(['data_login' => $data_login]);
            //             return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
            //         }
            //     }
            //     break;
        }
        return back()->with('status', 'Maaf username atau password salah!')->withInput();
    }

    public function postregister(Request $request)
    {
        $validatedLogin                 = $request->validate([
            'login_nama'                => 'required',
            'login_username'            => 'required',
            'login_password'            => 'required',
            'login_email'               => 'required',
            'login_telepon'             => 'required'
        ]);
        if ($validatedLogin["login_password"] !== $request->login_password2) {
            return back()->with('status', 'Password harus sama.')->withInput();
        }
        $hashPassword                   = Hash::make($validatedLogin["login_password"], [
            'rounds' => 12,
        ]);
        $token_raw                      = Str::random(16);
        $token                          = Hash::make($token_raw, [
            'rounds' => 12,
        ]);
        $level                          = "customer";
        $login_status                   = "verified";
        $login_data                     = new Login;
        $save_login                     = $login_data->create([
            'login_nama'                => $validatedLogin["login_nama"],
            'login_username'            => $validatedLogin["login_username"],
            'login_password'            => $hashPassword,
            'login_email'               => $validatedLogin["login_email"],
            'login_telepon'             => $validatedLogin["login_telepon"],
            'login_token'               => $token,
            'login_level'               => $level,
            'login_status'              => $login_status,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
        $save_login->save();
        return redirect()->route('login')->with('status', 'Berhasil melakukan registrasi!');
    }
}
