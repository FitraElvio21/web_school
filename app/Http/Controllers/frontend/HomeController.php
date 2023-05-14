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

    function headerData()
    {
        return [
            "logo" => LogoModel::first(),
            "jurusan" => JurusanModel::all(),
            "about" => AboutModel::all(),
        ];
    }


    public function index()
    {
        $data = [
            "jurusan" => JurusanModel::limit(3)->get(),
            "testimoni" => TestimoniModel::all(),
            "prestasi" => PrestasiModel::all(),
            "berita" => BeritaModel::all(),
            "organisasi" => OrganisasiModel::limit(4)->get(),
            "header" => $this->headerData(),
            "about" => AboutModel::first(),
        ];
        return view('frontend.index', $data);
    }
    // Berita
    public function detailBerita($idBerita)
    {
        $data = [
            "header" => $this->headerData(),
            "berita" => BeritaModel::where('id_berita', '=', $idBerita)->first(),

        ];
        return view('frontend.detail_berita', $data);
    }
    public function moreBerita()
    {
        $data = [
            "header" => $this->headerData(),
            "berita" => BeritaModel::all(),
        ];
        return view('frontend.more_berita', $data);
    }
    // #Berita

    // Jurusan
    public function detailJurusan($idJurusan)
    {
        $data = [
            "header" => $this->headerData(),
            "jurusan" => JurusanModel::where('id_jurusan', '=', $idJurusan)->first(),

        ];
        return view('frontend.detail_jurusan', $data);
    }
    public function moreJurusan()
    {
        $data = [
            "header" => $this->headerData(),
            "jurusan" => JurusanModel::all(),

        ];
        return view('frontend.more_jurusan', $data);
    }
    // #Jurusan
    public function detailOrganisasi()
    {
        $data = [
            "header" => $this->headerData(),
            "organisasi" => OrganisasiModel::all(),
        ];
        return view('frontend.detail_organisasi', $data);
    }
    public function detailAbout()
    {
        $data = [
            "header" => $this->headerData(),
            "about" => AboutModel::first(),
        ];
        return view('frontend.detail_about', $data);
    }
    public function detailVisiMisi()
    {
        $data =[
            "header" => $this->headerData(),
            "about" => AboutModel::first(),
        ];
        return view('frontend.detail_visi_misi', $data);
    }
    public function contact()
    {
        $data =[
            "header" => $this->headerData(),
            "about" => AboutModel::first(),
        ];
        return view('frontend.contact', $data);
    }
}
