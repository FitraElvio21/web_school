<?php

namespace App\Http\Controllers;

use App\Models\LogoModel;
use Faker\Factory;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function index()
    {
        $data = LogoModel::first();
        return view('admin.pages.logo.logo', compact('data'));
    }

    public function editForm($idLogo)
    {
        $logo = LogoModel::where("id_logo", "=", $idLogo)->first();
        return view('admin.pages.logo.editForm', compact('logo'));
    }
    public function update(Request $request, $idLogo)
    {
        $this->validate($request, [
            "nama" => "required"
        ]);
        $logo = LogoModel::where("id_logo", "=", $idLogo)->first();
        $cekLogo = $request->hasFile('logo');
        $nama_file = "";
        if ($cekLogo) {
            $oldLogo = public_path() . "/images/logo/" . $logo['logo'];

            if (file_exists($oldLogo)) {
                unlink($oldLogo);
            }
            $file = $request->file('logo');
            $nama_file = rand(1111, 9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/logo/", $nama_file);
        }
        $update = LogoModel::where('id_logo', $idLogo);
        $update->update([
            "nama" => $request->nama,
            "logo" => ($cekLogo) ? $nama_file : $logo['logo']
        ]);

        if ($update) {
            return redirect('admin/logo')->withSuccess("logo berhasil diubah");
        } else {
            return redirect()->back()->withErrors("logo gagal diubah");
        }
    }
}
