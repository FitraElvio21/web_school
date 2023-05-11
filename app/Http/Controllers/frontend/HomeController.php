<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
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
            "jurusan" => JurusanModel::limit(3)->get(),
            "testimoni" => TestimoniModel::all(),
            "prestasi" => PrestasiModel::all(),
            "berita" => BeritaModel::all(),
            "organisasi" => OrganisasiModel::limit(4)->get(),
            "logo" => LogoModel::first(),
            "about" => AboutModel::first(),
        ];
        return view('frontend.index', $data);
    }
    public function detailBerita($idBerita)
    {
        $data = [
            "logo" => LogoModel::first(),
            "berita" => BeritaModel::where('id_berita', '=', $idBerita)->first(),

        ];
        return view('frontend.detail_berita', $data);
    }

    public function detailJurusan()
    {
        $data = [
            "logo" => LogoModel::first(),
            "jurusan" => JurusanModel::all(),
        ];
        return view('frontend.detail_jurusan', $data);
    }
    public function detailOrganisasi()
    {
        $data = [
            "logo" => LogoModel::first(),
            "organisasi" => OrganisasiModel::all(),
        ];
        return view('frontend.detail_organisasi', $data);
    }
}
