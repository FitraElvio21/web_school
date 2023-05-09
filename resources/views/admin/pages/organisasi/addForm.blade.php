@extends('admin.main')

@section('title')
    Tambah data Organisasi
@endsection

@section('content')
    <h1>Tambah Data Organisasi</h1>
    <form action="/admin/organisasi/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">organisasi</label>
            <input type="text" name="organisasi" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="160" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection
