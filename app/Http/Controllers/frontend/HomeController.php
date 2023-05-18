<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutModel;
use App\Models\BeritaModel;
use App\Models\CarouselModel;
use App\Models\GolonganModel;
use App\Models\GuruModel;
use App\Models\JurusanModel;
use App\Models\LogoModel;
use App\Models\OrganisasiModel;
use App\Models\PrestasiModel;
use App\Models\ProfileModel;
use App\Models\ServiceModel;
use App\Models\TestimoniModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class HomeController extends Controller
{

    function headerData()
    {
        return [
            "logo" => LogoModel::first(),
            "jurusan" => JurusanModel::all(),
            "about" => AboutModel::first(),
            "profile" => ProfileModel::first(),
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
            "carousel" => CarouselModel::orderBy('tanggal_post', 'ASC')->get(),
            "service" => ServiceModel::limit(3)->get(),
            "golongan_terakhir" => GolonganModel::orderBy('tanggal_buka', 'DESC')->first()
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

    // prestasi
    public function detailPrestasi($idPrestasi)
    {
        $data = [
            "header" => $this->headerData(),
            "prestasi" => PrestasiModel::where('id_prestasi', '=', $idPrestasi)->first(),

        ];
        return view('frontend.detail_prestasi', $data);
    }
    public function morePrestasi()
    {
        $data = [
            "header" => $this->headerData(),
            "prestasi" => PrestasiModel::all(),
        ];
        return view('frontend.more_prestasi', $data);
    }
    // #prestasi

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
    public function guru()
    {
        $data = [
            "header" => $this->headerData(),
            "guru" => GuruModel::all(),
        ];
        return view('frontend.guru', $data);
    }
}
