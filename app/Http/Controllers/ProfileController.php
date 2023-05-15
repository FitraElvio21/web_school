<?php

namespace App\Http\Controllers;

use App\Models\ProfileModel;
use Faker\Factory;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $data = ProfileModel::all();
        return view('admin.pages.profile.profile', compact('data'));
    }

    public function detail($idProfile)
    {
        $data = ProfileModel::where("id_profile", "=", $idProfile)->first();
        return view('admin.pages.profile.detailProfile', compact('data'));
    }
    public function editForm($idProfile)
    {
        $profile = ProfileModel::where("id_profile", "=", $idProfile)->first();
        return view('admin.pages.profile.editForm', compact('profile'));
    }
    public function update(Request $request, $idProfile)
    {
        $this->validate($request,[
            "judul" => "required",
            "description" => "required"
        ]);
        $profile = ProfileModel::where("id_profile", "=", $idProfile)->first();
        $cekGambar = $request->hasFile('gambar');
        $nama_file = "";
        if ($cekGambar){
            $oldGambar = public_path() . "/images/profile/" . $profile['gambar'];

            if (file_exists($oldGambar)) {
                unlink($oldGambar);
            }
            $file = $request->file('gambar');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/profile/", $nama_file);
        }
        $update = ProfileModel::where('id_profile', $idProfile);
        $update->update([
            "gambar" => ($cekGambar) ? $nama_file : $profile['gambar'],
            "judul" => $request->judul,
            "description" => $request->description
        ]);

        if ($update){
            return redirect('admin/profile')->withSuccess("Profile berhasil diubah");
        }else{
            return redirect()->back()->withErrors("Profile gagal diubah");
        }
    }
}

