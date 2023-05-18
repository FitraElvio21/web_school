<?php

namespace App\Http\Controllers;

use App\Models\GolonganModel;
use Faker\Factory;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $data = GolonganModel::all();
        return view('admin.pages.golongan.golongan', compact('data'));
    }
    public function createForm()
    {
        return view('admin.pages.golongan.addForm');
    }
    public function create(Request $request)
    {
        $request->validate([
            "golongan" => "required",
            "tanggal_buka" => "required",
            "tanggal_tutup" => "required",
        ]);
        $uuid = Factory::create('id_ID')->uuid();

        $golongan = GolonganModel::create([
            "id_golongan"=>$uuid,
            "golongan" =>$request->golongan,
            "tanggal_buka" =>$request->tanggal_buka,
            "tanggal_tutup" =>$request->tanggal_tutup,
        ]);
        if($golongan){
            return redirect('/admin/golongan')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idGolongan)
    {
        $golongan = GolonganModel::where("id_golongan", "=", $idGolongan)->first();
        return view('admin.pages.golongan.editForm', compact('golongan'));
    }
    public function update(Request $request, $idGolongan)
    {
        $this->validate($request,[
            "golongan" => "required",
            "tanggal_buka" => "required",
            "tanggal_tutup" => "required"
        ]);
        $golongan = GolonganModel::where("id_golongan", "=", $idGolongan)->first();

        $update = GolonganModel::where('id_golongan', $idGolongan);
        $update->update([
            "golongan" => $request->golongan,
            "tanggal_buka" => $request->tanggal_buka,
            "tanggal_tutup" => $request->tanggal_tutup,
        ]);

        if ($update){
            return redirect('admin/golongan')->withSuccess("golongan berhasil diubah");
        }else{
            return redirect()->back()->withErrors("golongan gagal diubah");
        }
    }
    public function delete($idGolongan)
    {
        $old_data = GolonganModel::where("id_golongan", "=", $idGolongan)->first();

        $golongan = GolonganModel::where("id_golongan", "=", $idGolongan);
        $golongan->delete();

        if($golongan){
            return redirect('admin/golongan/')->withSuccess("Data golongan berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data golongan gagal di hapus");
        }
    }
}

