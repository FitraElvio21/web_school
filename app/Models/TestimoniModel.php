<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimoniModel extends Model
{
    use HasFactory;
    protected $table = "testimoni";
    protected $fillable = [
        "id_testimoni",
        "nama",
        "pekerjaan",
        "foto",
        "pesan",
    ];
    public $timestamps = false;
}
