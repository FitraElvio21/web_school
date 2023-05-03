<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;
    protected $table="profile";
    protected $fillable = [
        "id_profile",
        "gambar",
        "judul",
        "description",
    ];
    public $timestamps = false;
}
