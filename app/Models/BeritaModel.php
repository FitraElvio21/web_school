<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    use HasFactory;
    protected $table = "berita";
    protected $fillable = [
        "id_berita",
        "judul",
        "isi",
        "gambar",
    ];
    public $timestamps = false;
}
