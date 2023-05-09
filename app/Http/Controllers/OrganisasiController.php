<?php

namespace App\Http\Controllers;

use App\Models\OrganisasiModel;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index()
    {
        $data = OrganisasiModel::all();
        return view('admin.pages.organisasi.organisasi', compact('data'));
    }
    public function createForm()
    {
        return view('admin.pages.organisasi.addForm');
    }
    public function detail($idOrganisasi)
    {
        $data = OrganisasiModel::where("id_organisasi", "=", $idOrganisasi)->first();
        return view('admin.pages.organisasi.detailOrganisasi', compact('data'));
    }
    public function create(Request $request)
    {
        $request->validate([
            "organisasi" => "required",
            "deskripsi" => "required",
            "gambar" => "required|max:2000"
        ]);
        $file = $request->file('gambar');
        $nama_file = rand(1111,9999) . $file->getClientOriginalName();

        if(!$request->hasFile('gambar')){
            return redirect()->back()->withErrors('Kesalahan pada upload gambar!');
        }
        $uploadImages = $file->move(public_path() . "/images/organisasi/", $nama_file);
        $uuid = Factory::create('id_ID')->uuid();

        $organisasi = OrganisasiModel::create([
            "id_organisasi"=>$uuid,
            "organisasi" =>$request->organisasi,
            "deskripsi" =>$request->deskripsi,
            "gambar"=>$nama_file
        ]);
        if($organisasi){
            return redirect('/admin/organisasi')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idOrganisasi)
    {
        $organisasi = OrganisasiModel::where("id_organisasi", "=", $idOrganisasi)->first();
        return view('admin.pages.organisasi.editForm', compact('organisasi'));
    }
    public function update(Request $request, $idOrganisasi)
    {
        $this->validate($request,[
            "organisasi" => "required",
            "deskripsi" => "required"
        ]);
        $organisasi = OrganisasiModel::where("id_organisasi", "=", $idOrganisasi)->first();
        $cekGambar = $request->hasFile('gambar');
        $nama_file = "";
        if ($cekGambar){
            $oldGambar = public_path() . "/images/organisasi/" . $organisasi['gambar'];

            if (file_exists($oldGambar)) {
                unlink($oldGambar);
            }
            $file = $request->file('gambar');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/organisasi/", $nama_file);
        }
        $update = OrganisasiModel::where('id_organisasi', $idOrganisasi);
        $update->update([
            "organisasi" => $request->organisasi,
            "deskripsi" => $request->deskripsi,
            "gambar" => ($cekGambar) ? $nama_file : $organisasi['gambar']
        ]);

        if ($update){
            return redirect('admin/organisasi')->withSuccess("organisasi berhasil diubah");
        }else{
            return redirect()->back()->withErrors("organisasi gagal diubah");
        }
    }
    public function delete($idOrganisasi)
    {
        $old_data = OrganisasiModel::where("id_organisasi", "=", $idOrganisasi)->first();

        $path = public_path() . "/images/organisasi/" . $old_data['gambar'];

        if(file_exists($path)){
            unlink($path);
        }

        $organisasi = OrganisasiModel::where("id_organisasi", "=", $idOrganisasi);
        $organisasi->delete();

        if($organisasi){
            return redirect('admin/organisasi/')->withSuccess("Data organisasi berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data organisasi gagal di hapus");
        }
    }
}
