<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutModel extends Model
{
    use HasFactory;
    protected $table = "about";
    protected $fillable = [
        "id_about",
        "judul",
        "description",
        "gambar",
        "visi",
        "misi",
        "map_embed",
        "small_map_embed",
    ];
    public $timestamps = false;
}
