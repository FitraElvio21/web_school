<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioModel extends Model
{
    use HasFactory;
    protected $table = "portfolio";
    protected $fillable = [
        "id_portfolio",
        "nama_tempat",
        "tanggal_post",
        "author",
        "gambar",
    ];
    public $timestamps = false;
}
