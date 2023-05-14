<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesanModel extends Model
{
    use HasFactory;
    protected $table = "pesan";
    protected $fillable = [
        "id_pesan",
        "nama_depan",
        "nama_belakang",
        "email",
        "pesan",
    ];
    public $timestamps = false;
}
