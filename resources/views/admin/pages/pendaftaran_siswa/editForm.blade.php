@extends('admin.main')

@section('title')
    Ubah data Pendaftaran Siswa
@endsection

@section('content')
<h1>Ubah Data Pendaftaran Siswa</h1>
<form action="/admin/pendaftaran_siswa/update/{{ $pendaftaranSiswa['nisn'] }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Nisn</label>
        <input type="text" name="nisn" class="form-control" id="" value="{{ $pendaftaranSiswa['nisn'] }}">
    </div>
    <div class="form-group">
        <label for="">Jurusan</label> <br>
        <select name="id_jurusan" id="">
            <option value="#">Pilih Jurusan</option>
            @foreach ($jurusan as $item)
                <option value="{{ $item->id_jurusan }}">{{ $item->jurusan }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Golongan</label> <br>
        <select name="id_golongan" id="">
            <option value="#">Pilih golongan</option>
            @foreach ($golongan as $item)
                <option value="{{ $item->id_golongan }}">{{ $item->golongan }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Nama Depan</label>
        <input type="text" name="nama_depan" class="form-control" id="" value="{{ $pendaftaranSiswa['nama_depan'] }}">
    </div>
    <div class="form-group">
        <label for="">Nama belakang</label>
        <input type="text" name="nama_belakang" class="form-control" id=""value="{{ $pendaftaranSiswa['nama_belakang'] }}">
    </div>
    <div class="form-check">
        <input class="form-check-input" value="laki-laki" type="radio" name="jenis_kelamin" id="jenis_kelamin1">
        <label class="form-check-label" for="jenis_kelamin1">
            laki-laki
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" value="perempuan" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
            checked>
        <label class="form-check-label" for="jenis_kelamin2">
            Perempuan
        </label>
    </div>
    <select class="form-select" name="agama" aria-label="Default select example">
        <option selected>Pilih Agama</option>
        <option value="islam">Islam</option>
        <option value="kristen">Kristen</option>
        <option value="hindu">Hindu</option>
        <option value="budha">Budha</option>
        <option value="konghuchu">Konghuchu</option>
    </select>
    <div class="form-group">
        <label for="">Alamat</label>
        <input type="text" name="alamat" class="form-control" id="" value="{{ $pendaftaranSiswa['alamat'] }}">
    </div>
    <div class="form-group">
        <label for="">Pass Foto</label>
        <input type="file" name="pass_foto" class="form-control" id="">
    </div>
    <div class="form-group">
        <label for="">Nama Ayah</label>
        <input type="text" name="nama_ayah" class="form-control" id="" value="{{ $pendaftaranSiswa['nama_ayah'] }}">
    </div>
    <div class="form-group">
        <label for="">Pekerjaan Ayah</label>
        <input type="text" name="pekerjaan_ayah" class="form-control" id="" value="{{ $pendaftaranSiswa['pekerjaan_ayah'] }}">
    </div>
    <div class="form-group">
        <label for="">Penghasilan Ayah Perbulan</label>
        <input type="text" name="penghasilan_ayah_perbulan" class="form-control" id="" value="{{ $pendaftaranSiswa['penghasilan_ayah_perbulan'] }}">
    </div>
    <div class="form-group">
        <label for="">Nama Ibu</label>
        <input type="text" name="nama_ibu" class="form-control" id="" value="{{ $pendaftaranSiswa['nama_ibu'] }}">
    </div>
    <div class="form-group">
        <label for="">Pekerjaan Ibu</label>
        <input type="text" name="pekerjaan_ibu" class="form-control" id="" value="{{ $pendaftaranSiswa['pekerjaan_ibu'] }}">
    </div>
    <div class="form-group">
        <label for="">Penghasilan Ibu Perbulan</label>
        <input type="text" name="penghasilan_ibu_perbulan" class="form-control" id="" value="{{ $pendaftaranSiswa['penghasilan_ibu_perbulan'] }}">
    </div>
    <button type="submit" class="btn btn-success">Ubahkan</button>
</form>
@endsection
