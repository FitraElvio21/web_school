<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisasiModel extends Model
{
    use HasFactory;
    protected $table = "organisasi";
    protected $fillable = [
        "id_organisasi",
        "organisasi",
        "deskripsi",
        "gambar"
    ];
    public $timestamps = false;
}
