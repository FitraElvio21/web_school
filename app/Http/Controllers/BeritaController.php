<?php

namespace App\Http\Controllers;

use App\Models\BeritaModel;
use Faker\Factory;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = BeritaModel::all();
        return view('admin.pages.berita.berita', compact('data'));
    }
    public function createForm()
    {
        return view('admin.pages.berita.addForm');
    }
    public function detail($idBerita)
    {
        $data = BeritaModel::where("id_berita", "=", $idBerita)->first();
        return view('admin.pages.berita.detailBerita', compact('data'));
    }
    public function create(Request $request)
    {
        $request->validate([
            "judul" => "required",
            "isi" => "required",
            "gambar" => "required|max:2000"
        ]);
        $file = $request->file('gambar');
        $nama_file = rand(1111,9999) . $file->getClientOriginalName();

        if(!$request->hasFile('gambar')){
            return redirect()->back()->withErrors('Kesalahan pada upload gambar!');
        }
        $uploadImages = $file->move(public_path() . "/images/berita/", $nama_file);
        $uuid = Factory::create('id_ID')->uuid();

        $berita = BeritaModel::create([
            "id_berita"=>$uuid,
            "judul" =>$request->judul,
            "isi" =>$request->isi,
            "gambar"=>$nama_file
        ]);
        if($berita){
            return redirect('/admin/berita')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idBerita)
    {
        $berita = BeritaModel::where("id_berita", "=", $idBerita)->first();
        return view('admin.pages.berita.editForm', compact('berita'));
    }
    public function update(Request $request, $idBerita)
    {
        $this->validate($request,[
            "judul" => "required",
            "isi" => "required"
        ]);
        $berita = BeritaModel::where("id_berita", "=", $idBerita)->first();
        $cekGambar = $request->hasFile('gambar');
        $nama_file = "";
        if ($cekGambar){
            $oldGambar = public_path() . "/images/berita/" . $berita['gambar'];

            if (file_exists($oldGambar)) {
                unlink($oldGambar);
            }
            $file = $request->file('gambar');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/berita/", $nama_file);
        }
        $update = BeritaModel::where('id_berita', $idBerita);
        $update->update([
            "judul" => $request->judul,
            "isi" => $request->isi,
            "gambar" => ($cekGambar) ? $nama_file : $berita['gambar']
        ]);

        if ($update){
            return redirect('admin/berita')->withSuccess("berita berhasil diubah");
        }else{
            return redirect()->back()->withErrors("berita gagal diubah");
        }
    }
    public function delete($idBerita)
    {
        $old_data = BeritaModel::where("id_berita", "=", $idBerita)->first();

        $path = public_path() . "/images/berita/" . $old_data['gambar'];

        if(file_exists($path)){
            unlink($path);
        }

        $berita = BeritaModel::where("id_berita", "=", $idBerita);
        $berita->delete();

        if($berita){
            return redirect('admin/berita/')->withSuccess("Data berita berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data berita gagal di hapus");
        }
    }
}


