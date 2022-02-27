<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Data;
use App\Models\Mobil;

class Rental extends Model
{
    use HasFactory;

    protected $table = "rental";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function data()
    {
        return $this->belongsTo(Data::class);
    }

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}
