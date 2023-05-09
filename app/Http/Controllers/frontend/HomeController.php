<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\BeritaModel;
use App\Models\JurusanModel;
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
        ];
        return view('frontend.index', $data);
    }
}
