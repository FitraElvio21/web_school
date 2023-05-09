<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use App\Models\JurusanModel;
use App\Models\LogoModel;
use App\Models\OrganisasiModel;
use App\Models\PrestasiModel;
use App\Models\TestimoniModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            "jurusan" => JurusanModel::all(),
            "testimoni" => TestimoniModel::all(),
            "prestasi" => PrestasiModel::all(),
            "berita" => BeritaModel::all(),
            "organisasi" => OrganisasiModel::all(),
            "logo" => LogoModel::first(),
        ];
        return view('frontend.index', $data);
    }
    public function detailBerita($idBerita)
    {
        $data = BeritaModel::where('id_berita', '=', $idBerita)->first();
        return view('frontend.detail_berita', compact('data'));
    }
}
