<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\PesanModel;
use Faker\Factory;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "nama_depan" => "required",
            "nama_belakang" => "required",
            "email" => "required",
            "pesan" => "required",
        ]);
        $uuid = Factory::create('id_ID')->uuid();

        $pesan = PesanModel::create([
            "id_pesan"=>$uuid,
            "nama_depan" =>$request->nama_depan,
            "nama_belakang" =>$request->nama_belakang,
            "email" =>$request->email,
            "pesan" =>$request->pesan,
        ]);
        if($pesan){
            return redirect('/contact')->withSuccess('Pesan sudah berhasil masuk, silahkan menunggu balasan dari kami :) terima kasih');
        }else{
            return redirect()->back()->withErrors('Pesan gagal masuk, silahkan coba kembali :)');
        }
    }
}
