<?php

namespace App\Http\Controllers;

use App\Models\ServiceModel;
use Faker\Factory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $data = ServiceModel::all();
        return view('admin.pages.service.service', compact('data'));
    }
    public function createForm()
    {
        return view('admin.pages.service.addForm');
    }
    public function create(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "icon" => "required|max:2000"
        ]);
        $file = $request->file('icon');
        $nama_file = rand(1111,9999) . $file->getClientOriginalName();

        if(!$request->hasFile('icon')){
            return redirect()->back()->withErrors('Kesalahan pada upload gambar!');
        }
        $uploadImages = $file->move(public_path() . "/images/service/", $nama_file);
        $uuid = Factory::create('id_ID')->uuid();

        $service = ServiceModel::create([
            "id_service"=>$uuid,
            "title" =>$request->title,
            "description" =>$request->description,
            "icon"=>$nama_file
        ]);
        if($service){
            return redirect('/admin/service')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idService)
    {
        $service = ServiceModel::where("id_service", "=", $idService)->first();
        return view('admin.pages.service.editForm', compact('service'));
    }
    public function update(Request $request, $idService)
    {
        $this->validate($request,[
            "title" => "required",
            "description" => "required"
        ]);
        $service = ServiceModel::where("id_service", "=", $idService)->first();
        $cekIcon = $request->hasFile('icon');
        $nama_file = "";
        if ($cekIcon){
            $oldIcon = public_path() . "/images/service/" . $service['icon'];

            if (file_exists($oldIcon)) {
                unlink($oldIcon);
            }
            $file = $request->file('icon');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/service/", $nama_file);
        }
        $update = ServiceModel::where('id_service', $idService);
        $update->update([
            "title" => $request->title,
            "description" => $request->description,
            "icon" => ($cekIcon) ? $nama_file : $service['icon']
        ]);

        if ($update){
            return redirect('admin/service')->withSuccess("Service berhasil diubah");
        }else{
            return redirect()->back()->withErrors("Service gagal diubah");
        }
    }
    public function delete($idService)
    {
        $old_data = ServiceModel::where("id_service", "=", $idService)->first();

        $path = public_path() . "/images/service/" . $old_data['icon'];

        if(file_exists($path)){
            unlink($path);
        }

        $service = ServiceModel::where("id_service", "=", $idService);
        $service->delete();

        if($service){
            return redirect('admin/service/')->withSuccess("Data service berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data service gagal di hapus");
        }
    }
}
