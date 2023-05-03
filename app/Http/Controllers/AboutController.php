<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use Faker\Factory;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $data = AboutModel::first();
        return view('admin.pages.about.about', compact('data'));
    }
    
    public function detail($idAbout)
    {
        $data = AboutModel::where("id_about", "=", $idAbout)->first();
        return view('admin.pages.about.detailabout', compact('data'));
    }
    public function editForm($idAbout)
    {
        $about = AboutModel::where("id_about", "=", $idAbout)->first();
        return view('admin.pages.about.editForm', compact('about'));
    }
    public function update(Request $request, $idAbout)
    {
        $this->validate($request,[
            "judul" => "required",
            "description" => "required",
            "visi" => "required",
            "misi" => "required",
        ]);
        $about = AboutModel::where("id_about", "=", $idAbout)->first();
        $cekGambar = $request->hasFile('gambar');
        $nama_file = "";
        if ($cekGambar){
            $oldGambar = public_path() . "/images/about/" . $about['gambar'];

            if (file_exists($oldGambar)) {
                unlink($oldGambar);
            }
            $file = $request->file('gambar');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/about/", $nama_file);
        }
        $update = AboutModel::where('id_about', $idAbout);
        $update->update([
            "judul" => $request->judul,
            "description" => $request->description,
            "gambar" => ($cekGambar) ? $nama_file : $about['gambar'],
            "visi" => $request->visi,
            "misi" => $request->misi
        ]);

        if ($update){
            return redirect('admin/about')->withSuccess("about berhasil diubah");
        }else{
            return redirect()->back()->withErrors("about gagal diubah");
        }
    }
}
