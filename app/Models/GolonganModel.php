<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganModel extends Model
{
    use HasFactory;
    protected $table = "golongan";
    protected $fillable = [
        "id_golongan",
        "golongan",
        "tanggal_buka",
        "tanggal_tutup"
    ];
    public $timestamps = false;
}
