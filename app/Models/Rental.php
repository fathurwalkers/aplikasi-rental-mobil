<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data;
use App\Models\Kendaraan;

class Rental extends Model
{
    use HasFactory;

    protected $table = "rental";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function data()
    {
        return $this->belongsTo(Data::class, 'data_id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
