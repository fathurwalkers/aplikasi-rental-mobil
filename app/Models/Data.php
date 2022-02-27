<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Rental;

class Data extends Model
{
    use HasFactory;

    protected $table = "data_pengguna";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function login()
    {
        return $this->hasMany(Login::class);
    }

    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
}
