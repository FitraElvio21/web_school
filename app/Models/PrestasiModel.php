<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestasiModel extends Model
{
    use HasFactory;
    protected $table = "prestasi";
    protected $fillable = [
        "id_prestasi",
        "judul",
        "tanggal_post",
        "author",
        "description",
        "gambar",
    ];
    public $timestamps = false;
 }
