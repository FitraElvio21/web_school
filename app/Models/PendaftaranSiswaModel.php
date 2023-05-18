<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSiswaModel extends Model
{
    use HasFactory;
    protected $table = "pendaftaran_siswa";
    protected $fillable = [
        "nisn",
        "id_jurusan",
        "id_golongan",
        "nama_depan",
        "nama_belakang",
        "jenis_kelamin",
        "alamat",
        "pass_foto",
        "nama_ayah",
        "pekerjaan_ayah",
        "penghasilan_ayah_perbulan",
        "nama_ibu",
        "pekerjaan_ibu",
        "penghasilan_ibu_perbulan",
        "agama",
    ];
    public $timestamps = false;
}
