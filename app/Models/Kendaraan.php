<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rental;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = "kendaraan";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
}
