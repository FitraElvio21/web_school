<?php

namespace App\Http\Controllers;

use App\Models\JurusanModel;
use Faker\Factory;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data = JurusanModel::all();
        return view('admin.pages.jurusan.jurusan', compact('data'));
    }
    public function createForm()
    {
        return view('admin.pages.jurusan.addForm');
    }
    public function detail($idJurusan)
    {
        $data = JurusanModel::where("id_jurusan", "=", $idJurusan)->first();
        return view('admin.pages.jurusan.detailjurusan', compact('data'));
    }
    public function create(Request $request)
    {
        $request->validate([
            "jurusan" => "required",
            "description" => "required",
            "foto" => "required|max:2000"
        ]);
        $file = $request->file('foto');
        $nama_file = rand(1111,9999) . $file->getClientOriginalName();

        if(!$request->hasFile('foto')){
            return redirect()->back()->withErrors('Kesalahan pada upload foto!');
        }
        $uploadImages = $file->move(public_path() . "/images/jurusan/", $nama_file);
        $uuid = Factory::create('id_ID')->uuid();

        $jurusan = JurusanModel::create([
            "id_jurusan"=>$uuid,
            "jurusan" =>$request->jurusan,
            "description" =>$request->description,
            "foto"=>$nama_file
        ]);
        if($jurusan){
            return redirect('/admin/jurusan')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idJurusan)
    {
        $jurusan = JurusanModel::where("id_jurusan", "=", $idJurusan)->first();
        return view('admin.pages.jurusan.editForm', compact('jurusan'));
    }
    public function update(Request $request, $idJurusan)
    {
        $this->validate($request,[
            "jurusan" => "required",
            "description" => "required"
        ]);
        $jurusan = JurusanModel::where("id_jurusan", "=", $idJurusan)->first();
        $cekfoto = $request->hasFile('foto');
        $nama_file = "";
        if ($cekfoto){
            $oldfoto = public_path() . "/images/jurusan/" . $jurusan['foto'];

            if (file_exists($oldfoto)) {
                unlink($oldfoto);
            }
            $file = $request->file('foto');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/jurusan/", $nama_file);
        }
        $update = JurusanModel::where('id_jurusan', $idJurusan);
        $update->update([
            "jurusan" => $request->jurusan,
            "description" => $request->description,
            "foto" => ($cekfoto) ? $nama_file : $jurusan['foto']
        ]);

        if ($update){
            return redirect('admin/jurusan')->withSuccess("jurusan berhasil diubah");
        }else{
            return redirect()->back()->withErrors("jurusan gagal diubah");
        }
    }
    public function delete($idJurusan)
    {
        $old_data = JurusanModel::where("id_jurusan", "=", $idJurusan)->first();

        $path = public_path() . "/images/jurusan/" . $old_data['foto'];

        if(file_exists($path)){
            unlink($path);
        }

        $jurusan = JurusanModel::where("id_jurusan", "=", $idJurusan);
        $jurusan->delete();

        if($jurusan){
            return redirect('admin/jurusan/')->withSuccess("Data jurusan berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data jurusan gagal di hapus");
        }
    }
}
