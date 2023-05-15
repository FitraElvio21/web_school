<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use Faker\Factory;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $data = GuruModel::all();
        return view('admin.pages.guru.guru', compact('data'));
    }
    public function createForm()
    {
        return view('admin.pages.guru.addForm');
    }
    public function create(Request $request)
    {
        $request->validate([
            "nip" => "required",
            "nama" => "required",
            "gambar" => "required|max:2000"
        ]);
        $file = $request->file('gambar');
        $nama_file = rand(1111,9999) . $file->getClientOriginalName();

        if(!$request->hasFile('gambar')){
            return redirect()->back()->withErrors('Kesalahan pada upload gambar!');
        }
        $uploadImages = $file->move(public_path() . "/images/guru/", $nama_file);
        $uuid = Factory::create('id_ID')->uuid();

        $guru = GuruModel::create([
            "nip"=>$request->nip,
            "nama" =>$request->nama,
            "gambar"=>$nama_file
        ]);
        if($guru){
            return redirect('/admin/guru')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idGuru)
    {
        $guru = GuruModel::where("nip", "=", $idGuru)->first();
        return view('admin.pages.guru.editForm', compact('guru'));
    }
    public function update(Request $request, $idGuru)
    {
        $this->validate($request,[
            "nip" => "required",
            "nama" => "required",
        ]);
        $guru = GuruModel::where("nip", "=", $idGuru)->first();
        $cekGambar = $request->hasFile('gambar');
        $nama_file = "";
        if ($cekGambar){
            $oldGambar = public_path() . "/images/guru/" . $guru['gambar'];

            if (file_exists($oldGambar)) {
                unlink($oldGambar);
            }
            $file = $request->file('gambar');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/guru/", $nama_file);
        }
        $update = GuruModel::where('nip', $idGuru);
        $update->update([
            "nip" => $request->nip,
            "nama" => $request->nama,
            "gambar" => ($cekGambar) ? $nama_file : $guru['gambar']
        ]);

        if ($update){
            return redirect('admin/guru')->withSuccess("guru berhasil diubah");
        }else{
            return redirect()->back()->withErrors("guru gagal diubah");
        }
    }
    public function delete($idGuru)
    {
        $old_data = GuruModel::where("nip", "=", $idGuru)->first();

        $path = public_path() . "/images/guru/" . $old_data['gambar'];

        if(file_exists($path)){
            unlink($path);
        }

        $guru = GuruModel::where("nip", "=", $idGuru);
        $guru->delete();

        if($guru){
            return redirect('admin/guru/')->withSuccess("Data guru berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data guru gagal di hapus");
        }
    }
}



