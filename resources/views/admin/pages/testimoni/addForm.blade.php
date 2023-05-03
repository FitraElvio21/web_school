@extends('admin.main')

@section('title')
    Tambah data Testimoni
@endsection

@section('content')
    <h1>Tambah Data Testimoni</h1>
    <form action="/admin/testimoni/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Foto</label>
            <input type="file" name="foto" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Pesan</label>
            <input type="text" name="pesan" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection
