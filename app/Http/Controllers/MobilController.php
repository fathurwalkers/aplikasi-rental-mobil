<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MobilController extends Controller
{
    public function daftar_mobil()
    {
        $mobil = Mobil::all();
        return view('dashboard.daftar-mobil', [
            'mobil' => $mobil
        ]);
    }
}
