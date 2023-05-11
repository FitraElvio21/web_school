@extends('admin.main')

@section('title')
    Tambah data Prestasi
@endsection

@section('content')
    <h1>Tambah Data Prestasi</h1>
    <form action="/admin/prestasi/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Tanggal post</label>
            <input type="date" name="tanggal_post" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Author</label>
            <input type="text" name="author" class="form-control" id="">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="summernote" cols="160" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection
