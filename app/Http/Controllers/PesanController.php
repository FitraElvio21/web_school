<?php

namespace App\Http\Controllers;

use App\Models\PesanModel;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $data = PesanModel::all();
        return view('admin.pages.pesan.pesan', compact('data'));
    }
    public function delete($idPesan)
    {
        $old_data = PesanModel::where("id_pesan", "=", $idPesan)->first();

        $pesan = PesanModel::where("id_pesan", "=", $idPesan);
        $pesan->delete();

        if($pesan){
            return redirect('admin/pesan/')->withSuccess("Data pesan berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data pesan gagal di hapus");
        }
    }
}

