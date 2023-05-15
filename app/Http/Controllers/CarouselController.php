<?php

namespace App\Http\Controllers;

use App\Models\CarouselModel;
use Faker\Factory;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $data = CarouselModel::all();
        return view('admin.pages.carousel.carousel', compact('data'));
    }
    public function createForm()
    {
        return view('admin.pages.carousel.addForm');
    }
    public function create(Request $request)
    {
        $request->validate([
            "judul" => "required",
            "gambar" => "required|max:2000"
        ]);
        $file = $request->file('gambar');
        $nama_file = rand(1111,9999) . $file->getClientOriginalName();

        if(!$request->hasFile('gambar')){
            return redirect()->back()->withErrors('Kesalahan pada upload gambar!');
        }
        $uploadImages = $file->move(public_path() . "/images/carousel/", $nama_file);
        $uuid = Factory::create('id_ID')->uuid();

        $carousel = CarouselModel::create([
            "id_carousel"=>$uuid,
            "judul" =>$request->judul,
            "description" =>$request->description,
            "gambar"=>$nama_file
        ]);
        if($carousel){
            return redirect('/admin/carousel')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idCarousel)
    {
        $carousel = CarouselModel::where("id_carousel", "=", $idCarousel)->first();
        return view('admin.pages.carousel.editForm', compact('carousel'));
    }
    public function update(Request $request, $idCarousel)
    {
        $this->validate($request,[
            "description" => "required"
        ]);
        $carousel = CarouselModel::where("id_carousel", "=", $idCarousel)->first();
        $cekGambar = $request->hasFile('gambar');
        $nama_file = "";
        if ($cekGambar){
            $oldGambar = public_path() . "/images/carousel/" . $carousel['gambar'];

            if (file_exists($oldGambar)) {
                unlink($oldGambar);
            }
            $file = $request->file('gambar');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/carousel/", $nama_file);
        }
        $update = CarouselModel::where('id_carousel', $idCarousel);
        $update->update([
            "judul" => $request->judul,
            "description" => $request->description,
            "gambar" => ($cekGambar) ? $nama_file : $carousel['gambar']
        ]);

        if ($update){
            return redirect('admin/carousel')->withSuccess("carousel berhasil diubah");
        }else{
            return redirect()->back()->withErrors("carousel gagal diubah");
        }
    }
    public function delete($idCarousel)
    {
        $old_data = CarouselModel::where("id_carousel", "=", $idCarousel)->first();

        $path = public_path() . "/images/carousel/" . $old_data['gambar'];

        if(file_exists($path)){
            unlink($path);
        }

        $carousel = CarouselModel::where("id_carousel", "=", $idCarousel);
        $carousel->delete();

        if($carousel){
            return redirect('admin/carousel/')->withSuccess("Data carousel berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data carousel gagal di hapus");
        }
    }
}


