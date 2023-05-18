<?php

namespace App\Http\Controllers;

use App\Models\GolonganModel;
use App\Models\JurusanModel;
use App\Models\PendaftaranSiswaModel;
use Faker\Factory;
use Illuminate\Http\Request;

class PendaftaranSiswaController extends Controller
{
    public function index()
    {
        $data = PendaftaranSiswaModel::all();
        return view('admin.pages.pendaftaran_siswa.pendaftaran_siswa', compact('data'));
    }
    public function createForm()
    {

        $data = [
            "jurusan" => JurusanModel::all(),
            "golongan" => GolonganModel::all(),
        ];
        return view('admin.pages.pendaftaran_siswa.addForm',$data);
    }
    public function create(Request $request)
    {
        $request->validate([
            "nisn" => "required",
            "nama_depan" => "required",
            "nama_belakang" => "required",
            "jenis_kelamin" => "required",
            "alamat" => "required",
            "pass_foto" => "required|max:2000",
            "nama_ayah" => "required",
            "nama_ibu" => "required",
            "agama" => "required",
        ]);
        $file = $request->file('pass_foto');
        $nama_file = rand(1111,9999) . $file->getClientOriginalName();

        if(!$request->hasFile('pass_foto')){
            return redirect()->back()->withErrors('Kesalahan pada upload passFoto!');
        }
        $uploadImages = $file->move(public_path() . "/images/pendaftaran_siswa/", $nama_file);
        $uuid = Factory::create('id_ID')->uuid();

        $pendaftaranSiswa = PendaftaranSiswaModel::create([
            "nisn"=>$request->nisn,
            "id_jurusan"=>$request->id_jurusan,
            "id_golongan"=>$request->id_golongan,
            "nama_depan" =>$request->nama_depan,
            "nama_belakang" =>$request->nama_belakang,
            "jenis_kelamin" =>$request->jenis_kelamin,
            "alamat" =>$request->alamat,
            "pass_foto"=>$nama_file,
            "nama_ayah" =>$request->nama_ayah,
            "pekerjaan_ayah" =>$request->pekerjaan_ayah,
            "penghasilan_ayah_perbulan" =>$request->penghasilan_ayah_perbulan,
            "nama_ibu" =>$request->nama_ibu,
            "pekerjaan_ibu" =>$request->pekerjaan_ibu,
            "penghasilan_ibu_perbulan" =>$request->penghasilan_ibu_perbulan,
            "agama" =>$request->agama,
        ]);
        if($pendaftaranSiswa){
            return redirect('/admin/pendaftaran_siswa')->withSuccess('Data berhasil ditambahkan');
        }else{
            return redirect()->back()->withErrors('Data gagal ditambahkan');
        }
    }
    public function editForm($idPendaftaranSiswa)
    {
        $data = [
            "jurusan" => JurusanModel::all(),
            "golongan" => GolonganModel::all(),
            "pendaftaranSiswa" => PendaftaranSiswaModel::where("nisn", "=", $idPendaftaranSiswa)->first()
        ];
        return view('admin.pages.pendaftaran_siswa.editForm', $data);
    }
    public function update(Request $request, $idPendaftaranSiswa)
    {
        $this->validate($request,[
            "nisn" => "required",
            "nama_depan" => "required",
            "nama_belakang" => "required",
            "jenis_kelamin" => "required",
            "alamat" => "required",
            "nama_ayah" => "required",
            "nama_ibu" => "required",
            "agama" => "required",
        ]);
        $pendaftaranSiswa = PendaftaranSiswaModel::where("nisn", "=", $idPendaftaranSiswa)->first();
        $cekPassFoto = $request->hasFile('pass_foto');
        $nama_file = "";
        if ($cekPassFoto){
            $oldPassFoto = public_path() . "/images/pendaftaran_siswa/" . $pendaftaranSiswa['pass_foto'];

            if (file_exists($oldPassFoto)) {
                unlink($oldPassFoto);
            }
            $file = $request->file('pass_foto');
            $nama_file = rand(1111,9999) . $file->getClientOriginalName();
            $file->move(public_path() . "/images/pendaftaran_siswa/", $nama_file);
        }
        $update = PendaftaranSiswaModel::where('nisn', $idPendaftaranSiswa);
        $update->update([
            "nisn"=>$request->nisn,
            "id_jurusan"=>$request->id_jurusan,
            "id_golongan"=>$request->id_golongan,
            "nama_depan" =>$request->nama_depan,
            "nama_belakang" =>$request->nama_belakang,
            "jenis_kelamin" =>$request->jenis_kelamin,
            "alamat" =>$request->alamat,
            "pass_foto" => ($cekPassFoto) ? $nama_file : $pendaftaranSiswa['pass_foto'],
            "nama_ayah" =>$request->nama_ayah,
            "pekerjaan_ayah" =>$request->pekerjaan_ayah,
            "penghasilan_ayah_perbulan" =>$request->penghasilan_ayah_perbulan,
            "nama_ibu" =>$request->nama_ibu,
            "pekerjaan_ibu" =>$request->pekerjaan_ibu,
            "penghasilan_ibu_perbulan" =>$request->penghasilan_ibu_perbulan,
            "agama" =>$request->agama,
        ]);

        if ($update){
            return redirect('admin/pendaftaran_siswa')->withSuccess("pendaftaranSiswa berhasil diubah");
        }else{
            return redirect()->back()->withErrors("pendaftaranSiswa gagal diubah");
        }
    }
    public function delete($idPendaftaranSiswa)
    {
        $old_data = PendaftaranSiswaModel::where("nisn", "=", $idPendaftaranSiswa)->first();

        $path = public_path(). "/images/pendaftaran_siswa/" . $old_data['pass_foto'];
        // die($path);
        if(file_exists($path)){
            // die("gambar ada");
            unlink($path);
        }
        // die("gambar tidak ada");

        $pendaftaranSiswa = PendaftaranSiswaModel::where("nisn", "=", $idPendaftaranSiswa);
        $pendaftaranSiswa->delete();

        if($pendaftaranSiswa){
            return redirect('admin/pendaftaran_siswa/')->withSuccess("Data pendaftaranSiswa berhasil di hapus");
        }else{
            return redirect()->back()->withErrors("Data pendaftaranSiswa gagal di hapus");
        }
    }
    public function detail($idPendaftaranSiswa)
    {
        $data = PendaftaranSiswaModel::where("nisn", "=", $idPendaftaranSiswa)->first();
        // dd($data);
        return view('admin.pages.pendaftaran_siswa.detail', compact('data'));
    }
}


