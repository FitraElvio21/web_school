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
        "tanggal_post",
        "author",
        "isi",
        "gambar",
    ];
    public $timestamps = false;
}
