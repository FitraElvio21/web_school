<?php

namespace App\Http\Controllers;

use App\Models\TestimoniModel;
use Faker\Factory;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $data = TestimoniModel::all();
        return view('admin.pages.testimoni.testimoni', compact('data'));
    }
    public function createForm()
    {
        return view('admin.pages.testimoni.addForm');
    }
    public function create(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "pekerjaan" => "required",
            "foto" => "required|max:2000",
            "pesan" => "required"
        ]);
        $file = $request->file('foto');
        $nama_file = rand(1111,9999) . $file->getClientOriginalName();

        if(!$request->hasFile('foto')){
            return redirect()->back()->withErrors('Kesalahan pada upload foto!');
        }
        $uploadImages = $file->move(public_path() . "/images/testimoni/", $nama_file);
        $uuid = Factory::create('id_ID')->uuid();

        $testimoni = TestimoniModel::create([
            "id_testimoni"=>$uuid,
            "nama" =>$request->nama,
            "pekerjaan" =>$request->pekerjaan,
            "foto"=>$nama_file,
            "pesan" =>$request->pesan
        ]);
        if($testimoni){
            return redirect('/admin/testimoni')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idTestimoni)
    {
        $testimoni = TestimoniModel::where("id_testimoni", "=", $idTestimoni)->first();
        return view('admin.pages.testimoni.editForm', compact('testimoni'));
    }
    public function update(Request $request, $idTestimoni)
    {
        $this->validate($request,[
            "nama" => "required",
            "pekerjaan" => "required",
            "pesan" => "required"
        ]);
        $testimoni = TestimoniModel::where("id_testimoni", "=", $idTestimoni)->first();
        $cekFoto = $request->hasFile('foto');
        $nama_file = "";
        if ($cekFoto){
            $oldfoto = public_path() . "/images/testimoni/" . $testimoni['foto'];

            if (file_exists($oldfoto)) {
                unlink($oldfoto);
            }
            $file = $request->file('foto');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/testimoni/", $nama_file);
        }
        $update = TestimoniModel::where('id_testimoni', $idTestimoni);
        $update->update([
            "nama" => $request->nama,
            "pekerjaan" => $request->pekerjaan,
            "foto" => ($cekFoto) ? $nama_file : $testimoni['foto'],
            "pesan" => $request->pesan
        ]);

        if ($update){
            return redirect('admin/testimoni')->withSuccess("testimoni berhasil diubah");
        }else{
            return redirect()->back()->withErrors("testimoni gagal diubah");
        }
    }
    public function delete($idTestimoni)
    {
        $old_data = TestimoniModel::where("id_testimoni", "=", $idTestimoni)->first();

        $path = public_path() . "/images/testimoni/" . $old_data['foto'];

        if(file_exists($path)){
            unlink($path);
        }

        $testimoni = TestimoniModel::where("id_testimoni", "=", $idTestimoni);
        $testimoni->delete();

        if($testimoni){
            return redirect('admin/testimoni/')->withSuccess("Data testimoni berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data testimoni gagal di hapus");
        }
    }
}

