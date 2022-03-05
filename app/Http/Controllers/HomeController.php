<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::latest()->get();
        return view('home.index', [
            'kendaraan' => $kendaraan
        ]);
    }
}
