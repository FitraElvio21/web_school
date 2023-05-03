<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;
    protected $table = "service";
    protected $fillable = [
        "id_service",
        "title",
        "description",
        "icon",
    ];
    public $timestamps = false;
}
