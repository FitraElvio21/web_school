<?php

namespace App\Http\Controllers;

use App\Models\PrestasiModel;
use Faker\Factory;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index()
    {
        $data = PrestasiModel::all();
        return view('admin.pages.prestasi.prestasi', compact('data'));
    }
    public function createForm()
    {
        return view('admin.pages.prestasi.addForm');
    }
    public function detail($idPrestasi)
    {
        $data = PrestasiModel::where("id_prestasi", "=", $idPrestasi)->first();
        return view('admin.pages.prestasi.detailPrestasi', compact('data'));
    }
    public function create(Request $request)
    {
        $request->validate([
            "judul" => "required",
            "tanggal_post" => "required",
            "author" => "required",
            "description" => "required",
            "gambar" => "required|max:2000"
        ]);
        $file = $request->file('gambar');
        $nama_file = rand(1111,9999) . $file->getClientOriginalName();

        if(!$request->hasFile('gambar')){
            return redirect()->back()->withErrors('Kesalahan pada upload gambar!');
        }
        $uploadImages = $file->move(public_path() . "/images/prestasi/", $nama_file);
        $uuid = Factory::create('id_ID')->uuid();

        $prestasi = PrestasiModel::create([
            "id_prestasi"=>$uuid,
            "judul" =>$request->judul,
            "tanggal_post" =>$request->tanggal_post,
            "author" =>$request->author,
            "description" =>$request->description,
            "gambar"=>$nama_file
        ]);
        if($prestasi){
            return redirect('/admin/prestasi')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idPrestasi)
    {
        $prestasi = PrestasiModel::where("id_prestasi", "=", $idPrestasi)->first();
        return view('admin.pages.prestasi.editForm', compact('prestasi'));
    }
    public function update(Request $request, $idPrestasi)
    {
        $this->validate($request,[
            "judul" => "required",
            "tanggal_post" => "required",
            "author" => "required",
            "description" => "required",
        ]);
        $prestasi = PrestasiModel::where("id_prestasi", "=", $idPrestasi)->first();
        $cekGambar = $request->hasFile('gambar');
        $nama_file = "";
        if ($cekGambar){
            $oldGambar = public_path() . "/images/prestasi/" . $prestasi['gambar'];

            if (file_exists($oldGambar)) {
                unlink($oldGambar);
            }
            $file = $request->file('gambar');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/prestasi/", $nama_file);
        }
        $update = PrestasiModel::where('id_prestasi', $idPrestasi);
        $update->update([
            "judul" => $request->judul,
            "tanggal_post" => $request->tanggal_post,
            "author" => $request->author,
            "description" => $request->description,
            "gambar" => ($cekGambar) ? $nama_file : $prestasi['gambar']
        ]);

        if ($update){
            return redirect('admin/prestasi')->withSuccess("prestasi berhasil diubah");
        }else{
            return redirect()->back()->withErrors("prestasi gagal diubah");
        }
    }
    public function delete($idPrestasi)
    {
        $old_data = PrestasiModel::where("id_prestasi", "=", $idPrestasi)->first();

        $path = public_path() . "/images/prestasi/" . $old_data['gambar'];

        if(file_exists($path)){
            unlink($path);
        }

        $prestasi = PrestasiModel::where("id_prestasi", "=", $idPrestasi);
        $prestasi->delete();

        if($prestasi){
            return redirect('admin/prestasi/')->withSuccess("Data prestasi berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data prestasi gagal di hapus");
        }
    }
}
