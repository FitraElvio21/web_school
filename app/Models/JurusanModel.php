<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurusanModel extends Model
{
    use HasFactory;
    protected $table ="jurusan";
    protected $fillable = [
        "id_jurusan",
        "jurusan",
        "description",
        "foto",
    ];
    public $timestamps = false;
}
