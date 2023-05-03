<?php

namespace App\Http\Controllers;

use App\Models\PortfolioModel;
use Faker\Factory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = PortfolioModel::all();
        return view('admin.pages.portfolio.portfolio', compact('data'));
    }
    public function createForm()
    {
        return view('admin.pages.portfolio.addForm');
    }
    public function create(Request $request)
    {
        $request->validate([
            "nama_tempat" => "required",
            "tanggal_post" => "required",
            "author" => "required",
            "gambar" => "required|max:2000"
        ]);
        $file = $request->file('gambar');
        $nama_file = rand(1111,9999) . $file->getClientOriginalName();

        if(!$request->hasFile('gambar')){
            return redirect()->back()->withErrors('Kesalahan pada upload gambar!');
        }
        $uploadImages = $file->move(public_path() . "/images/portfolio/", $nama_file);
        $uuid = Factory::create('id_ID')->uuid();

        $portfolio = PortfolioModel::create([
            "id_portfolio"=>$uuid,
            "nama_tempat" =>$request->nama_tempat,
            "tanggal_post" =>$request->tanggal_post,
            "author" =>$request->author,
            "gambar"=>$nama_file
        ]);
        if($portfolio){
            return redirect('/admin/portfolio')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idPortfolio)
    {
        $portfolio = PortfolioModel::where("id_portfolio", "=", $idPortfolio)->first();
        return view('admin.pages.portfolio.editForm', compact('portfolio'));
    }
    public function update(Request $request, $idPortfolio)
    {
        $this->validate($request,[
            "nama_tempat" => "required",
            "tanggal_post" => "required",
            "author" => "required"
        ]);
        $portfolio = PortfolioModel::where("id_portfolio", "=", $idPortfolio)->first();
        $cekGambar = $request->hasFile('gambar');
        $nama_file = "";
        if ($cekGambar){
            $oldGambar = public_path() . "/images/portfolio/" . $portfolio['gambar'];

            if (file_exists($oldGambar)) {
                unlink($oldGambar);
            }
            $file = $request->file('gambar');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/portfolio/", $nama_file);
        }
        $update = PortfolioModel::where('id_portfolio', $idPortfolio);
        $update->update([
            "nama_tempat" => $request->nama_tempat,
            "tanggal_post" => $request->tanggal_post,
            "author" => $request->author,
            "gambar" => ($cekGambar) ? $nama_file : $portfolio['gambar']
        ]);

        if ($update){
            return redirect('admin/portfolio')->withSuccess("portfolio berhasil diubah");
        }else{
            return redirect()->back()->withErrors("portfolio gagal diubah");
        }
    }
    public function delete($idPortfolio)
    {
        $old_data = PortfolioModel::where("id_portfolio", "=", $idPortfolio)->first();

        $path = public_path() . "/images/portfolio/" . $old_data['gambar'];

        if(file_exists($path)){
            unlink($path);
        }

        $portfolio = PortfolioModel::where("id_portfolio", "=", $idPortfolio);
        $portfolio->delete();

        if($portfolio){
            return redirect('admin/portfolio/')->withSuccess("Data portfolio berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data portfolio gagal di hapus");
        }
    }
}

